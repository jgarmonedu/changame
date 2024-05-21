<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['category', 'owner'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
        )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category)
        )
        );

        $query->when($filters['owner'] ?? false, fn($query, $owner) => $query->whereHas('owner', fn($query) => $query->where('id', $owner)
        )
        );

        $query->when($filters['from_age'] ?? false, fn($query, $from_age) => $query->where(fn($query) => $query->where('from_age','>=',$from_age)
        )
        );

        $query->when($filters['player_count_from'] ?? false, fn($query, $player_count_from) => $query->where(fn($query) => $query->where('player_count_from','>=',$player_count_from)
        )
        );

        $query->when($filters['player_count_to'] ?? false, fn($query, $player_count_to) => $query->where(fn($query) => $query->where('player_count_to','<=',$player_count_to)
        )
        );

        $query->when($filters['play_time'] ?? false, fn($query, $play_time) => $query->where(fn($query) => $query->where('play_time','<=',$play_time)
        )
        );

        $query->when($filters['release_year'] ?? false, fn($query, $release_year) => $query->where(fn($query) => $query->where('release_year','=',$release_year)
        )
        );

        $query->when($filters['difficulty'] ?? false, fn($query, $difficulty) => $query->where(fn($query) => $query->where('difficulty','=',$difficulty)
        )
        );

        $query->when($filters['condition'] ?? false, fn($query, $condition) => $query->where(fn($query) => $query->where('condition','=',$condition)
        )
        );

        $query->when($filters['language'] ?? false, fn($query, $language) => $query->where(fn($query) => $query->where('language','=',$language)
        )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
