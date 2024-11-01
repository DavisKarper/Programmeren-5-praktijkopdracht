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
        $usersItems = Item::query()->where('user_id', $userid)->orderBy('id', 'DESC')->get();

        if (Auth::user()->admin == 1) {
            $allOtherItems = Item::query()->where('user_id', '!=', $userid)->orderBy('id', 'DESC')->get();
            return view('admin.dashboard', ['usersItems' => $usersItems, 'allOtherItems' => $allOtherItems]);
        } else {
            return view('user.dashboard', ['usersItems' => $usersItems]);
        };
    }

    public function verifyItem($id)
    {
        $item = Item::findOrFail($id);
        $item->verified = !$item->verified; // Toggle de verificatiestatus

        $item->save();

        return Redirect::route('dashboard');
    }


    /**
     * Display a listing of the resource.
     */
    public function adminCreateSource(Request $request)
    {
        if (Auth::user()->admin == 1) {
            return view('admin.create-source');
        } else {
            return Redirect::route('dashboard');
        };
    }

    public function adminStoreSource(Request $request)
    {
        if (Auth::user()->admin == 1) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $source = new Source();

            $source->name = $request->input('name');
            $source->save();

            return redirect()->route('dashboard');
            $item = new Item();
        } else {
            return Redirect::route('dashboard');
        };
    }
}
