<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property integer $view
 * @property integer $like
 * @property boolean $state
 */
class Post extends Model
{
    /**
     * @var array
     */
    public $timestamps = false;
    protected $fillable = ['user_id', 'title', 'content', 'created_at', 'view', 'like', 'state'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
