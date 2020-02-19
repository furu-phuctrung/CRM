<?php

namespace App\Http\Controllers\Permission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PermissionGroup;
use App\Models\Permission;

class PermissionGroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware(['auth', '2fa', 'isban']);
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getList(Request $rq){
        $items = PermissionGroup::allGroup();
        $items = PermissionGroup::orderGroupByParent($items);
        return view('page.permissionGroup.list', ['items'=>$items]);
    }

    public function postCreate(Request $rq){
        $item = new PermissionGroup;
        $item->name = $rq->name;
        if($rq->parent){
            $item->parent_id = $rq->parent;
        }
        $item->is_active = true;
        $item->save();
        return redirect()->route('permission.permissionGroup.getList');
    }

    public function getEdit(Request $rq){
        $permissionGroup = PermissionGroup::find($rq->id);
        $allPermission = Permission::all();
        return view('page.permissionGroup.edit', ['permissionGroup'=>$permissionGroup,'allPermission'=>$allPermission]);
    }

    public function postEdit(Request $rq){
        $permissionGroup = PermissionGroup::where('is_active',1)->where('id',$rq->id)->first();
        if($permissionGroup && $rq->has('permissions')){
            $listP = [];
            foreach($rq->permissions as $value){
                $listP[] = $value;
            }
            $permissionGroup->permissions()->sync($listP);
        }
        return redirect()->back();
    }

    public function getDelete(Request $rq){
        $permissionGroup = PermissionGroup::find($rq->id);
        if($permissionGroup){
            $permissionGroup->is_active = 0;
            $permissionGroup->save();
        }
        return redirect()->route('permission.permissionGroup.getList');
    }
}
