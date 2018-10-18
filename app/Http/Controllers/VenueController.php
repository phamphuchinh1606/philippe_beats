<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\VenueService;
use App\Http\Services\VenueTypeService;

class VenueController extends Controller
{
    protected $venueService;
    protected $venueTypeService;

    public function __construct(VenueService $venueService, VenueTypeService $venueTypeService)
    {
        $this->venueService  = $venueService;
        $this->venueTypeService = $venueTypeService;
    }

    public function index()
    {
        $venues = $this->venueService->getAllVenue();
        return view('venues.index',[
            'venues' => $venues
        ]);
    }

    public function showCreate(){
        $venueTypes = $this->venueTypeService->getAllVenueType();
        return view('venues.create',[
            'venueTypes' => $venueTypes
        ]);
    }

    public function store(Request $request){
        $this->venueService->createVenue($request);
        return redirect()->route('venue.index');
    }

    public function show($id){
        $venue = $this->venueService->getVenue($id);
        return view('venues.show',[
            'venue' => $venue
        ]);
    }

    public function showEdit($id){
        $venueTypes = $this->venueTypeService->getAllVenueType();
        $venue = $this->venueService->getVenue($id);
        return view('venues.edit',[
            'venue' => $venue,
            'venueTypes' => $venueTypes
        ]);
    }

    public function edit($id, Request $request){
        $this->venueService->updateVenue($id,$request);
        return redirect()->route('venue.index')->with('success', 'Venue was edit successfully.');
    }

    public function destroy($id){
        $this->venueService->delete($id);
        return redirect()->route('venue.index')->with('success', 'Venue was delete successfully.');
    }
}
