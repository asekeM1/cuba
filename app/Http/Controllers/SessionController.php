<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class SessionController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $sessions = $user ? $user->sessions : [];

        return view('sessions.index', compact('sessions'));
    }

    public function terminateAll()
    {
        $user = auth()->user();
        $currentSessionId = session()->getId();

        foreach ($user->sessions as $session) {
            if ($session->id !== $currentSessionId) {
                $session->delete();
            }
        }

        return redirect()->route('sessions.index')
            ->with('success', 'All sessions except the current one have been terminated.');
    }

    public function terminate(Session $session)
    {
        $session->delete();

        return back()->with('success', 'Session has been terminated.');
    }
}
