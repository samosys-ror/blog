<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lname','username','mobile','phone', 'email', 'password','show_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

  public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    
    
  public function hasAnyRoles($roles)
    {
        if($this->roles()->where('name',$role)->first())
        {
            return true;
            
        }   
        else
        {
            return false;
        }   

      }
      
 public function hasRole($roles)
    {
        if($this->roles()->where('name',$roles)->first())
        {
            return true;
            
        }   
        else
        {
            return false;
        }  
      }    



    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
