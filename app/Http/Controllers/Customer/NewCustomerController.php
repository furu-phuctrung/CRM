<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\NewCustomer;
use App\Customer;
use App\User;
use App\Imports\NewCustomerImport;
use DB;
class NewCustomerController extends Controller
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

    public function getList(Request $rq)
    {
        $allUser = User::where('is_banned',0)->orderBy('username')->get();
        $items = NewCustomer::orderBy('created_at','DESC')->paginate(10);
        $customererror = DB::table('customererror')->get();


        return view('page.newCustomer.list',['customererror'=>$customererror,'items'=>$items, 'allUser'=>$allUser]);
    }

    public function postUploadCustomer(Request $rq){
        if($rq->hasFile('customerNew')){
            Excel::import(new NewCustomerImport, request()->file('customerNew'));
        }
        return redirect()->back();
    }

    public function postShareCustomer(Request $rq){
        try{
            $listNewCustomer = NewCustomer::whereIn('id',$rq->listShare)->get();
            $userShare = User::find($rq->userShare);
            if($userShare){
                $count = 0;
                foreach($listNewCustomer as $newCus){
                    $customer = new Customer();
                    $customer->relationship_id = 1;
                    $customer->customer_name = $newCus->customer_name;
                    $customer->phone = $newCus->phone;
                    $customer->email = $newCus->email;
                    $customer->fb = $newCus->fb;
                    $customer->duan = $newCus->duan;
                    $customer->note = $newCus->note;
                    $customer->users_owner = $userShare->id;
                    $customer->customer_resources = $newCus->customer_resources;
                    $customer->customer_resource_id = $newCus->customer_resources_id;
                    $customer->address = $newCus->address;
                    $customer->profession = $newCus->profession;
                    $customer->customer_status = 0;
                    $customer->gender = $newCus->gender;
                    $customer->users_add = auth()->user()->id;
                    if($customer->save()){
                        $newCus->delete();
                        $count++;
                    }
                }
                return json_encode(["isSuccess"=>true,"message"=> "Chia sẻ thành công " . $count . "/" . count($rq->listShare) . ' khách hàng cho ' . $userShare->name]);
            }else{
                return json_encode(["isSuccess"=>true,"message"=>"Không tìm thấy nhân viên"]);
            }
        }catch(Exception $e){
            return json_encode(["isSuccess"=>false,"message"=>"Chia sẻ thất bại"]);
        }

    }




}
