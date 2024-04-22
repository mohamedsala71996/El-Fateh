<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\RequestUser;
use Illuminate\Http\Request;

class RequestUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        return view('website.requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'governorate' => 'required',
            'city' => 'required',
            'detailed_address' => 'required',
            'description' => 'required',
        ]);

        RequestUser::create($request->all());

        return redirect()->back()->with('success', 'Request sent successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(RequestUser $requestUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestUser $requestUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestUser $requestUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestUser $requestUser)
    {
        //
    }
}
