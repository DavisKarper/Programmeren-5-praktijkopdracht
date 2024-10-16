<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        // return ($item);
        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource. <- GET
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage. <- POST
     */
    public function store(Request $request)
    {
        $item = new Item();

        $item->name = $request->input('name');
        $item->entries = $request->input('entries');
        $item->source_id = 0;
        // $item->user_id = auth()->user()->id;

        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(item $item)
    {
        return view('items.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(item $item)
    {
        //
    }
}
