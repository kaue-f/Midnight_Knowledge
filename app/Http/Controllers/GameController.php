<?php

namespace App\Http\Controllers;

use App\Model\Game\Game;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function create(array $gameDTO)
    {
        $game = Game::create([
            'title' => $gameDTO['title'],
            'synopsis' => $gameDTO['synopsis'],
            'classification_id' => $gameDTO['classification'],
            'duration' => $gameDTO['duration'],
            'release_date' => $gameDTO['release_date'],
            'developed_by' => $gameDTO['developed_by'],
            // 'user_id' => Auth::id(),
            'user_id' => '7753cca1-94d0-11ef-8f44-04d4c457a3bb',  #Usuário de teste
        ]);
        $this->saveImage($game, $gameDTO['image']);
        $this->attachGenresToGame($game, $gameDTO['genres']);
        $this->attachPlataformsToGame($game, $gameDTO['plataforms']);

        return $game;
    }
    public function saveImage(Game $game, $image)
    {
        if (!isNullOrEmpty($image)) {
            $path = $image->storeAs('covers/games', "{$game['id']}.{$image->extension()}");
            $game->update(['image' => $path,]);
        }
    }

    public function attachGenresToGame(Game $game, array $genres)
    {
        if (!isNullOrEmpty($genres))
            $game->genres()->attach($genres);
    }

    public function attachPlataformsToGame(Game $game, array $plataforms)
    {
        if (!isNullOrEmpty($plataforms)) {
            foreach ($plataforms as $plataform) {
                $game->plataforms()->create([
                    'plataform' => $plataform
                ]);
            }
        }
    }
}
