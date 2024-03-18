<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

it('checks migrations columns', function () {
    expect(Schema::getColumnListing('notifications_reminders'))->toEqual([
        'id',

        'target_id',
        'target_type',
        'target',

        'notification_type',
        'notification',
        'meta',

        'send_at',
        'sent_at',
        'rescheduled_at',
        'cancelled_at',

        'created_at',
        'updated_at',
    ]);
});
