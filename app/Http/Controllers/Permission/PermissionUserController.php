<?php

namespace App\Http\Controllers\Permission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\PermissionGroup;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionUserController extends Controller
{
    public function getList(Request $rq){
        $groups = PermissionGroup::allGroup();
        $groups = PermissionGroup::orderGroupByParent($groups);
        $searchParams = $rq->except(['page','token']);

        $users = User::orderBy('username');
        //search name
        $searchParams['username'] = $rq->name;
        if($rq->name){
            $users->where('username','like','%'.$rq->name.'%');
        }

        //search email
        $searchParams['email'] = $rq->email;
        if($rq->email){
            $users->where('email','like','%'.$rq->email.'%');
        }

        //search parent
        $searchParams['parent'] = $rq->parent;
        if($rq->parent){
            $users->whereExists(function ($query) use ($rq) {
                $query->select(DB::raw(1))
                      ->from('permission_user_group_junction')
                      ->whereRaw('user_id = users.id')
                      ->whereRaw('group_id = ' . (int) $rq->parent);

            });
        }

        $users = $users->paginate(20);

        return view('page.permissionUser.list', [
            'users'=>$users,
            'groups'=>$groups,
            'searchParams'=>$searchParams
        ]);
    }

    public function getEdit(Request $rq){
        $user = User::where('id', $rq->id)->first();
        if($user){
            $groups = PermissionGroup::allGroup();
            $groups = PermissionGroup::orderGroupByParent($groups);
            $permissions = Permission::all();
            $userPermissionIds = [];
            foreach($user->permissions as $p){
                $userPermissionIds[] = $p->id;
            }
            $userLockPermissionIds = [];
            foreach($user->permissionLocks as $p){
                $userLockPermissionIds[] = $p->id;
            }
            return view('page.permissionUser.edit', [
                'user'=>$user,
                'groups'=>$groups,
                'permissions'=>$permissions,
                'userPermissionIds'=>$userPermissionIds,
                'userLockPermissionIds'=>$userLockPermissionIds
            ]);
        }else{
            return redirect()->back();
        }
    }

    public function postEdit(Request $rq){
        $user = User::where('id', $rq->id)->first();
        if($user){
            if($rq->has('parent')){
                $array = (int) $rq->parent != 0 ? [$rq->parent] : [];
                $user->permissionGroups()->sync($array);
            }

            if($rq->has('permissions') || $rq->permissions == null){
                $array = [];
                if($rq->permissions != null){
                    foreach($rq->permissions as $value){
                        $array[] = $value;
                    }
                }
                $user->permissions()->sync($array);
            }

            if($rq->has('lockPermissions') || $rq->lockPermissions == null){
                $array = [];
                if($rq->lockPermissions != null){
                    foreach($rq->lockPermissions as $value){
                        $array[] = $value;
                    }
                }
                $user->permissionLocks()->sync($array);
            }

            return redirect()->route('permission.user.getEdit',['id'=>$user->id]);
        }else{
            return redirect()->back();
        }
    }
}
