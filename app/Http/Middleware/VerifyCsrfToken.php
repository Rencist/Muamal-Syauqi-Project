<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/create_user',
        '/login_user',
        '/create_stock',
        '/get_stock',
        '/buy_stock',
        '/prediksi',
        '/stock',
        '/edit_stock',
    ];
}
