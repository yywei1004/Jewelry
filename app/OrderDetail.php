<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $order_id
 * @property int $product_id
 * @property int $price
 * @property int $qty
 * @property string $created_at
 * @property string $updated_at
 */
class OrderDetail extends Model
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
    protected $fillable = ['order_id', 'product_id', 'price', 'qty', 'created_at', 'updated_at'];

    //訂單明細屬於訂單
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }

    //?
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
