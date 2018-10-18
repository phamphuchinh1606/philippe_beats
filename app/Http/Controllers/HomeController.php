<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Services\EventService;

class HomeController extends Controller
{
    protected $eventService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EventService $eventService)
    {
        $this->middleware('auth');
        $this->eventService = $eventService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(isset($user)){
            return redirect()->route('dashboard');
        }else {
            return redirect()->route('login');
        }
    }

    public function dashboard(Request $request)
    {
        $listEvent = $this->eventService->getListEventShow();
        return view('admin.dashboard',[
            'listEvent' => $listEvent
        ]);
    }
}
