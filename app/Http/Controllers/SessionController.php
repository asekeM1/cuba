<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class SessionController extends Controller
{
    public function index(){
        $sessions = Session::orderBy('created_at','desc')->get();
        $current_session = session()->getId();

        return view('modules.sessions-list', ['sessions' => $sessions], ['session_now' => $current_session]);
    }
    public function store(Request $request)
    {
        if (Auth::check()) {
            $sessionData = $request->session()->all();
            $payload = base64_encode(serialize($sessionData));
            $ipAddress = $request->ip();
            $userAgent = $request->header('User-Agent');
            $current_session = session()->getId();
            $userId = Auth::id();

            DB::table('sessions')->insert([
                'user_id' => $userId,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'session' => $current_session,
                'payload' => $payload,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect('/');
    }
    public function destroy(Session $session){
        $session->delete();
        return redirect('/sessions')->with('message', 'Сессия успешно удалена!');
    }

    public function deleteAll()

    {
        $sessionId = session()->getId();
        Session::where('user_id', Auth::user()->id)
            ->whereNotIn('payload', [$sessionId])
            ->delete();
        return redirect()->back();

    }
}
