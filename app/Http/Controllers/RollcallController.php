<?php

namespace App\Http\Controllers;

use App\Models\Rollcall;
use App\Http\Requests\StoreRollcallRequest;
use App\Http\Requests\UpdateRollcallRequest;

class RollcallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRollcallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRollcallRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rollcall  $rollcall
     * @return \Illuminate\Http\Response
     */
    public function show(Rollcall $rollcall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rollcall  $rollcall
     * @return \Illuminate\Http\Response
     */
    public function edit(Rollcall $rollcall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRollcallRequest  $request
     * @param  \App\Models\Rollcall  $rollcall
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRollcallRequest $request, Rollcall $rollcall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rollcall  $rollcall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rollcall $rollcall)
    {
        //
    }
}
