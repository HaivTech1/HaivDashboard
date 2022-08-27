<?php

namespace App\Http\Controllers;

use App\Models\Pioneer;
use App\Http\Requests\StorePioneerRequest;
use App\Http\Requests\UpdatePioneerRequest;

class PioneerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
   
    public function index()
    {
        return view('manager.pioneer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePioneerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePioneerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pioneer  $pioneer
     * @return \Illuminate\Http\Response
     */
    public function show(Pioneer $pioneer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pioneer  $pioneer
     * @return \Illuminate\Http\Response
     */
    public function edit(Pioneer $pioneer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePioneerRequest  $request
     * @param  \App\Models\Pioneer  $pioneer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePioneerRequest $request, Pioneer $pioneer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pioneer  $pioneer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pioneer $pioneer)
    {
        //
    }
}
