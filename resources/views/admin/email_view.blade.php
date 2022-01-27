<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <base href="/public">

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
            <div class="container" style="padding-top:100px;" align="center" >
             <!-- success message -->
             @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button> 
                    {{ session()->get('message') }}
                </div>
                
                @endif
                <form action="{{ url('sendemail',$data->id) }}" method="POST" enctype="multipart/form-data" align="center" style="padding-top:50px;">
                    @csrf
                    <div style="padding:15px;">
                        <label for="">Greeting</label>
                        <input type="text" style="color:black;" name="greeting" placeholder="" required>
                    </div>

                    <div style="padding:15px;">
                        <label for="">Body</label>
                        <input type="text" style="color:black;" name="phone" placeholder="" required>
                    </div>

                    <div style="padding:15px;">
                        <label for="">Action Text</label>
                        <input type="text" style="color:black;" name="actiontext" placeholder="" required>
                    </div>

                    <div style="padding:15px;">
                        <label for="">Action Url</label>
                        <input type="text" style="color:black;" name="actionurl" placeholder="" required>
                    </div>

                    <div style="padding:15px;">
                        <label for="">End Part</label>
                        <input type="text" style="color:black;" name="endpart" placeholder="" required>
                    </div>


                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-success">
                    </div>

                </form>  <!-- form -->
            </div> <!-- container -->

</div>

    <!-- test -->
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script');
  </body>
</html>