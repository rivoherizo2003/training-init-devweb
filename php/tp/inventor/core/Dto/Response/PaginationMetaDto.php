<?php

declare(strict_types=1);

namespace Codemdg\Core\Dto\Response;

class PaginationMetaDto
{
    public function __construct(
        public private(set) int $page,
        public private(set) int $totalItems,
        public private(set) int|float $totalPages,
    ) {}
}
