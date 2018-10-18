<?php
namespace App\Http\Services;

use App\Common\BeatsCityCommon;
use App\Events;
use Illuminate\Http\Request;
use App\Common\Utils;

class EventService extends BaseService
{
    public function createEvent(Request $request){
        $event = new Events();
        $event->venue_id = $request->venue_id;
        $event->title = $request->title;
        $event->sub_title = $request->sub_title;
        $event->description = $request->description;
        $event->start_date = \Carbon\Carbon::createFromFormat('d/m/Y',$request->start_date);
        $event->end_date = \Carbon\Carbon::createFromFormat('d/m/Y',$request->end_date);
        $event->status = $request->status;
        $imageName = 'no_image_available.jpg';
        if(!empty($request->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $request->image->move(Utils::pathUploadImage('images/upload'), $imageName);
        }
        $event->image = $imageName;
        return $event->save();
    }

    public function getAllEvent(){
        return Events::join('venues','venues.id','=','events.venue_id')
            ->join('venue_type','venue_type.id','=','venues.venue_type_id')
            ->where('venues.is_delete','0')
            ->select('events.*','venues.name as venue_name','venue_type.name as venue_type_name')
            ->orderby('events.created_at','desc')
            ->get();
    }

    public function getListEventShow(){
        $list = Events::join('venues','venues.id','=','events.venue_id')
            ->join('venue_type','venue_type.id','=','venues.venue_type_id')
            ->leftjoin('event_beats','event_beats.event_id','=','events.id')
            ->leftjoin('action','action.id','=','event_beats.action_id')
            ->where('venues.is_delete','0')
            ->where('events.status',Utils::$EVENT_STATUS_PUBLIC)
            ->select('events.*','venues.name as venue_name','venue_type.name as venue_type_name', 'action.id as action_id', 'action.name as action_name')
            ->orderby('events.created_at','desc')
            ->get();
        $listEvent = [];
        $arrayEvent = [];
        foreach ($list as $event){
            $event->description_text = BeatsCityCommon::showTextDot($event->description,180);
            if(!isset($arrayEvent[$event->id])){
                $action = [
                    'action_id' => $event->action_id,
                    'action_name' => $event->action_name
                ];
                $actions = [$action];
                $event->actions = $actions;
                $arrayEvent[$event->id] = $event;
            }else{
                $action = [
                    'action_id' => $event->action_id,
                    'action_name' => $event->action_name
                ];
                $array = $arrayEvent[$event->id]->actions;
                array_push($array,$action);
                $arrayEvent[$event->id]->actions = $array;
            }
        }
        return $arrayEvent;
    }

    public function getEvent($eventId){
        return Events::find($eventId);
    }

    public function updateEvent($eventId, Request $request){
        $event = Events::find($eventId);
        if(isset($event)){
            $event->venue_id = $request->venue_id;
            $event->title = $request->title;
            $event->sub_title = $request->sub_title;
            $event->description = $request->description;
            $event->start_date = \Carbon\Carbon::createFromFormat('d/m/Y',$request->start_date);
            $event->end_date = \Carbon\Carbon::createFromFormat('d/m/Y',$request->end_date);
            $event->status = $request->status;
            if(!empty($request->image)){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                $request->image->move(Utils::pathUploadImage('images/upload'), $imageName);
                $event->image = $imageName;
            }
            return $event->save();
        }
    }
}
