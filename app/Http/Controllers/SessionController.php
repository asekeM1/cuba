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

        return view('modules.sessions-list', ['sessions' => $sessions]);
    }
    public function store(Request $request)
    {
        if (Auth::check()) {
            $sessionData = $request->session()->all();
            $payload = base64_encode(serialize($sessionData));
            $ipAddress = $request->ip();
            $userAgent = $request->header('User-Agent');
            $userId = Auth::id();

            DB::table('sessions')->insert([
                'user_id' => $userId,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
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
