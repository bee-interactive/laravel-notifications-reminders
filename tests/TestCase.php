<?php

namespace BeeInteractive\LaravelNotificationsReminders\Tests;

use BeeInteractive\LaravelNotificationsReminders\LaravelNotificationsRemindersServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'BeeInteractive\\LaravelNotificationsReminders\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelNotificationsRemindersServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function setUpDatabase($app)
    {
        $app['db']->connection()->getSchemaBuilder()->create('notifications_reminders', function (Blueprint $table) {
            $table->id();

            $table->string('target_id')->nullable();
            $table->string('target_type');
            $table->text('target');

            $table->string('notification_type');
            $table->text('notification');
            $table->json('meta')->nullable();

            $table->datetime('send_at');
            $table->datetime('sent_at')->nullable();
            $table->datetime('rescheduled_at')->nullable();
            $table->datetime('cancelled_at')->nullable();

            $table->timestamps();
        });

        $migration = include __DIR__.'/../database/migrations/create_notifications_reminders_table.php.stub';
        $migration->up();
    }
}
