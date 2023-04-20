<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user) {
            $sessions = $user->sessions()->orderBy('created_at', 'desc')->get();

            return view('modules.sessions-list', compact('sessions'));
        } else {
            return redirect()->route('login');
        }
    }

    public function destroy(Session $session){
        $session->delete();
        return redirect('/')->with('message', 'Сессия успешно удалена!');
    }

    public function deleteAll()
    {
        DB::table('sessions')->delete();

        return redirect()->back()->with('success', 'Все сессии успешно удалены!');
    }

}
