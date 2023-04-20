<?php

namespace App\Http\Controllers;

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
        return redirect('/sessions')->with('message', 'Сессия успешно удалена!');
    }

    public function deleteAll()

    {
        $sessionId = session()->getId();

        foreach (session()->all() as $key => $value) {
            if ($key !== '_token' && $key !== '_previous' && $key !== $sessionId) {
                session()->forget($key);
            }
        }

        return redirect()->back();
    }

}
