<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $post_id
 * @property integer $user_id
 * @property string $created_at
 */
class DeletePost extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['post_id', 'user_id', 'created_at'];
}
