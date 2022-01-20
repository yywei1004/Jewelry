<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $desc
 * @property int $price
 * @property int $qty
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends Model
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
    protected $fillable = ['type', 'name', 'desc', 'price', 'qty', 'created_at', 'updated_at', 'original_price'];

    //一個產品有很多圖
    public function imgs(){
        return $this->hasMany(ProductImg::class,'product_id','id');
    }

    //一個產品可以放到很多購物車
    public function shoppingcart(){
        return $this->hasMany(ShoppingCart::class,'product_id','id');
    }

    //一個產品可以在很多訂單明細出現
    public function order_detail(){
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
}
