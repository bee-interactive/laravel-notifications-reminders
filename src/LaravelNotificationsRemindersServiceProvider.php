<?php

namespace BeeInteractive\LaravelNotificationsReminders;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

class LaravelNotificationsRemindersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-notifications-reminders')
            ->publishesServiceProvider('LaravelNotificationsRemindersServiceProvider')
            ->hasConfigFile()
            ->hasMigration('create_laravel-notifications-reminders_table')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToStarRepoOnGitHub('bee-interactive/laravel-notifications-reminders');
            });
    }
}
