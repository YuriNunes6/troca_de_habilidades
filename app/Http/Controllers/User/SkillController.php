<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $user = auth()->user()->load('skills');
        return view('user.skills.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user()->load('skills');
        $skills = Skill::all();
        return view('user.skills.edit_skills', compact('user', 'skills'));
    }

    public function update(Request $request)
{
    $user = auth()->user();

    $skills = $request->input('skills', []);

    $syncData = [];
    foreach ($skills as $skillId) {
        $syncData[$skillId] = [
            'nivel_academico' => $request->input("nivel_academico.$skillId", null),
            'tempo_experiencia' => $request->input("tempo_experiencia.$skillId", null),
            'descricao' => $request->input("descricao.$skillId", null),
        ];
    }

    $user->skills()->sync($syncData);

    return redirect()->route('user.skills.index')->with('success', 'Skills atualizadas com sucesso!');
}
}