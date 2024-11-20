<?php

namespace App\Model\Game;

use App\Model\Classification;
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
        'synopsis',
        'user_id'
    ];

    protected function casts(): array
    {
        return [
            'release_date' => 'date',
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

    public function platforms()
    {
        return $this->hasMany(GamePlatform::class);
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id');
    }
}
