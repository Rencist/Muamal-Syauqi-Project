<?php

namespace App\Core\Domain\Models\User;

enum UserType: string
{
    case ADMIN = 'admin';
    case SELLER = 'seller';
    case BUYER = 'buyer';
}
