<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ActionService;

class ActionController extends Controller
{
    protected $actionService;

    public function __construct(ActionService $actionService)
    {
        $this->actionService = $actionService;
    }

    public function index()
    {
        $actions = $this->actionService->getAllAction();
        return view('actions.index',[
            'actions' => $actions
        ]);
    }

    public function showCreate(){
        return view('actions.create');
    }

    public function store(Request $request){
        $actionName = $request->name;
        $description = $request->description;
        $this->actionService->createAction($actionName,$description);
        return redirect()->route('action.index');
    }

    public function show($id){
        $action = $this->actionService->getAction($id);
        return view('actions.show',[
            'action' => $action
        ]);
    }

    public function showEdit($id){
        $action = $this->actionService->getAction($id);
        return view('actions.edit',[
            'action' => $action
        ]);
    }

    public function edit($id, Request $request){
        $actionName = $request->name;
        $description = $request->description;
        $this->actionService->updateAction($id,$actionName,$description);
        return redirect()->route('action.index')->with('success', 'Action edit successfully.');
    }

    public function destroy($id){
        $this->actionService->delete($id);
        return redirect()->route('action.index')->with('success', 'Action delete successfully.');
    }
}
