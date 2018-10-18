<?php

namespace App\Http\Controllers;

use App\Common\BeatsCityCommon;
use Illuminate\Http\Request;
use App\Http\Services\VenueService;
use App\Http\Services\VenueTypeService;
use App\Http\Services\EventService;

class EventController extends Controller
{
    protected $venueService;
    protected $venueTypeService;
    protected $eventService;

    public function __construct(VenueService $venueService, VenueTypeService $venueTypeService, EventService $eventService)
    {
        $this->venueService  = $venueService;
        $this->venueTypeService = $venueTypeService;
        $this->eventService = $eventService;
    }

    public function index()
    {
        $events = $this->eventService->getAllEvent();
        return view('events.index',[
            'events' => $events
        ]);
    }

    public function showCreate(){
        $venues = $this->venueService->getAllVenue();
        return view('events.create',[
            'venues' => $venues
        ]);
    }

    public function store(Request $request){
        $this->eventService->createEvent($request);
        return redirect()->route('event.index');
    }

    public function showEdit($id){
        $venues = $this->venueService->getAllVenue();
        $event = $this->eventService->getEvent($id);
        if($event->start_date != null){
            $event->start_date = BeatsCityCommon::dateFormat($event->start_date,'d/m/Y');
        }
        if($event->end_date != null){
            $event->end_date = BeatsCityCommon::dateFormat($event->end_date,'d/m/Y');
        }
        return view('events.edit',[
            'event' => $event,
            'venues' => $venues
        ]);
    }

    public function edit($id, Request $request){
        $this->eventService->updateEvent($id,$request);
        return redirect()->route('event.index')->with('success', 'Event was edit successfully.');
    }
}
