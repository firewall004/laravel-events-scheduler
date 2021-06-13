<?php

namespace App\Http\Controllers;

use App\Events\EventCreated;
use App\Http\Requests\EventStoreRequest;
use App\Models\Event;
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
        $events = Event::where('created_by', session()->get('loggedUser'))->paginate(15);
        return view('events', ['events' => $events]);
    }

    public function save(EventStoreRequest $request)
    {
        try {
            $eventRequest = $request;

            $event = new Event();
            $event->name = $eventRequest['name'];
            $event->description = $eventRequest['description'];
            $event->start_time = date('H:i:s', strtotime($eventRequest['startTime']));
            $event->end_time = date('H:i:s', strtotime($eventRequest['endTime']));
            $event->days = implode(', ', $eventRequest['days']);
            $event->created_by = session()->get('loggedUser');

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
            DB::rollBack();
            throw $th;
        }
    }

    public function eventSchedules(int $userId): Response
    {
        return response(
            ['data' => Event::with('schedules')->where('created_by', $userId)->get()]
        );
    }
}
