<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Gamer;
use Illuminate\View\View;

class GamerController extends Controller
{
    public function index(): View
    {
        $gamers = Gamer::with([
            'gamingRig',
            'achievements',
            'games',
        ])->latest()->get();

        $games = Game::orderBy('title')->get();

        return view('gamers.index', compact('gamers', 'games'));
    }

    public function store(\Illuminate\Http\Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gamer_tag' => ['required', 'string', 'max:255', 'unique:gamers,gamer_tag'],
            'pc_name' => ['required', 'string', 'max:255'],
            'specs' => ['nullable', 'string'],
            'achievements' => ['nullable', 'array'],
            'achievements.*' => ['nullable', 'string', 'max:255'],
            'games' => ['nullable', 'array'],
            'games.*' => ['integer', 'exists:games,id'],
        ]);

        $gamer = Gamer::create([
            'name' => $validated['name'],
            'gamer_tag' => $validated['gamer_tag'],
        ]);

        $gamer->gamingRig()->create([
            'pc_name' => $validated['pc_name'],
            'specs' => $validated['specs'] ?? null,
        ]);

        $achievements = $request->input('achievements', []);

        foreach ($achievements as $title) {
            if (trim($title) !== '') {
                $gamer->achievements()->create([
                    'title' => trim($title),
                ]);
            }
        }

        $gameIds = $request->input('games', []);

        $gamer->games()->sync($gameIds);

        return redirect()
            ->route('gamers.index')
            ->with('success', 'Gamer registered successfully!');
    }

}
