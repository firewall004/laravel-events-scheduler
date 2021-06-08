<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

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
		// TODOS:
		// 1. Add try-catch
		// 2. Add validation in validation class
		$request->validate([
			'name' => 'required',
			'description' => 'required',
			'startTime' => 'required',
			'endTime' => 'required'
		]);

		$event = new Event();
		$event->name = $request->name;
		$event->description = $request->description;
		$event->start_time = date('Y-m-d H:i:s', strtotime($request->startTime));
		$event->end_time = date('Y-m-d H:i:s', strtotime($request->endTime));
		$event->days = implode(', ', $request->days);

		$save = $event->save();

		if (!$save) {
			return back()->with('fail', 'Something went wrong.');
		}
		return redirect('home');
	}
}
