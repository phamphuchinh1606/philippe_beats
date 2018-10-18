<?php
namespace App\Http\Services;

use App\Venues;
use Illuminate\Http\Request;
use App\Common\Utils;

class VenueService extends BaseService
{
    public function createVenue(Request $request){
        $venue = new Venues();
        $venue->venue_type_id = $request->venue_type;
        $venue->name = $request->name;
        $venue->address = $request->address;
        $venue->ward = $request->ward;
        $venue->district = $request->district;
        $venue->city = $request->city;
        $venue->long = $request->longitude;
        $venue->lat = $request->latitude;
        $imageName = 'no_image_available.jpg';
        if(!empty($request->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $request->image->move(Utils::pathUploadImage('images/upload'), $imageName);
        }
        $venue->image = $imageName;
        return $venue->save();
    }

    public function getAllVenue(){
        return Venues::join('venue_type','venue_type.id','=','venues.venue_type_id')
            ->where('venues.is_delete','0')
            ->select('venues.*','venue_type.name as venue_type_name')
            ->orderby('venues.created_at','desc')
            ->get();
    }

    public function getVenue($venueId){
        $venue = Venues::join('venue_type','venue_type.id','=','venues.venue_type_id')
                        ->where('venues.id',$venueId)
                        ->select('venues.*', 'venue_type.name as venue_type_name')
                        ->first();
        return $venue;
    }

    public function updateVenue($venueId, Request $request){
        $venue = Venues::find($venueId);
        if(isset($venue)){
            $venue->venue_type_id = $request->venue_type;
            $venue->name = $request->name;
            $venue->address = $request->address;
            $venue->ward = $request->ward;
            $venue->district = $request->district;
            $venue->city = $request->city;
            $venue->long = $request->longitude;
            $venue->lat = $request->latitude;
            if(!empty($request->image)){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                $request->image->move(Utils::pathUploadImage('images/upload'), $imageName);
                $venue->image = $imageName;
            }
            $venue->save();
        }
    }

    public function delete($venueId){
        $venue = Venues::find($venueId);
        if(isset($venue)) {
            $venue->is_delete = Utils::$IS_DELETE_ON;
            $venue->save();
        }
    }
}
