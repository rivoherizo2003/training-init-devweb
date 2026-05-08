<?php

declare(strict_types=1);

require_once("ExportRequestDtoFactory.php");
require_once("ExportToPdf.php");
require_once("ExportToCsv.php");
require_once("ExportToTxt.php");
require_once("ProcessFileExport.php");

$exportRequestDtoFactory = new ExportRequestDtoFactory();
$exportRequestDto = $exportRequestDtoFactory->createFromPayload($_POST);

try {
    $exporter = match ($exportRequestDto->fileExtension) {
        "pdf" => new ExportToPdf($exportRequestDto),
        "csv" => new ExportToCsv($exportRequestDto),
        "txt" => new ExportToTxt($exportRequestDto),
        default => throw new Exception("Unsupported exporter")
    };
} catch (\Throwable $th) {
    echo "<p>Exporter not supported</p>";
}

try {
    $processFileExport = new ProcessFileExport($exporter);
    $processFileExport->execute($exportRequestDto);
    $fileName = sprintf("%s.%s", $exportRequestDto->filename, $exportRequestDto->fileExtension);
    echo "<p>Export content in files/".$fileName." with success!</p>";
} catch (\Throwable $th) {
    echo "<p>Export failed!!!!</p>";
}
