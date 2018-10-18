<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\VenueTypeService;


class VenueTypeController extends Controller
{
    protected $venueService;

    public function __construct(VenueTypeService $venueTypeService)
    {
        $this->venueTypeService  = $venueTypeService;
    }

    public function index()
    {
        $venueTypes = $this->venueTypeService->getAllVenueType();
        return view('venueTypes.index',[
            'venueTypes' => $venueTypes
        ]);
    }

    public function showCreate(){
        return view('venueTypes.create');
    }

    public function store(Request $request){
        $venueTypeName = $request->type_name;
        $this->venueTypeService->createVenueType($venueTypeName);
        return redirect()->route('venue_type.index');
    }

    public function show($id){
        $venueType = $this->venueTypeService->getVenueType($id);
        return view('venueTypes.show',[
            'venueType' => $venueType
        ]);
    }

    public function showEdit($id){
        $venueType = $this->venueTypeService->getVenueType($id);
        return view('venueTypes.edit',[
            'venueType' => $venueType
        ]);
    }

    public function edit($id, Request $request){
        $venueTypeName = $request->type_name;
        $this->venueTypeService->updateVenueType($id,$venueTypeName);
        return redirect()->route('venue_type.index')->with('success', 'Venue type was edit successfully.');
    }

    public function destroy($id){
        $this->venueTypeService->deleteVenueType($id);
        return redirect()->route('venue_type.index')->with('success', 'Venue type was delete successfully.');
    }
}
