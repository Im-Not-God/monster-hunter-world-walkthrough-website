<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $mac_address
 */
class Admin extends Authenticatable
{
    /**
     * @var array
     */
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['user_id', 'name', 'email', 'password', 'mac_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
