<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaFileRequest;
use App\Models\MediaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mediaFile = MediaFile::first();
        if (isset($mediaFile->article_sliders)) {
            $article_sliders = json_decode($mediaFile->article_sliders);

            return view('dashboard.media-files.index', compact('mediaFile', 'article_sliders'));
        }
        return view('dashboard.media-files.index', compact('mediaFile'));
    }

    /**
     * Show the form for creating a new media file.
     */
    public function create()
    {
        return view('dashboard.media-files.create');
    }

    /**
     * Store a newly created media file in storage.
     */
    public function store(MediaFileRequest $request)
    {

        $mediaFile = new MediaFile();

        // Handle home video
        if ($request->hasFile('home_video')) {
            $homeVideo = $request->file('home_video');
            $homeVideoPath = $homeVideo->store('media_files/home_video', 'public');
            $mediaFile->home_video = $homeVideoPath;
        }

        // Handle about video
        if ($request->hasFile('about_video')) {
            $aboutVideo = $request->file('about_video');
            $aboutVideoPath = $aboutVideo->store('media_files/about_video', 'public');
            $mediaFile->about_video = $aboutVideoPath;
        }

        // Handle article sliders
        if ($request->hasFile('article_sliders')) {
            $articleSliders = $request->file('article_sliders');
            $articleSliderPaths = [];
            foreach ($articleSliders as $slider) {
                $sliderPath = $slider->store('media_files/article_sliders', 'public');
                $articleSliderPaths[] = $sliderPath;
            }
            $mediaFile->article_sliders = json_encode($articleSliderPaths);
        }

        $mediaFile->save();

        return redirect()->route('media-files.index')->with('success', 'Media file created successfully.');
    }

    /**
     * Show the form for editing the specified media file.
     */
    public function edit(MediaFile $mediaFile)
    {
        return view('dashboard.media-files.edit', compact('mediaFile'));
    }

    /**
     * Update the specified media file in storage.
     */
    public function update(Request $request, $id)
    {
         $validData = $request->validate([
            'home_video' => 'file|mimes:mp4,mov,avi', 
            'about_video' => 'file|mimes:mp4,mov,avi', 
            'article_sliders.*' => 'image|mimes:jpeg,png,jpg,gif' 

         ]);
        $mediaFile = MediaFile::findOrFail($id);

        if ($request->hasFile('home_video')) {
            Storage::disk('public')->delete($mediaFile->home_video);

            $homeVideo = $request->file('home_video');
            $homeVideoPath = $homeVideo->store('media_files/home_video', 'public');
            $mediaFile->home_video = $homeVideoPath;
        }

        if ($request->hasFile('about_video')) {
            Storage::disk('public')->delete($mediaFile->about_video);
            $aboutVideo = $request->file('about_video');
            $aboutVideoPath = $aboutVideo->store('media_files/about_video', 'public');
            $mediaFile->about_video = $aboutVideoPath;
        }

        if ($request->hasFile('article_sliders')) {
            $articleSliders = json_decode($mediaFile->article_sliders, true);
            foreach ($articleSliders as $slider) {
                Storage::disk('public')->delete($slider);
            }
            $articleSliderPaths = [];
             $newArticleSliders = $request->file('article_sliders');
            foreach ($newArticleSliders as $slider) {
                $sliderPath = $slider->store('media_files/article_sliders', 'public');
                $articleSliderPaths[] = $sliderPath;
            }
            $mediaFile->article_sliders = json_encode($articleSliderPaths);
        }
        $mediaFile->save();
        return redirect()->route('media-files.index')->with('success', 'Media file updated successfully.');
    }

    /**
     * Remove the specified media file from storage.
     */
    public function destroy($id)
    {
        $mediaFile = MediaFile::findOrFail($id);
    
        // Delete home video
        if ($mediaFile->home_video) {
            Storage::disk('public')->delete($mediaFile->home_video);
        }
    
        // Delete about video
        if ($mediaFile->about_video) {
            Storage::disk('public')->delete($mediaFile->about_video);
        }
    
        // Delete article sliders
        if ($mediaFile->article_sliders) {
            $articleSliders = json_decode($mediaFile->article_sliders, true);
            foreach ($articleSliders as $slider) {
                Storage::disk('public')->delete($slider);
            }
        }
    
        // Delete the media file from the database
        $mediaFile->delete();
    
        return redirect()->route('media-files.index')->with('success', 'Media file deleted successfully.');
    }
}
