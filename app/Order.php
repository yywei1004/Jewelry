<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $user_id
 * @property int $total_price
 * @property int $shipping_fee
 * @property string $address
 * @property string $phone
 * @property int $ship_way
 * @property int $pay_way
 * @property int $status
 * @property string $order_number
 * @property string $created_at
 * @property string $updated_at
 */
class Order extends Model
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
    protected $fillable = ['user_id', 'total_price', 'shipping_fee', 'address', 'phone', 'ship_way', 'pay_way', 'status', 'order_number', 'created_at', 'updated_at'];

    //訂單屬於使用者
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    //訂單有很多明細
    public function order_detail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
