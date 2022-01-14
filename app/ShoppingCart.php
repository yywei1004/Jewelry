<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $user_id
 * @property int $product_id
 * @property int $price
 * @property int $qty
 * @property string $created_at
 * @property string $updated_at
 */
class ShoppingCart extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'product_id', 'price', 'qty', 'created_at', 'updated_at'];

    //購物車屬於使用者
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    //?
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
