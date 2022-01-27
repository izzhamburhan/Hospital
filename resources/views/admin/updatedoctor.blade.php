<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">

    @include('admin.css')
</head>
  <body>
    <div class="container-scroller">
      
     
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
      

          <div class="container-fluid page-body-wrapper">
              
          <div class="col-12 grid-margin stretch-card">
          
                <div class="card">
                  <div class="card-body">

                  @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}
            </div>

            @endif


                    <h4 class="card-title">Update Doctor</h4>
                    <p class="card-description"></p>
                    <form class="forms-sample" action="{{url('editdoctor',$data->id)}}" enctype="multipart/form-data" method="POST">
                      @csrf  
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" style="color:black;" class="form-control" id="name"  name="name" value="{{$data->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Phone</label>
                        <input type="number"  style="color:black;" class="form-control" id="phone" name=phone value="{{$data->phone}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Specialty</label>
                        <select  style="color:black;" name="specialty" id="" style="color:grey;" >
                            <option value="{{$data->specialty}}">{{$data->specialty}}</option>      
                            <option value="skin">Skin</option>
                            <option value="teeth">Teeth</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Room No.</label>
                        <input  style="color:black;" type="number" class="form-control" id="room_no" name=room_no value="{{$data->room_no}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Old Image</label>
                        <img src="doctorimage/{{$data->image}}" class="rounded mx-auto" alt="">
                      </div>
                      
                    
                        <div style="padding:15px;">
                        <label for="">Doctor Image</label>
                        <input type="file" name="file" required>
                         </div>

                         <input type="submit" class="btn btn-success">  

                    </form>
                  </div>
                </div>
              </div>
        
    </div>
        



          </div> <!-- container-fluid--->

       
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script');
  </body>
</html>