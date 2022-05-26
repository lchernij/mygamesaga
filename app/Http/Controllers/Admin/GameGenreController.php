<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GameGenre\GameGenreStoreRequest;
use App\Http\Requests\Admin\GameGenre\GameGenreUpdateRequest;
use App\Models\GameGenre;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GameGenreController extends Controller
{
    public function index(): View
    {
        $data['gameGenres'] = GameGenre::orderBy('id')->paginate();

        return view('admin.game_genre.index', $data);
    }

    public function create(): View
    {
        return view('admin.game_genre.create');
    }

    public function store(GameGenreStoreRequest $request): RedirectResponse
    {
        $gameGenre = new GameGenre($request->all());
        $gameGenre->is_active = $request->input('is_active') ? true : false;
        $gameGenre->save();

        return redirect()->action([self::class, 'show'], ['game_genre' => $gameGenre]);
    }

    public function show(GameGenre $gameGenre): View
    {
        $data['gameGenre'] = $gameGenre;

        return view('admin.game_genre.show', $data);
    }

    public function edit(GameGenre $gameGenre): View
    {
        $data['gameGenre'] = $gameGenre;
        return view('admin.game_genre.edit', $data);
    }

    public function update(GameGenre $gameGenre, GameGenreUpdateRequest $request): RedirectResponse
    {
        $gameGenre->fill($request->all());
        $gameGenre->is_active = $request->input('is_active') ? true : false;
        $gameGenre->save();

        return redirect()->action([self::class, 'show'], ['game_genre' => $gameGenre]);
    }

    public function active(GameGenre $gameGenre): RedirectResponse
    {
        $gameGenre->is_active = true;
        $gameGenre->save();

        return redirect()->back();
    }

    public function inactive(GameGenre $gameGenre): RedirectResponse
    {
        $gameGenre->is_active = false;
        $gameGenre->save();

        return redirect()->back();
    }

    public function destroy(GameGenre $gameGenre): RedirectResponse
    {
        $gameGenre->delete();

        return redirect()->action([self::class, 'index']);
    }
}
