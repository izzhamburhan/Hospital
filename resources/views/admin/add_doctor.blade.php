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
    
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script');
  </body>
</html>