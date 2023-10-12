<?php

namespace ArdaGnsrn\WordPress;

use ArdaGnsrn\WordPress\Commands\WordPressCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WordPressServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-wordpress')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-wordpress_table')
            ->hasCommand(WordPressCommand::class);
    }
}
