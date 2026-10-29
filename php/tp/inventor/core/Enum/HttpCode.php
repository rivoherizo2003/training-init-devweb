<?php

declare(strict_types=1);

namespace Codemdg\Core\Enum;

enum HttpCode: int
{
    case OK = 200;
    case CREATED = 201;
    case MOVED_PERMANENTLY = 301;
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case INTERNAL_SERVER_ERROR = 500;


    public function label(): string
    {
        return match ($this) {
            self::OK => 'OK',
            self::CREATED => 'Created',
            self::BAD_REQUEST => 'Bad Request',
            self::NOT_FOUND => 'Not Found',
            self::INTERNAL_SERVER_ERROR => 'Internal Server Error',
            default => 'Unknown Status'
        };
    }
}
