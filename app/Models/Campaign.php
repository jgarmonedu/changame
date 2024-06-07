<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;


class Campaign extends Model
{
    use HasFactory;

    public function campaignActive()
    {
        $now = Carbon::now()->format('Y-m-d');
        return $this->where('date_from','<=', $now)->where('date_to','>=', $now)->first();
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class,'campaign');
    }

}
