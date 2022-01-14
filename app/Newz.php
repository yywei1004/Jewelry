<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 */
class Newz extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'news';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title', 'text', 'created_at', 'updated_at'];

}
