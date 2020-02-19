<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\PermissionUserJunction;
use App\Models\PermissionLockJunction;
use App\Models\PermissionUserGroupJunction;

class User extends Authenticatable
{
        use HasApiTokens, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username','password','google2fa_secret','google2fa_enable',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','remember_token','google2fa_secret','google2fa_enable',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setGoogle2faSecretAttribute($value)
    //   {
    //        $this->attributes['google2fa_secret'] = encrypt($value);
    //   }
    //
    //   public function getGoogle2faSecretAttribute($value)
    //   {
    //       return decrypt($value);
    //   }


    public function permissionUserJunction(){
        return $this->hasMany(PermissionUserJunction::class, 'user_id')->with(['permission']);
    }

    public function permissionLockJunction(){
        return $this->hasMany(PermissionLockJunction::class, 'user_id')->with(['permission']);
    }

    public function permissionUserGroupJunction(){
        return $this->hasMany(PermissionUserGroupJunction::class, 'user_id')->with(['group']);
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permission_user_junction', 'user_id', 'permission_id');
    }

    public function permissionLocks() {
        return $this->belongsToMany(Permission::class, 'permission_lock_junction', 'user_id', 'permission_id');
    }

    public function permissionGroups() {
        return $this->belongsToMany(PermissionGroup::class, 'permission_user_group_junction', 'user_id', 'group_id');
    }

    //return all permission of user, include group permission of user
    public function getPermissionCode(){
        $allPermission = [];
        $listLockPermission = [];

        //get user lock permission
        foreach($this->permissionLocks as $lockPermission){
            $listLockPermission[] = $lockPermission->code;
        }

        //add user permission
        foreach($this->permissions as $p){
            if (!in_array($p->code, $listLockPermission)){ //not in lock
                $allPermission[] = $p->code;
            }
        }

        //add group permission
        foreach($this->permissionGroups as $group){
            $listGroupPermission = $group->getPermissionCode();
            foreach($listGroupPermission as $code){
                if (!in_array($code, $listLockPermission) && !in_array($code, $allPermission)){ //not in lock
                    $allPermission[] = $code;
                }
            }
        }

        return $allPermission;
    }

    public function havePermission($permissionCode)
      {
        return array_search($permissionCode,$this->getPermissionCode()) === false ? false : true ;
      }

      // @if(Auth::user()->havePermission('WiewSetting'))  true @else  false  @endif

}
