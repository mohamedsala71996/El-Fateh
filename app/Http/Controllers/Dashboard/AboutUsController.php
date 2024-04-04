<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {

        $aboutUs = AboutUs::first();
        return view('dashboard.aboutUs.index', compact('aboutUs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutUsRequest $request)
    {
        AboutUs::create($request->all());
        return redirect()->route('about-us.index')->with('success', 'Data saved successfully');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUsRequest $request,  $id)
    {
        $aboutUs=AboutUs::findOrFail($id);
        $aboutUs->update($request->all());
        return redirect()->route('about-us.index')->with('success', 'Data saved successfully.');
    }



}
