<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $desc
 * @property string $created_at
 * @property string $updated_at
 */
class Feedback extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'feedbacks';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'email', 'desc', 'created_at', 'updated_at'];

}
