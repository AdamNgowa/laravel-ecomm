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

      <style>
        table{
            margin: auto;
              width: 80%;
              text-align: center;
              padding: 30px;
        }
        th{
            border-bottom: black 2px solid;
        }

        td{
            border-bottom: black 2px solid;
        }
        img{
            width: 300px;
            height: auto;
            margin: auto;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg fixed-top bg-light p-2 custom_nav-container ">
        
                  <a class="navbar-brand" href=" {{ url('/') }} "><p class="anm-market-logo" style="border: 2px solid red;padding:5px;color:black;font-family:Arial, Helvetica, sans-serif;">ANM Marketplace</p></a>
        
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href=" {{ url('/') }} ">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="{{url('aboutus')}}">About</a></li>
                              <li><a href="{{url('testimonial')}}">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('products')}}">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('blog')}}">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('contact')}}">Contact</a>
                        </li>
        
                        <li class="nav-item">
                          <a class="nav-link" href=" {{ url('show_cart') }} ">Cart</a>
                       </li>
        
                       <li class="nav-item active">
                          <a class="nav-link" href=" {{ url('show_order') }} ">Orders</a>
                       </li>
        
                        <form class="form-inline">
                          <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                          <i class="fa fa-search" aria-hidden="true"></i>
                          </button>
                       </form>
                           
                        
        
                       @if (Route::has('login'))
                       @auth
                       <li class="nav-item">
                          <x-app-layout>
            
                          </x-app-layout>
                          
                        </li>
                       @else
                       <li class="nav-item">
                          <a class="btn btn-primary" id="logincss"href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                       </li>
                       @endauth
        
                       @endif
                        
        
                       
                       
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->

              

         <div>
            <table>
                <tr>
                    <th>Product title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment status</th>
                    <th>Delivery status</th>
                    <th>Image</th>
                    <th>Cancel order</th>
                </tr>

                @foreach ($order as $order)
                
                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>

                    <td>
                        <img src="product/{{$order->image}}" >
                    </td>
                    <td>
                        @if ($order->delivery_status =='processing')
                        <a onclick="return confirm('Are you sure you want to cancel this order?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel order</a>
                        @else
                            <p>Already delivered</p>
                        @endif
                        
                    </td>
                </tr>  
                @endforeach
                
            </table>
         </div>
         
      </div>      

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