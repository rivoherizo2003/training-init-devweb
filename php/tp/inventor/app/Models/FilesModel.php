<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Models;

use Codemdg\Core\Models\AbstractModel;
use Codemdg\Inventor\Dtos\Requests\NewProductRequestDto;
use Codemdg\Inventor\Exceptions\FilesProductNotCreatedException;
use Codemdg\Inventor\Exceptions\FileTooLargeException;
use Codemdg\Inventor\Exceptions\InvalidFileFormatException;
use Codemdg\Inventor\Exceptions\SaveUploadedFileFailedException;
use Codemdg\Inventor\Exceptions\UploadFileFailedException;
use Exception;
use PDO;

final class FilesModel extends AbstractModel
{
    public function saveFilesProduct(NewProductRequestDto $newProductRequestDto)
    {
        $dataUploadedFile = $newProductRequestDto->dataFiles["file-product"];

        $sql = "INSERT INTO files (
                    filename, 
                    product_id,
                    extension
                ) VALUES (
                    :filename, 
                    :product_id,
                    :extension
                )";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                ':filename'      => $this->generateRandomFilename($dataUploadedFile["name"]),
                ':product_id'    => $newProductRequestDto->productIdDB,
                ':extension'     => $this->getExtension($dataUploadedFile["name"])
            ]);
        } catch (\Throwable $th) {
            throw new FilesProductNotCreatedException($th->getMessage());
        }

        $this->uploadProductImage($dataUploadedFile, $newProductRequestDto->productIdDB);
    }

    private function generateRandomFilename(string $originalFileName, string $prefix = 'prod_'): string
    {
        $extension = $this->getExtension($originalFileName);

        // 3. Générer un identifiant unique basé sur le temps actuel + un peu d'aléatoire
        $uniqueId = uniqid($prefix, true);

        // 4. Ajouter une petite chaîne aléatoire pour être 100% sûr d'éviter les collisions
        $randomStr = substr(bin2hex(\random_bytes(4)), 0, 5);

        // Résultat : prod_64a2b1c3d4e5f6.78912345_a1b2c.jpg
        return $uniqueId . '_' . $randomStr . '.' . $extension;
    }

    private function getExtension(string $filename): string
    {
        // 1. Récupérer l'extension du fichier original (ex: "JPG", "png")
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        return strtolower($extension);
    }

    function uploadProductImage(array $fileData, int $productId): ?string
    {
        $productFolder = 'public/uploads/products/' . $productId;

        // 1. Vérifier s'il y a eu une erreur lors de l'envoi
        if ($fileData['error'] !== UPLOAD_ERR_OK) {
            throw new UploadFileFailedException("(Code: " . $fileData['error'] . ")");
        }

        // 2. Vérifier la taille du fichier (ex: max 2 Mo)
        $maxSize = 2 * 1024 * 1024; // 2 Mo en octets
        if ($fileData['size'] > $maxSize) {
            throw new FileTooLargeException("(Max: 2Mo).");
        }

        // 3. Vérifier le VRAI type du fichier (Sécurité critique)
        // On ne fait PAS confiance à $fileData['type'] car il peut être falsifié.
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $fileData['tmp_name']);

        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
        if (!in_array($mimeType, $allowedMimeTypes)) {
            throw new InvalidFileFormatException("Only images are allowed");
        }

        // 4. Définir le chemin absolu du dossier de destination
        // __DIR__ représente le dossier actuel du script. Ajustez-le selon votre architecture MVC.
        $productFolder = ROOT . '/' . ltrim($productFolder, '/');

        // 5. Créer le dossier s'il n'existe pas encore
        if (!is_dir($productFolder)) {
            // Le true permet de créer les sous-dossiers de manière récursive, 0755 sont les bonnes permissions
            mkdir($productFolder, 0755, true);
        }

        // 6. Générer un nom de fichier unique (fonction vue précédemment)
        $extension = pathinfo($fileData['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid('prod_', true) . '.' . strtolower($extension);

        // 7. Le chemin final complet du fichier sur le serveur
        $finalFilePath = $productFolder . '/' . $newFileName;

        // 8. Déplacer le fichier du dossier temporaire de PHP vers votre dossier spécifique
        if (move_uploaded_file($fileData['tmp_name'], $finalFilePath)) {
            // Succès ! On retourne uniquement le nom du fichier (ou un chemin relatif) 
            // pour l'enregistrer dans la base de données.
            return $newFileName;
        }

        throw new SaveUploadedFileFailedException("Product ID: $productId");
    }

    public function deleteFilesByProductId(int $productId): void
    {
        $sql = " DELETE FROM files WHERE product_id = :productId ";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":productId", $productId, PDO::PARAM_INT);
            $statement->execute();
        } catch (\Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
}
