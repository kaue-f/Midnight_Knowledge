<?php

namespace App\Model\Game;

use App\Model\Genre;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $keyType = 'string';

    protected $fillable = [
        'title',
        'image',
        'classification_id',
        'duration',
        'release_date',
        'developed_by',
        'user_id'
    ];

    protected function casts(): array
    {
        return [
            'release_date' => 'date:d/m/Y',
        ];
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('library', 'status', 'favorite')
            ->withTimestamps();
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre');
    }

    public function ratings()
    {
        return $this->hasMany(GameRating::class);
    }

    public function comments()
    {
        return $this->hasMany(GameComment::class);
    }

    public function plataforms()
    {
        return $this->hasMany(GamePlataform::class);
    }
}
