<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
       @include('admin.css')

       <style>
        .div_center{
            text-align: center;
            padding-top:40px; 
        }
        .h2_font {
            font-size: 40px;
            padding-bottom: 40xp;
        }
        
        .input_color {
            color: black;
        }
        .table_center{
          margin: auto;
          width: 50%;
          color: antiquewhite;
          text-align: center;
          margin-top: 30px;
          border: 3px solid rgb(135, 136, 135);
          
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
                
                 <!-- The input form -->
                <div class="div_center">
                    <h2 class="h2_font">  Add Category  </h2>

                   <form  action="{{url('/add_category')}}" method="POST" >
                     @csrf
                    <input class="input_color" type="text" name="category" placeholder="Write Category Name" >
                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                   </form>              
                </div>
                 <!-- End of the input form -->
                  
                 <!-- Category table -->
                 <table class="table_center">
                  <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                  </tr>

                  @foreach ($data as $data)

                  <tr >

                    <td>{{$data->Category_name}}</td>

                    <td>
                      <a onclick=" return confirm('Are you sure you want to delete this item?')" class="btn btn-danger" href="
                      {{ url('delete_category',$data->id)  }}" >Delete</a>
                    </td>

                  </tr>

                  @endforeach
                
                 </table>

            </div>    

        </div>
        <!-- Body ends here -->


    <!-- container-scroller -->
    <!-- plugins:js -->
       @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>