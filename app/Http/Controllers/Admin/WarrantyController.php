<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Warranty;
use Carbon\Carbon;


class WarrantyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $allwarranty = Warranty::where('is_deleted', 0)->get();
        return view('admin.ecommerce.warranty.all', compact('allwarranty'));
    }
    // insert
    public function insert(Request $request)
    {
        $insert = Warranty::insertGetId([
            'w_ques' => $request['w_ques'],
            'w_ans' => $request['w_ans'],
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            $notification = array(
                'messege' => 'Warranty Insert Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty Insert Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    //
    public function active($id)
    {
        $active = Warranty::where('id', $id)->update([
            'status' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Warranty Active Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty Active Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function deactive($id)
    {
        $deactive = Warranty::where('id', $id)->update([
            'status' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Warranty DeActive Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty DeActive Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function softDelete($id)
    {
        $deactive = Warranty::where('id', $id)->update([
            'is_deleted' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Warranty Delete Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty Delete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function restore($id)
    {
        $deactive = Warranty::where('id', $id)->update([
            'is_deleted' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Warranty Restore Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty Restore Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // delete heard
    public function delete($id)
    {
        $delete = Warranty::where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'Warranty Delete Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty Delete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // edit
    public function edit($id)
    {
        $data = Warranty::where('id', $id)->first();
        return response($data);
    }
    // update
    public function update(Request $request)
    {
        $id = $request->id;
        $update = Warranty::where('id', $id)->update([
            'w_ques' => $request['w_ques'],
            'w_ans' => $request['w_ans'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'messege' => 'Warranty Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // multidelete
    public function multipleSoftDelete(Request $request)
    {
        $deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = Warranty::whereIn('id', $deleteid)->update([
                'is_deleted' => '1',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            if ($delet) {
                $notification = array(
                    'messege' => 'success',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'error',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Nothing To Delete',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }
}
