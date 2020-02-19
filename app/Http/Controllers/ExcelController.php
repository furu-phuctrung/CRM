<?php


namespace App\Http\Controllers;


use App\Exports\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\Request;

class ExcelController extends Controller
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



  public function exportCustomer()
   {
       return Excel::download(new CustomerExport, 'Customer.xlsx');
   }




   // public function importCustomer()
   // {
   //     // Get current data from items table
   //     $titles = Item::lists('title')->toArray();
   //
   //         if(Input::hasFile('import_file')){
   //             $path = Input::file('import_file')->getRealPath();
   //             $data = Excel::load($path, function($reader) {
   //             })->get();
   //
   //             if(!empty($data) && $data->count()){
   //                 $insert = array();
   //
   //                 foreach ($data as $key => $value) {
   //                     // Skip title previously added using in_array
   //                     if (in_array($value->title, $titles))
   //                         continue;
   //
   //                     $insert[] = ['title' => $value->title, 'description' => $value->description];
   //
   //                     // Add new title to array
   //                     $titles[] = $value->title;
   //                 }
   //
   //                 if(!empty($insert)){
   //                     DB::table('items')->insert($insert);
   //                   //  dd('Insert Record successfully.');
   //                 }
   //             }
   //         }
   //     return back()->with('success', 'All good!');
   //
   // }













}
