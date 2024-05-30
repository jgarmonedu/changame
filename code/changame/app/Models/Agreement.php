<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Agreement extends Model
{
    use HasFactory;

    public function product(): hasOne  // post_id
    {
        return $this->hasOne(Product::class,'product_id_user1');
    }

    public function agreementsByUser(User $user){
        return $user->first()->products()->whereNotNull('change_with');
    }

}
