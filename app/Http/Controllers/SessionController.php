<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with('request.solicitante', 'request.destinatario', 'request.skill')
            ->whereHas('request', function($q) {
                $q->where('solicitante_id', Auth::id())
                  ->orWhere('destinatario_id', Auth::id());
            })
            ->paginate(10);

        return view('sessions.index', compact('sessions'));
    }

    public function conclude($id)
    {
        $session = Session::with('request')->findOrFail($id);

        if ($session->request->solicitante_id !== Auth::id() && $session->request->destinatario_id !== Auth::id()) {
            abort(403);
        }

        if ($session->status === 'concluida' || $session->status === 'cancelada') {
            return back()->with('error', 'Sessão não pode ser concluída.');
        }

        $session->update(['status' => 'concluida']);

        return back()->with('success', 'Sessão concluída com sucesso!');
    }
}