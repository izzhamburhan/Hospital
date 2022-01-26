<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
