<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use App\Models\Tanent;
use App\Http\Requests\StoreArticalRequest;
use App\Http\Requests\UpdateArticalRequest;
use Illuminate\Http\Request;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articals = Artical::teams()->get();
        return view('articals.index', compact('articals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanents = Tanent::all();
        return view('articals.create', compact('tanents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'tanent_id' => 'required|exists:tanents,id',
        ]);

        Artical::create($request->all());

        return redirect()->route('articals.index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artical $artical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artical $artical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticalRequest $request, Artical $artical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artical $artical)
    {
        //
    }
}
