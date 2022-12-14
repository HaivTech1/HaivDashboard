<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Jobs\CreateProperty;
use App\Jobs\UpdateProperty;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Services\SaveImageService;
use App\Http\Requests\PropertyRequest;
use App\Repositories\PropertyRepository;

class PropertyController extends Controller
{

    public $geoJson;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::paginate(5);
        $categories = PropertyCategory::paginate(3);
        return view('housing.property.index', compact(['properties', 'categories']));
    }


    private function loadLocations(){
        $locations = Property::all();

        $customLocations = [];

        foreach ($locations as $location) {
            $customLocations[] = [
                'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [$location->longitude(), $location->latitude()],
                    'type' => 'Point'
                ],
                'properties' => [
                    'locationId' => $location->id(),
                    'title' => $location->title(),
                    'image' => $location->image(),
                    'description' => $location->excerpt(100),
                ]
            ];
        }

        $geoLocation = [
            'type' => 'PropertyCollection',
            'features' => $customLocations
        ];

        $geoJson = collect($geoLocation)->toJson();
        $this->geoJson = $geoJson;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->loadLocations();
        $categories = PropertyCategory::all()->pluck('name', 'id');
        return view('housing.property.create',compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {

        // dd($request->specifications);
        $property = $this->dispatchSync(CreateProperty::fromRequest($request));

        // $notification = array(
        //     'messege' => 'Property created successfully',
        //     'alert-type' => 'success',
        //     'title' => 'Successful!',
        //     'button' => 'Thanks, operation successful!',
        // );

        if ($property) {
            return response()->json(['status' => 'success', 'message' => 'Property created successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'There was a problem']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {

        $categories = PropertyCategory::all()->pluck('name', 'id');
        return view('housing.property.show',compact(['property']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $categories = PropertyCategory::all()->pluck('name', 'id');
        return view('housing.property.edit', compact(['property','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        //  dd($request);
        $this->dispatchSync(UpdateProperty::fromRequest($property, $request));

        $notification = array(
            'messege' => 'Property updated successfully',
            'alert-type' => 'success',
            'title' => 'Successful!',
            'button' => 'Thanks, the operation was successful!',
        );

        return redirect()->route('property.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}