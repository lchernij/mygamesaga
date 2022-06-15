<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GameTag\GameTagStoreRequest;
use App\Http\Requests\Admin\GameTag\GameTagUpdateRequest;
use App\Models\GameTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GameTagController extends Controller
{
    public function index(): View
    {
        $data['gameTags'] = GameTag::orderBy('id')->paginate();

        return view('admin.game_tag.index', $data);
    }

    public function create(): View
    {
        return view('admin.game_tag.create');
    }

    public function store(GameTagStoreRequest $request): RedirectResponse
    {
        $gameTag = new GameTag($request->all());
        $gameTag->is_active = $request->input('is_active') ? true : false;
        $gameTag->save();

        return redirect()->action([self::class, 'show'], ['game_tag' => $gameTag]);
    }

    public function show(GameTag $gameTag): View
    {
        $data['gameTag'] = $gameTag;

        return view('admin.game_tag.show', $data);
    }

    public function edit(GameTag $gameTag): View
    {
        $data['gameTag'] = $gameTag;
        return view('admin.game_tag.edit', $data);
    }

    public function update(GameTag $gameTag, GameTagUpdateRequest $request): RedirectResponse
    {
        $gameTag->fill($request->all());
        $gameTag->is_active = $request->input('is_active') ? true : false;
        $gameTag->save();

        return redirect()->action([self::class, 'show'], ['game_tag' => $gameTag]);
    }

    public function active(GameTag $gameTag): RedirectResponse
    {
        $gameTag->is_active = true;
        $gameTag->save();

        return redirect()->back();
    }

    public function inactive(GameTag $gameTag): RedirectResponse
    {
        $gameTag->is_active = false;
        $gameTag->save();

        return redirect()->back();
    }

    public function destroy(GameTag $gameTag): RedirectResponse
    {
        $gameTag->delete();

        return redirect()->action([self::class, 'index']);
    }
}
