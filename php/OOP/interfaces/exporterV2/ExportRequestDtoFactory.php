<?php

declare(strict_types=1);
require_once("ExportRequestDto.php");

class ExportRequestDtoFactory
{
    public function createFromPayload(array $data): ExportRequestDto
    {
        //Sanitization
        $rawFilename = trim((string) $data["filename"] ?? "");
        $filename = htmlspecialchars($rawFilename);

        $rawFileContent = trim((string) $data['file-content']);
        $fileContent = htmlspecialchars($rawFileContent);

        $fileExtension = $data["type-file"];

        return new ExportRequestDto(
            $filename,
            $fileContent,
            $fileExtension
        );
    }
}
