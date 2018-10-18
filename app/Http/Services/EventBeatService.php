<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\EventBeats;

class EventBeatService extends BaseService
{
    public function createEventBeat(Request $request){
        $eventBeat = new EventBeats();
        $eventBeat->event_id = $request->event_id;
        $eventBeat->action_id = $request->action_id;
        $eventBeat->points = $request->points;
        $eventBeat->comments = $request->comments;
        $eventBeat->is_delete = 0;
        return $eventBeat->save();
    }

    public function getAllEventBeat(){
        return EventBeats::join('events','events.id','event_beats.event_id')
            ->join('action','action.id','event_beats.action_id')
            ->where('event_beats.is_delete','0')
            ->orderby('event_beats.created_at','desc')
            ->select('event_beats.*', 'events.title as event_name', 'action.name as action_name')
            ->get();
    }

    public function getEventBeat($eventBeatId){
        return EventBeats::find($eventBeatId);
    }

    public function getEventBeatFull($eventBeatId){
        return EventBeats::join('events','events.id','event_beats.event_id')
            ->join('action','action.id','event_beats.action_id')
            ->where('event_beats.id',$eventBeatId)
            ->select('event_beats.*', 'events.title as event_name', 'action.name as action_name')
            ->first();
    }

    public function updateEventBeat($eventBeatId, Request $request){
        $eventBeat = EventBeats::find($eventBeatId);
        if(isset($eventBeat)){
            $eventBeat->event_id = $request->event_id;
            $eventBeat->action_id = $request->action_id;
            $eventBeat->points = $request->points;
            $eventBeat->comments = $request->comments;
            $eventBeat->save();
        }
    }

    public function delete($eventBeatId){
        $eventBeat = EventBeats::find($eventBeatId);
        if(isset($eventBeat)){
            $eventBeat->delete();
        }
    }
}
