<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      

      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>ANM Marketplace</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
           @include('home.header')
         <!-- end header section -->
      
      
              {{-- body starts here --}}
              <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; paddding:20px; ">
                <div class="box">

                    <!-- success message -->

            @if (session()->has('message'))
            
            <div class="alert alert-success">
                <button type="button " class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                {{session()->get('message')}}
            </div>

            @endif
                   
                   <div class="img-box">
                      <img src="/product/{{$product->image}}" alt="">
                   </div>
                   <div class="detail-box">
                      <h5>
                        {{$product->title}}
                      </h5>
   
                      @if ($product->discount_price!=null)
                      <h6 style="color: green;">
                        
                        ${{$product->discount_price}}
                     </h6>
   
                     <h6 style="text-decoration: line-through;color:red;" >
                        ${{$product->price}}
                     </h6>
   
   
                     @else
                     <h6 style="color: green;" >
                        ${{$product->price}}
                     </h6>
   
   
                      @endif

                      <h6>Product category: {{$product->category}}</h6>

                      <h6> Product description: {{$product->description}}</h6>

                      <h6 >Product quantity: {{$product->quantity}}</h6>
                      

                      <form action=" {{ url('add_cart',$product->id) }} " method="Post">

                        @csrf
                        
                        <div class="row">
                          <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min="1" style="width: 100%;border-radius:45px;">
                          </div>
                          <div class="col-md-4">
                            <input type="submit" value="Add to cart" >
                          </div>                 
                   
                        </div>
                
                      </form>
                      
                      
                   </div>
                </div>
             </div>    

              {{-- body ends here --}}
           


      

      <div class="cpy_">
         <p class="mx-auto">
            <div style="color: antiquewhite">
                © 2023 All Rights Reserved <span style="color: crimson"> ANM Group</span>
            </div>
                 
                
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>