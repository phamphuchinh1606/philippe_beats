<?php
namespace App\Http\Services;

use App\Action;
use App\Common\Utils;

class ActionService extends BaseService
{
    public function createAction($actionName,$description){
        $action = new Action();
        $action->name = $actionName;
        $action->description = $description;
        $action->is_delete = 0;
        return $action->save();
    }

    public function getAllAction(){
        return Action::where('is_delete','0')->get();
    }

    public function getAction($actionId){
        return Action::find($actionId);
    }

    public function updateAction($actionId,$actionName,$description){
        $action = Action::find($actionId);
        if(isset($action)){
            $action->name = $actionName;
            $action->description = $description;
            $action->save();
        }
    }

    public function delete($actionId){
        $action = Action::find($actionId);
        if(isset($action)){
            $action->is_delete = Utils::$IS_DELETE_ON;
            $action->save();
        }
    }
}
