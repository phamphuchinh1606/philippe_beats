<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ActionService;
use App\Http\Services\EventService;
use App\Http\Services\EventBeatService;

class EventBeatController extends Controller
{
    protected $actionService;
    protected $eventService;
    protected $eventBeatService;

    public function __construct(ActionService $actionService, EventService $eventService, EventBeatService $eventBeatService)
    {
        $this->actionService = $actionService;
        $this->eventService = $eventService;
        $this->eventBeatService = $eventBeatService;
    }

    public function index()
    {
        $eventBeats = $this->eventBeatService->getAllEventBeat();
        return view('eventbeats.index',[
            'eventBeats' => $eventBeats
        ]);
    }

    public function showCreate(){
        $actions = $this->actionService->getAllAction();
        $events = $this->eventService->getAllEvent();
        return view('eventbeats.create',[
            'actions' => $actions,
            'events' => $events
        ]);
    }

    public function store(Request $request){
        $this->eventBeatService->createEventBeat($request);
        return redirect()->route('event_beat.index');
    }

    public function show($id){
        $eventBeat = $this->eventBeatService->getEventBeatFull($id);
        return view('eventbeats.show',[
            'eventBeat' => $eventBeat
        ]);
    }

    public function showEdit($id){
        $eventBeat = $this->eventBeatService->getEventBeat($id);
        $actions = $this->actionService->getAllAction();
        $events = $this->eventService->getAllEvent();
        return view('eventbeats.edit',[
            'eventBeat' => $eventBeat,
            'actions' => $actions,
            'events' => $events
        ]);
    }

    public function edit($id, Request $request){
        $this->eventBeatService->updateEventBeat($id,$request);
        return redirect()->route('event_beat.index')->with('success', 'Event Beat edit successfully.');
    }

    public function destroy($id){
        $this->eventBeatService->delete($id);
        return redirect()->route('event_beat.index')->with('success', 'Event Beat delete successfully.');
    }
}
