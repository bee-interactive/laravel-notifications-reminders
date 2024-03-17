<?php

namespace BeeInteractive\LaravelNotificationsReminders\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BeeInteractive\LaravelNotificationsReminders\LaravelNotificationsReminders
 */
class LaravelNotificationsReminders extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \BeeInteractive\LaravelNotificationsReminders\LaravelNotificationsReminders::class;
    }
}
