<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    

       @include('admin.css')

       <style>
        label{
            display: inline-block;
            width: 200px;
        }

        form{
            padding: 4px;            
            margin-top: 5px;
        }
        
       </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.header')
        <!-- partial -->

        <!-- Body starts here -->
        <div class="main-panel">
            <div class="content-wrapper">
                
            <!-- success message -->

            @if (session()->has('message'))
            
            <div class="alert alert-success">
                <button type="button " class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                {{session()->get('message')}}
            </div>

            @endif
           {{--  end of success message --}}


                <h1 style="text-align: left;font-size:25px;">Send Email to: <span style="color:rgb(2, 0, 0);background-color:rgb(253, 252, 252);border-radius:10px;padding:2px;"> {{$order->email }}</span></h1>

                      {{-- Sending emails form starts --}}
                <form action="{{url('send_user_email',$order->id)}}" method="POST">

                    @csrf
                    <div style="padding-left: 35%;padding-top:30px;">
                        <label for="">Email Greeting:</label>
                        <input style="color: black;" type="text" name="greeting">
                    </div>

                    <div style="padding-left: 35%;padding-top:30px;">
                        <label for="">Email Firstline:</label>
                        <input style="color: black;" type="text" name="firstline">
                    </div>

                    <div style="padding-left: 35%;padding-top:30px;">
                        <label for="">Email Body:</label>
                        <input style="color: black;" type="text" name="body">
                    </div>

                    <div style="padding-left: 35%;padding-top:30px;">
                        <label for="">Email Button Name:</label>
                        <input style="color: black;" type="text" name="button">
                    </div>

                    <div style="padding-left: 35%;padding-top:30px;">
                        <label for="">Email Url:</label>
                        <input style="color: black;" type="text" name="url">
                    </div>

                    <div style="padding-left: 35%;padding-top:30px;">
                        <label for="">Email Last line:</label>
                        <input style="color: black;" type="text" name="lastline">
                    </div>

                    <div style="padding-left: 35%;padding-top:30px;">
                       
                        <input type="submit" value="send Email" class="btn btn-primary">
                    </div>

                    

                </form>

                {{-- Sending emails form ends --}}
               

            </div>
        </div>
       <!-- Body ends here -->

       
    <!-- container-scroller -->
    <!-- plugins:js -->
       @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>