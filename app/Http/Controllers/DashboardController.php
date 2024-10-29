<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\Item;
use App\Models\Rarity;
use App\Models\Source;
use App\Models\Type;


class DashboardController extends Controller
{
    /**
     * Goes to the dashboard suitable for the user
     */
    public function index(Request $request)
    {
        $userid = $request->user()->id;
        $usersItems = Item::query()->where('user_id', $userid)->get();

        if (Auth::user()->admin == 1) {
            return view('admin.dashboard', ['usersItems' => $usersItems]);
        } else {
            return view('user.dashboard', ['usersItems' => $usersItems]);
        };
    }

    /**
     * Display a listing of the resource.
     */
    public function adminCreateItem(Request $request)
    {
        if (Auth::user()->admin == 1) {
            $rarities = Rarity::all();
            $types = Type::all();
            return view('admin.create-item', ['rarities' => $rarities, 'types' => $types]);
        } else {
            return Redirect::route('dashboard');
        };
    }
}
