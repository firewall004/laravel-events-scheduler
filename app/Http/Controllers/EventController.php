<?php

namespace App\Http\Controllers;

use App\Events\EventCreated;
use App\Http\Requests\EventStoreRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

class EventController extends Controller
{
    public function addEvent()
    {
        return view('addEvent');
    }

    public function index()
    {
        $events = Event::all();
        return view('events', [
            'events' => $events
        ]);
    }

    public function save(EventStoreRequest $request)
    {
        try {
            $eventRequest = $request->validated();

            $event = new Event();
            $event->name = $eventRequest['name'];
            $event->description = $eventRequest['description'];
            $event->start_time = date('H:i:s', strtotime($eventRequest['startTime']));
            $event->end_time = date('H:i:s', strtotime($eventRequest['endTime']));
            $event->days = implode(', ', $eventRequest['days']);

            DB::beginTransaction();
            $save = $event->save();

            if (!$save) {
                DB::rollBack();
                return back()->with('fail', 'Something went wrong.');
            }

            event(new EventCreated($event));
            DB::commit();
            return $this->index();
        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function eventSchedules(): Response
    {
        $events = Event::all();
        $allEvents = [];

        $count = 0;

        foreach ($events as $event) {
            $allEvents[$count]['event'] = $event;
            $allEvents[$count]['schedules'] = $event->schedules;

            ++$count;
        }
        return response(['data' => $allEvents]);
    }
}
