<?php

namespace App\Http\Controllers;

use App\Models\SkillRequest;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'to_user_id' => 'required|exists:users,id|different:from_user_id',
            'skill_offer_id' => 'required|exists:skills,id',
            'skill_wanted_id' => 'required|exists:skills,id',
        ]);

        SkillRequest::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->to_user_id,
            'skill_offer_id' => $request->skill_offer_id,
            'skill_wanted_id' => $request->skill_wanted_id,
            'status' => 'pendente'
        ]);

        return back()->with('success', 'Solicitação enviada com sucesso!');
    }

    public function accept($id)
    {
        $requestModel = SkillRequest::findOrFail($id);

        if ($requestModel->to_user_id !== Auth::id()) {
            abort(403);
        }

        $requestModel->update(['status' => 'aceita']);

        Session::create([
            'request_id' => $requestModel->id,
            'data_sessao' => now(),
            'start_time' => now()->format('H:i:s'),
            'end_time' => now()->addHour()->format('H:i:s'),
            'status' => 'pendente',
            'observacoes' => null,
        ]);

        return back()->with('success', 'Solicitação aceita e sessão criada!');
    }

    public function reject($id)
    {
        $requestModel = SkillRequest::findOrFail($id);

        if ($requestModel->to_user_id !== Auth::id()) {
            abort(403);
        }

        $requestModel->update(['status' => 'recusada']);

        return back()->with('success', 'Solicitação recusada.');
    }
}