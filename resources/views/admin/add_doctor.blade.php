<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <style type="text/css">
        
        label
        {
            display: inline-block;
            width: 200px;
        }
    </style>

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

            <div class="container" style="padding-top:100px;" >

                    <!-- success message -->
                    @if(session()->has('message'))

                        <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert">x</button>
                        
                        {{ session()->get('message') }}

                        </div>
                    @endif

                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data" align="center" style="padding-top:50px;">
                    @csrf
                    <div style="padding:15px;">
                        <label for="">Doctor Name</label>
                        <input type="text" style="color:black;" name="name" placeholder="Write the name">
                    </div>

                    <div style="padding:15px;">
                        <label for="">Phone Number</label>
                        <input type="number" style="color:black;" name="phone" placeholder="Insert Your Number">
                    </div>

                    <div style="padding:15px;">
                        <label for="">Speciality</label>
                        <select name="specialty" id="" style="color:grey;">
                            <option value="">Choose One Specialty</option>      
                            <option value="skin">Skin</option>
                            <option value="teeth">Teeth</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                        </select>
                    </div>

                    <div style="padding:15px;">
                        <label for="">Room No.</label>
                        <input type="text" style="color:black;" name="room_no" placeholder="Insert the Room Number">
                    </div>

                    <div style="padding:15px;">
                        <label for="">Doctor Image</label>
                        <input type="file" name="file">
                    </div>

                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-success">
                    </div>

                </form>  <!-- form -->
            </div> <!-- container -->
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script');
  </body>
</html>