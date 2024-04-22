<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;
use App\Models\RequestUser;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contactRequests = RequestUser::all();
        return view('dashboard.userRequests.index',compact('contactRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */

    public function create(): View
    {
//        return view('dashboard.userRequests.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContactRequest $request, RequestUser $requestUser)
    {
        $validData = $request->validated();
//        dd($validData);
        try {
            DB::beginTransaction();
            $requestUser->create($validData);
            DB::commit();
            return redirect()->back()->with('success', 'Successfully Send Contact Request');

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error On Send Contact Request');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestUser $requestUser)
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

    public function destroy(RequestUser $contactRequest)
    {
//        dd($contactRequest);
        $contactRequest->delete();
        return redirect()->back()->with('success', 'Successfully Deleted Contact Request');

    }
}
