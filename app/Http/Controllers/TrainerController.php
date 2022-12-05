<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function swimindex()
    {
        $trainers = User::where('role_id', 3)->get();
        return view('coachswim', compact('trainers'));
    }

    public function gymindex()
    {
        $trainers = User::where('role_id', 4)->get();
        return view('coachswim', compact('trainers'));
    }

    public function dashboard() {
        $users = User::whereHas('sentMessages', function ($query) {
            $query->where('messages.user_recipient_id', auth()->user()->id);
        })->get();

        return view('messages', compact( 'users'));
    }
}
