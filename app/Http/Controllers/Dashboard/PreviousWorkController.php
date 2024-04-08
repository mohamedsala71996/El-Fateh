<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PreviousWorkRequest;
use App\Models\Category;
use App\Models\PreviousWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreviousWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $previousWorks = PreviousWork::all();
        return view('dashboard.previousWorks.index', compact('previousWorks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.previousWorks.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PreviousWorkRequest $request)
    {
        $data = $request->validated();
        
        // Handling image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('previousWorks', 'public');
        }
        
        PreviousWork::create($data);

        return redirect()->route('previousWorks.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PreviousWork $previousWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PreviousWork $previousWork)
    {
        $categories = Category::all();

        return view('dashboard.previousWorks.edit', compact('previousWork', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PreviousWorkRequest $request, PreviousWork $previousWork)
    {
        $data = $request->validated();

        // Handling image upload
        if ($request->hasFile('image')) {
            // Delete previous image
            Storage::disk('public')->delete($previousWork->image);
            // Store new image
            $data['image'] = $request->file('image')->store('previousWorks', 'public');
        }

        $previousWork->update($data);

        return redirect()->route('previousWorks.index')->with('success', 'Data saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreviousWork $previousWork)
    {
        // Delete associated image
        if ($previousWork->image) {
            Storage::disk('public')->delete($previousWork->image);
        }
        
        $previousWork->delete();

        return redirect()->route('previousWorks.index')->with('success', 'Data deleted successfully.');
    }
}
