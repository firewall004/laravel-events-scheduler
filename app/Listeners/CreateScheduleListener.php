<?php

namespace App\Listeners;

use App\Events\EventCreated;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateScheduleListener
{
    public function handle(EventCreated $event): void
    {
        try {
            $event = $event->event;
            $eventDays = explode(', ', $event->days);

            $scheduledDays = env('SCHEDULED_DAYS', 90);
            $weeks = round($scheduledDays / 7);
            $eventDate = date('Y-m-d');

            DB::beginTransaction();
            for ($week = 1; $week <= $weeks; $week++) {
                foreach ($eventDays as $eventDay) {
                    $schedule = new Schedule();
                    $schedule->event_id = $event->id;

                    $eventDate = date('Y-m-d', strtotime("$eventDay next week $eventDate"));
                    $schedule->scheduled_date = $eventDate;

                    $schedule->save();
                }
            }
            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
