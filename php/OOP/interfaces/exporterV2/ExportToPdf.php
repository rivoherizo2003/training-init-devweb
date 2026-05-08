<?php
declare(strict_types=1);

require_once("FileExportInterface.php");
require_once("ExportRequestDto.php");

class ExportToPdf implements FileExportInterface{
    public function __construct(private readonly ExportRequestDto $exportRequestDto)
    {
    }

    public function export()
    {
        try {
         $pdfFile = fopen(sprintf("%s.%s","files/".$this->exportRequestDto->filename, "pdf"), 'w');
         fwrite($pdfFile, $this->exportRequestDto->fileContent);
         fclose($pdfFile);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}