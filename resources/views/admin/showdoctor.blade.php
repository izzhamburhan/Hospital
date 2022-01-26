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

    <!-- test -->
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List of Doctor</h4>
                    <div class="table-responsive">
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
                <td><img class="rounded img-fluid" src="doctorimage/{{$doctor->image}}" alt=""></td>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->phone}}</td>
                <td>{{$doctor->specialty}}</td>
                <td>{{$doctor->room_no}}</td>
                <td><a onclick="return confirm('are you sure to delete this?')" class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>
                <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</a></td>
            </tr>
            @endforeach
        </table>
                    </div>
                  </div>
                </div>
              </div>    



    </div>
    <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script');
  </body>
</html>