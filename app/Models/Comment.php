<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $content
 * @property integer $post_id
 * @property string $created_at
 */
class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'content', 'post_id', 'created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
