<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GamePlataform;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GamePlataformController extends Controller
{
    public function index(): View
    {
        $data['gamePlataforms'] = GamePlataform::paginate();

        return view('admin.game_plataform.index', $data);
    }

    public function create(): View
    {
        return view('admin.game_plataform.create');
    }

    public function store(Request $request)
    {
        $gamePlataform = new GamePlataform($request->all());
        $gamePlataform->is_active = $request->input('is_active') ? true : false;
        $gamePlataform->save();

        return redirect()->action([self::class, 'index']);
    }

    public function edit(GamePlataform $gamePlataform): View
    {
        $data['gamePlataform'] = $gamePlataform;
        return view('admin.game_plataform.edit', $data);
    }
}
