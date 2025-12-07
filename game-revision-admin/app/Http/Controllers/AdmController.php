<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GameRevision;

class AdmController extends Controller
{
    public function app()
    {
        $revisions = GameRevision::orderBy('revision_date', 'desc')->paginate(10);
        $users = User::paginate(10);
        return view('layouts.app', compact('revisions','users'));
    }
}
