<?php

declare(strict_types=1);

namespace Codemdg\Core\Dto\Response;

use Codemdg\Core\Dto\Response\PaginationMetaDto;

class PaginationResponseDto
{
    public function __construct(
        public private(set) array $data,
        public private(set) array $meta
    ) {}
}
