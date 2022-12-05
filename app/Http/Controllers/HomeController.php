<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Sodium\add;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('maincontent');
    }



    public function editpage()
    {
        return view('editprofile');
    }

    public function editphotopage()
    {
        return view('editphoto');
    }


    public function editphoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5000'
        ]);

        if ($validator->fails()) {
            return redirect()->route('home.editphotopage')->withErrors($validator);
        }

        $path = "img/userPhoto/";
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path($path), $imageName);

        $user = Auth::user();

        $user->photo = $path . $imageName;

        $user->save();

        return redirect()->route('personalaria');
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_of_born' => 'required',
            'phone' => 'required|max:19',
            'country' => 'required|max:50',
        ]);


        if ($validator->fails()) {
            return redirect()->route('home.editpage')->withErrors($validator);
        }

        $user = Auth::user();

        $user->date_of_born = $request->get("date_of_born");
        $user->phone = $request->get("phone");
        $user->country = $request->get("country");
        $user->Full_name = $request->get("Full_name");
        $user->email = $request->get('email');

        $user->save();

        return redirect()->route('personalaria');
    }
}
