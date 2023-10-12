<?php

namespace ArdaGnsrn\WordPress;

use ArdaGnsrn\WordPress\Commands\WordPressCommand;
use ArdaGnsrn\WordPress\Contracts\WordPressAuth;
use ArdaGnsrn\WordPress\Services\BasicAuth;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WordPressServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-wordpress')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-wordpress_table')
            ->hasCommand(WordPressCommand::class);
    }

    public function packageRegistered(): void
    {
        $this->app->bind(WordPressAuth::class, function ($app) {
            return new BasicAuth();
        });
    }
}
