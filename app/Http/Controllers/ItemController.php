<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Rarity;
use App\Models\Source;
use App\Models\Type;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rarities = Rarity::all();
        $types = Type::all();
        $sources = Source::all();

        $itemQuery = Item::query();
        $itemQuery->where('verified', true);

        $chosenTypes = $request->input('types', []);
        if (!empty($chosenTypes)) {
            $itemQuery->whereIn('type_id', $chosenTypes);
        }

        $chosenRarities = $request->input('rarities', []);
        if (!empty($chosenRarities)) {
            $itemQuery->whereIn('rarity_id', $chosenRarities);
        }

        $chosenSources = $request->input('sources', []);
        if (!empty($chosenSources)) {
            $itemQuery->whereIn('source_id', $chosenSources);
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $itemQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('entries', 'like', '%' . $search . '%');
            });
        }

        if ($request->input('orderBy') === 'oldest') {
            $itemQuery->orderBy('id', 'ASC');
        } elseif ($request->input('orderBy') === 'aFirst') {
            $itemQuery->orderBy('name', 'ASC');
        } elseif ($request->input('orderBy') === 'zFirst') {
            $itemQuery->orderBy('name', 'DESC');
        } else {
            $itemQuery->orderBy('id', 'DESC');
        }


        $items = $itemQuery->get();

        $previousSearch = $request;

        return view('items.index', ['items' => $items, 'rarities' => $rarities, 'types' => $types, 'sources' => $sources, 'previousSearch' => $previousSearch]);
    }

    /**
     * Show the form for creating a new resource. <- GET
     */
    public function create()
    {
        $rarities = Rarity::all();
        $types = Type::all();
        return view('items.create', ['rarities' => $rarities, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage. <- POST
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'entries' => 'required|string',
            'type' => 'required|integer',
            'rarity' => 'required|integer',
        ]);
        $item = new Item();

        if ($request->has('image')) {
            $nameOfFile = $request->file('image')->storePublicly('images', 'public');
            $item->image = $nameOfFile;
        }


        $item->name = $request->input('name');
        $item->entries = $request->input('entries');

        $item->reqAttune = $request->input('attuneDetails');
        $item->weight = $request->input('weight');

        $item->type_id = $request->input('type');
        $item->source_id = 1;
        $item->rarity_id = $request->input('rarity');
        $item->user_id = $request->user()->id;

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
