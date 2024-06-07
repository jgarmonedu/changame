<?php

namespace App\Models;

use DragonCode\Support\Helpers\Boolean;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Agreement extends Model
{
    use HasFactory;

    public function product(): hasOne  // post_id
    {
        return $this->hasOne(Product::class,'product_id_user1');
    }

    public function getAgreementByProduct($product): Agreement
    {
        return $this->query()
            ->where('product_id_user1', $product)
            ->orWhere('product_id_user2', $product)
            ->first();
    }

}
