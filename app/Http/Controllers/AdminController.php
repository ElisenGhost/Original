<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSportRequest;
use App\Models\Role;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function changerolepage(User $user)
    {
        $roles = Role::all();
        return view('changerole', ["user" => $user, "roles" => $roles]);
    }

    public function showuser()
    {
        $users = User::get();
        return view('admin', ['users' => $users]);
    }
    public function changerole(Request $request, User $user)
    {
        $user->role_id = $request->get("role_id");
        $user->save();
        return redirect()->route('usershow', ['id' => $user->id]);
    }

    public function editSports(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5000'
        ]);

        if ($validator->fails()) {
            return redirect()->route('')->withErrors($validator);
        }

        $path = "img/sportPhoto/";
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path($path), $imageName);

        $sport = Sport::find($id);

        $sport->photo = $path . $imageName;
        $sport->title = $request->get("title");

        $sport->save();

        return redirect()->route('maincontent');
    }

    public function addSports(AddSportRequest $request)
    {
        $newSport = $request->validated();
        $path = "img/sportPhoto/";
        $imageName = time().'.'.$newSport['image']->extension();
        $newSport['image']->move(public_path($path), $imageName);

        $sport = Sport::create([
            'title' => $newSport['title'],
            'description' => $newSport['description'],
            'photo' => $path . $imageName
        ]);

        $sport->save();

        return redirect()->route('maincontent');
    }

    public function addSportspage()
    {
        return view('addSport');
    }
}
