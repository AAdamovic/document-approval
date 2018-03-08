<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Role;
use Illuminate\Database\Eloquent;

class User extends Authenticatable
{
    use Notifiable;
    
   // const ROLE_ADMINISTRATOR = 'administrator';
    const ROLE_ADMINISTRATOR = 'administrator';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotDeleted($query)
    {
        return $query->where('deleted', '=', '0');
    }
    public function role()
    {
        return $this->belongsTo('App\Model\Role', 'role_id');
    }
}
