<?php

declare(strict_types=1);

class ProcessFileExport{
    public function __construct(private readonly FileExportInterface $fileExportInterface)
    {
    }

    public function execute(ExportRequestDto $exportRequestDto)
    {
        $this->fileExportInterface->export();
    }
}