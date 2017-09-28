<?php namespace GeneaLabs\LaravelModelCaching\Tests;

use GeneaLabs\LaravelAuthorizationAddons\Providers\Service as LaravelAuthorizationAddonsService;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Database\Eloquent\Factory;

trait CreatesApplication
{
    public function createApplication()
    {
        $app = require __DIR__ . '/../vendor/laravel/laravel/bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        $app->make(Factory::class)->load(__DIR__ . '/database/factories');
        $app->afterResolving('migrator', function ($migrator) {
            $migrator->path(__DIR__ . '/database/migrations');
        });
        $app->register(LaravelAuthorizationAddonsService::class);

        return $app;
    }
}
