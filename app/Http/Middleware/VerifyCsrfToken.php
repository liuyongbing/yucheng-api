<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'accounts*',
        'attachment/upload/*',
        'banner*',
        'branches*',
        'categories*',
        'courses*',
        'grades*',
        'members*',
        'news*',
        'sms*',
        'teachings*',
        'trainers*',
        'users/login',
    ];
}
