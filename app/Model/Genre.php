<?php

namespace App\Model;

use App\Model\Anime\Anime;
use App\Model\Book\Book;
use App\Model\Game\Game;
use App\Model\Manga\Manga;
use App\Model\Movie\Movie;
use App\Model\Serie\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    public function animes()
    {
        return $this->belongsToMany(Anime::class, 'anime_genre');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genre');
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_genre');
    }

    public function mangas()
    {
        return $this->belongsToMany(Manga::class, 'manga_genre');
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre');
    }

    public function series()
    {
        return $this->belongsToMany(Serie::class, 'serie_genre');
    }
}
