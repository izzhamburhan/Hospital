<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>
  <body>
    <div class="container-scroller">
      
     
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
      
    <div class="page-body-wrapper">

        <div class="">
        <table class="table ">
            <tr>
                <th>Profile</th>
                <th>Doctor Name</th>
                <th>Phone</th>
                <th>Specialty</th>
                <th>Room No.</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            @foreach($data as $doctor)
            <tr>
                <td><img height="300px" width="200px" class="rounded-circle img-fluid" src="doctorimage/{{$doctor->image}}" alt=""></td>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->phone}}</td>
                <td>{{$doctor->specialty}}</td>
                <td>{{$doctor->room_no}}</td>
                <td><a onclick="return confirm('are you sure to delete this?')" class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>
                <td><a class="btn btn-primary" href="">Update</a></td>
            </tr>
            @endforeach
        </table>
            
        </div>

    </div>


          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script');
  </body>
</html>