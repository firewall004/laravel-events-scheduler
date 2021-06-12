<?php

namespace App\Http\Controllers;

use App\Events\EventCreated;
use App\Models\Event;
use Illuminate\Http\Request;
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

    public function save(Request $request)
    {
        try {
            $request->validate([
            'name' => 'required',
            'description' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
            ]);

            $event = new Event();
            $event->name = $request->name;
            $event->description = $request->description;
            $event->start_time = date('H:i:s', strtotime($request->startTime));
            $event->end_time = date('H:i:s', strtotime($request->endTime));
            $event->days = implode(', ', $request->days);

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
}
