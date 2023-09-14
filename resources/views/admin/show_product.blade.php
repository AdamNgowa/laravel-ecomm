<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
       @include('admin.css')

       <style>
        .table_center {
            margin: auto;
            width: 100%;
            border-bottom: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }

        .h2_font{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }

           
     

        .th_design{
            padding: 30px;
            border-bottom: 3px solid white;
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

                <h2 class="h2_font" >All Products</h2>

                <table class="table_center">
                    <tr class="th_color" >
                        <th class="th_design" >Product Title</th>
                        <th class="th_design">Description</th>
                        <th class="th_design">Quantity</th>
                        <th class="th_design">Category</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Discount Price</th>
                        <th class="th_design">Product Image</th>
                        <th class="th_design">Delete</th>
                        <th class="th_design">Edit</th>
                        
                    </tr>

                @foreach ($product as $product)
                   <tr>
                    <td> {{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td> {{$product->quantity}} </td>
                    <td> {{$product->category}} </td>
                    <td> {{$product->price}}</td>
                    <td> {{$product->discount_price}}</td>

                    <td> 
                        <img  class="img_size" src="/product/{{$product->image}}" alt="image">
                    </td>

                    <td> <a class="btn btn-danger" onclick=" return confirm('Are you sure you want to delete this'); " href=" {{ url('delete_product',$product->id)}} ">Delete</a> </td>

                    <td> <a class="btn btn-info" href=" {{url('update_product',$product->id)}} ">Edit</a> </td>
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