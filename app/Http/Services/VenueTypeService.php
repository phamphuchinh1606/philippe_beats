<?php
namespace App\Http\Services;

use App\Common\Utils;
use App\VenueType;
class VenueTypeService extends BaseService
{
    public function createVenueType($venueTypeName){
        $venueType = new VenueType();
        $venueType->name = $venueTypeName;
        $venueType->is_delete = 0;
        return $venueType->save();
    }

    public function getAllVenueType(){
        return VenueType::where('is_delete',Utils::$IS_DELETE_OFF)->get();
    }

    public function getVenueType($venueTypeId){
        return VenueType::find($venueTypeId);
    }

    public function updateVenueType($venueTypeId, $venueTypeName){
        $venueType = VenueType::find($venueTypeId);
        if(isset($venueType)){
            $venueType->name = $venueTypeName;
            $venueType->save();
        }
    }

    public function deleteVenueType($venueTypeId){
        $venueType = VenueType::find($venueTypeId);
        if(isset($venueType)){
            $venueType->is_delete = Utils::$IS_DELETE_ON;
            $venueType->save();
        }
    }
}
