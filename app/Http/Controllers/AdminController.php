<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function addview()
    {

        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new doctor; //doctor class

        //saving image process in folder/document
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension(); //creating url image name
        $request->file->move('doctorimage',$imagename); // sending $imagename into 'doctorimage' folder
        $doctor->image=$imagename; // save image in database

        //saving information in database
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room_no=$request->room_no;
        $doctor->specialty=$request->specialty;

        //save
        $doctor->save();

        return redirect()->back()->with('message' , 'Doctor has Added Successfully');
    }

    public function showappointment()
    {
        $data=appointment::all();
        return view('admin.showappointment',compact('data'));
    }

    public function approved($id)
    {
        $data=appointment::find($id);

        $data->status='Approved';

        $data->save();

        return redirect()->back();
    }

    public function cancel($id)
    {
        $data=appointment::find($id);

        $data->status='Cancel';

        $data->save();

        return redirect()->back();
    }

    public function showdoctor()
    {
         if(Auth::id()) //supaya kalau ada orang nak masuk myappointment Melalui URL/http akan ditapis
        {
            $userid=Auth::user()->id; // 
            $data=doctor::all();

            return view('admin.showdoctor',compact('data'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function deletedoctor($id)
    {
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $data=doctor::find($id);
        return view('admin.updatedoctor',compact('data'));
    }

    public function editdoctor(Request $request,$id)
    {
        $doctor=doctor::find($id);

        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->specialty=$request->specialty;
        $data->room_no=$request->room_no;

        $image=$request->file;

        if($image)
        {
        $imagename=time().'.'.$image->getOriginalClientExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        }
        $doctor->save();

        return redirect()->back();

    }
}
