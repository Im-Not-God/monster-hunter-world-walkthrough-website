<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $content
 * @property string $created_at
 */
class AuthorRegister extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'content', 'created_at'];
}
