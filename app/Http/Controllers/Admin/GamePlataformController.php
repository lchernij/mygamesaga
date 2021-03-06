<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GamePlataform\GamePlataformStoreRequest;
use App\Http\Requests\Admin\GamePlataform\GamePlataformUpdateRequest;
use App\Models\GamePlataform;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GamePlataformController extends Controller
{
    public function index(): View
    {
        $data['gamePlataforms'] = GamePlataform::orderBy('id')->paginate();

        return view('admin.game_plataform.index', $data);
    }

    public function create(): View
    {
        return view('admin.game_plataform.create');
    }

    public function store(GamePlataformStoreRequest $request): RedirectResponse
    {
        $gamePlataform = new GamePlataform($request->all());
        $gamePlataform->is_active = $request->input('is_active') ? true : false;
        $gamePlataform->save();

        return redirect()->action([self::class, 'show'], ['game_plataform' => $gamePlataform]);
    }

    public function show(GamePlataform $gamePlataform): View
    {
        $data['gamePlataform'] = $gamePlataform;

        return view('admin.game_plataform.show', $data);
    }

    public function edit(GamePlataform $gamePlataform): View
    {
        $data['gamePlataform'] = $gamePlataform;
        return view('admin.game_plataform.edit', $data);
    }

    public function update(GamePlataform $gamePlataform, GamePlataformUpdateRequest $request): RedirectResponse
    {
        $gamePlataform->fill($request->all());
        $gamePlataform->is_active = $request->input('is_active') ? true : false;
        $gamePlataform->save();

        return redirect()->action([self::class, 'show'], ['game_plataform' => $gamePlataform]);
    }

    public function active(GamePlataform $gamePlataform): RedirectResponse
    {
        $gamePlataform->is_active = true;
        $gamePlataform->save();

        return redirect()->back();
    }

    public function inactive(GamePlataform $gamePlataform): RedirectResponse
    {
        $gamePlataform->is_active = false;
        $gamePlataform->save();

        return redirect()->back();
    }

    public function destroy(GamePlataform $gamePlataform): RedirectResponse
    {
        $gamePlataform->delete();

        return redirect()->action([self::class, 'index']);
    }
}
