<?php

namespace App\Core\Domain\Models\User;

enum UserType: string
{
    case ADMIN = 'admin';
    case PETANI = 'petani';
    case PEMBELI = 'pembeli';
}
