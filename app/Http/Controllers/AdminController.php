<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotificationFirstTime;

class AdminController extends Controller
{
    public function addview()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
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
        if(Auth::id())
        {
            if(Auth::user()->usertype=1)
            {
                $data=appointment::all();
                 return view('admin.showappointment',compact('data'));
            }
            else
                return redirect()->back();
        }
        else
            return redirect()->back();
       
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

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->specialty=$request->specialty;
        $doctor->room_no=$request->room_no;

        $image=$request->file;

        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        }
        $doctor->save();

        return redirect()->back()->with('message','Update Success !');

    }

    public function emailview($id)
    {
        $data=appointment::find($id);

        return view('admin.email_view',compact('data'));
    }

    public function sendemail(Request $request, $id)
    {
        $data=appointment::find($id);
        $details=[
            'greeting'=> $request->greeting,
            'body'=>$request->body,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart
        ];

        Notification::send($data,new SendEmailNotificationFirstTime($details));

        return redirect()->back()->with('message','The Email has been sent.');
    }
}
