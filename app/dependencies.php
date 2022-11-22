<?php

use App\Infrastrucutre\Service\JwtManager;
use App\Core\Domain\Service\JwtManagerInterface;
use Illuminate\Contracts\Foundation\Application;
use App\Infrastrucutre\Repository\SqlUserRepository;
use App\Infrastrucutre\Repository\SqlStockRepository;
use App\Core\Domain\Repository\UserRepositoryInterface;
use App\Core\Domain\Repository\StockRepositoryInterface;

/** @var Application $app */

$app->singleton(UserRepositoryInterface::class, SqlUserRepository::class);
$app->singleton(StockRepositoryInterface::class, SqlStockRepository::class);
$app->singleton(JwtManagerInterface::class, JwtManager::class);
