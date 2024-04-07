<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Pervious_work;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PreviousworkRequest;

class PerviousWorkController extends Controller
{


    public function AllperviousWorks()
    {

        $allperviousWorks = Pervious_work::all();
        // $categories = Category::all();

        return view('dashboard.perviousworks.index', compact('allperviousWorks'));
    }






    public function FromPreviousWork()
    {

        $categories = Category::all();
        return view('dashboard.perviousworks.create', compact('categories'));
    }

    public function CreatePreviousWork(Request $request)
    {

        $request->validate([
            'image' => "required|image|mimes:png,jpg",
            'en_engineer' => "required|string|max:255",
            'ar_engineer' => "required|string|max:255",
            'en_title' => "required|string|max:255",
            'ar_title' => "required|string|max:255",
            'starts_at' => "required|date_format:Y-m-d",
            'ended_at' => "required|date_format:Y-m-d",
            'en_description' => "required|string|max:655",
            'ar_description' => "required|string|max:655",
            'category_id' => "required|exists:categories,id"
        ]);

        $imageName = $request->file('image')->store('dist/img/previos_works', 'public');


        $work =  Pervious_work::create([
            'image' => $imageName,
            'en_engineer' => $request->en_engineer,
            'ar_engineer' => $request->ar_engineer,
            'en_title' => $request->en_title,
            'ar_title' => $request->ar_title,
            'starts_at' => $request->starts_at,
            'ended_at' => $request->ended_at,
            'en_description' => $request->en_description,
            'ar_description' => $request->ar_description,
            'category_id' => $request->category_id,
        ]);


        return redirect(url('admin/AllperviousWorks'))->with('success', 'pervious work created successfuly');
    }




    public function EditPreviousWork($id)
    {
        $Perviouswork = Pervious_work::FindOrFail($id);
        $categories = Category::all();
        return view('dashboard.perviousworks.update', compact('Perviouswork', 'categories'));
    }

    public function updatePreviousWork(Request $request, $id)
    {

       $data = $request->validate([
            'image' => "image|mimes:png,jpg",
            'en_engineer' => "required|string|max:255",
            'ar_engineer' => "required|string|max:255",
            'en_title' => "required|string|max:255",
            'ar_title' => "required|string|max:255",
            'starts_at' => "required|date_format:Y-m-d",
            'ended_at' => "required|date_format:Y-m-d",
            'en_description' => "required|string|max:655",
            'ar_description' => "required|string|max:655",
            'category_id' => "required|exists:categories,id"
        ]);

        $Pervious_work = Pervious_work::FindOrFail($id);

        if ($request->has('image')) {
            Storage::disk('public')->delete($Pervious_work->image);
            $data['image'] = $request->file('image')->store('dist/img/previos_works', 'public');
        }


        $Pervious_work->update($data);


        return redirect(url('admin/AllperviousWorks'))->with('success', 'perviousWorks updated successfuly');
    }


    public function deletePreviousWork($id)
    {

        $Pervious_work = Pervious_work::FindOrFail($id);


        Storage::disk('public')->delete($Pervious_work->image);

        $Pervious_work->delete();

        return redirect(url('admin/AllperviousWorks'))->with('success', 'pervious works deleted successfuly');
    }
}
