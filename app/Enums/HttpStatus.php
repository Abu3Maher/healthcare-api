<?php

namespace App\Http\Enums;

enum HttpStatus
{
    public const OK = 200;
    public const CREATED = 201;
    public const NO_CONTENT = 204;
    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const CSRF_TOKEN = 419;
    public const VALIDATION = 422;

    public const TOO_MANY = 429;
    public const ERROR = 500;
}
