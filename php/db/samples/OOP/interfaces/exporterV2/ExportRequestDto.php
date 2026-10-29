<?php

declare(strict_types=1);

class ExportRequestDto
{
    public function __construct(
        public private(set) string $filename {
            get => $this->filename;
        },
        public private(set) string $fileContent {
            get => $this->fileContent;
        },
        public private(set) string $fileExtension {
            get => $this->fileExtension;
        }
    ) {}
}
