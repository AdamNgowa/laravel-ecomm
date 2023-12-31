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
         
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>

      <!-- why section -->
         @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
        @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
        @include('home.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->

      <!-- client section -->
        @include('home.client_section')
      <!-- end client section -->

      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">
            <div style="color: antiquewhite">
                © 2023 All Rights Reserved <span style="color: crimson"> ANM Group</span>
            </div>
                 
                
         </p>
      </div>


      {{-- CODE THAT KEEPS YOU IN THE SAME POSITION START --}}
      <script>
         document.addEventListener("DOMContentLoaded" ,function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0,scrollpos);
         });

         window.onbeforeunload = function (e) {
            localStorage.setItem('scrollops' ,window.scrollY);
         };
      </script>
      {{-- CODE THAT KEEPS YOU IN THE SAME POSITION END --}}
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