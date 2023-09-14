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
            padding-bottom: 20px;
        }
        .table_center{
          margin: auto;
          width: 50%;
          color: antiquewhite;
          text-align: center;
          margin-top: 30px;
          border: 3px solid rgb(135, 136, 135);
          
        }
        label {
          display: inline-block;
          width: 200px;
        }

        .div_design{
            padding-bottom:15px; 
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

            <div class="div_center">
                  <h2 class="h2_font" >Update Product</h2>

                <form action=" {{ url('/update_product_confirm' ,$product->id)}} "  method="POST" enctype="multipart/form-data" >

                        @csrf

                    <div class="div_design" >
                        <label for=""> Product Title:</label>
                        <input required="" class="input_color" type="text" name="title" placeholder="Write a title" value="{{$product->title}}" >
                  
                      </div>
    
                      <div class="div_design">
                        <label for=""> Product Description:</label>
                        <input required="" class="input_color" type="text" name="description" placeholder="Write a description" value="{{$product->description}}" >
                  
                      </div>
                      <div class="div_design">
                        <label for=""> Product Price:</label>
                        <input required="" class="input_color" type="number" name="price" min="0" placeholder="  price "  value="{{$product->price}}">
                  
                      </div>
                      <div  class="div_design">
                        <label for="">Discount Price</label>
                        <input class="input_color" type="number" name="dis_price" placeholder=" discounted price" value="{{$product->disc_price}}" >
                  
                      </div>
                      <div class="div_design">
                        <label for=""> Product Quantity:</label>
                        <input required="" class="input_color" type="number"  min="0" name="quantity" placeholder=" quantity" value="{{$product->quantity}}" >
                  
                      </div>
                      
                      
                      <div class="div_design">
                        <label for=""> Product Category:</label>
                       <select required="" class="input_color" name="category" id="">
                        
                        <option value="{{$product->category}} " selected="" > {{$product->title}} </option>

                        @foreach ($category as $category)
                            <option value="{{$category->Category_name}}"> {{$category->Category_name}} </option>
                        @endforeach

                       </select>
                  
                      </div>

                      <div class="div_design">
                        <label for=""> Current Product Image Here:</label>
                       
                        <img  style="margin: auto; height:200px; width:300px;" src="/product/{{ $product->image }}" alt="">
                  
                      </div>

                      <div class="div_design">
                        <label for=""> Change Product Image Here:</label>
                        <input  type="file" name="image"  >
                  
                      </div>
    
                      <!-- SUBMIT BTN-->
                      <div class="div_design">
                        
                        <input  type="submit"   value="Update Product" class="btn btn-primary" >
                  
                      </div>
                      <!-- SUBMIT BTN END -->
    
                </form>

            </div>
        </div>  
        </div>     
       <!-- Body ends here -->

       
    <!-- container-scroller -->
    <!-- plugins:js -->
       @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>