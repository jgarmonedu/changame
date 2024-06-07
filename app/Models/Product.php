<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $campaign
 * @property mixed $change_with
 * @property mixed $state
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

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

        $query->when($filters['noOwner'] ?? false, fn($query, $noOwner) =>$query->whereHas('owner', fn($query) => $query->whereNot('id', $noOwner)
        )
        );

        $query->when($filters['from_age'] ?? false, fn($query, $from_age) => $query->where(fn($query) => $query->where('from_age', '>=', $from_age)
        )
        );

        $query->when($filters['player_count_from'] ?? false, fn($query, $player_count_from) => $query->where(fn($query) => $query->where('player_count_from', '>=', $player_count_from)
        )
        );

        $query->when($filters['player_count_to'] ?? false, fn($query, $player_count_to) => $query->where(fn($query) => $query->where('player_count_to', '<=', $player_count_to)
        )
        );

        $query->when($filters['play_time'] ?? false, fn($query, $play_time) => $query->where(fn($query) => $query->where('play_time', '<=', $play_time)
        )
        );

        $query->when($filters['release_year'] ?? false, fn($query, $release_year) => $query->where(fn($query) => $query->where('release_year', '=', $release_year)
        )
        );

        $query->when($filters['difficulty'] ?? false, fn($query, $difficulty) => $query->where(fn($query) => $query->where('difficulty', '=', $difficulty)
        )
        );

        $query->when($filters['condition'] ?? false, fn($query, $condition) => $query->where(fn($query) => $query->where('condition', '=', $condition)
        )
        );

        $query->when($filters['language'] ?? false, fn($query, $language) => $query->where(fn($query) => $query->where('language', '=', $language)
        )
        );
    }


    public function getLastProducts($number) {
        return Product::latest()->whereNull('change_with')->take($number)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function agreement(): BelongsTo
    {
        return $this->BelongsTo(Product::class,'change_with');
    }

    public function donation(): BelongsTo
    {
        return $this->BelongsTo(Product::class, 'campaign');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class,'product_id');
    }

    public function isAgreementCompleted(Product $product): Boolean
    {
        $result = false;
        $change_with = Product::find($product->change_with)->first();
        if ($product->state == 3 && $change_with->state == 3) {
            $result = true;
        }
        return $result;
    }

}
