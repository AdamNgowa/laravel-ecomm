<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
       @include('admin.css')
  </head>

  <style>
    .title_deg{
        text-align: center;
        font-size: 30px;
        padding-bottom: 50px;
    }

    .order_table_deg{
        border-bottom: white 2px solid;
        margin: auto;
        width: 90%;       
        text-align: center; 
    }

    .th_deg{
        border-bottom: white 2px solid;
        margin-right: 15px;

    }

    .td_deg{
        margin-right: 15px;
    }
    .delivery_message{
        color:rgb(228, 10, 10);
    }
  </style>
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
                  <!-- success message end -->



            <h1 class="title_deg">All Orders</h1>

           {{--  search bar --}}
            <div style="padding:20px;">
              <form action="{{url('search')}}" method="get">
                @csrf
                <input style="color:rgb(5, 5, 5);" type="text" name="search" placeholder="Search for item...">
                <input type="submit" value="Search" class="btn btn-outline-primary">
              </form>
            </div>
            
            
               <table  class="order_table_deg">
                <tr>
                    <th  class="th_deg">Name</th>
                    <th class="th_deg">Email</th>
                    <th class="th_deg">Address</th>
                    <th class="th_deg">Phone</th>
                    <th class="th_deg">Product title</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Payment status</th>
                    <th class="th_deg">Delivery status</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Delivered</th>
                    <th class="th_deg">Send email</th>
                    
                </tr>
             
          @forelse ($order as $order)
                    
             <tr>
              <td class="td_deg">{{$order->name}}</td>
              <td class="td_deg">{{$order->email}}</td>
              <td class="td_deg">{{$order->address}}</td>
              <td class="td_deg">{{$order->phone}}</td>
              <td class="td_deg">{{$order->product_title}}</td>
              <td class="td_deg">{{$order->quantity}}</td>
              <td class="td_deg">{{$order->price}}</td>
               
              
              <td class="td_deg">
                  @if ($order->delivery_status=='processing')
                  {{$order->payment_status}}
                  @else
                      <p style="font-size: 16px;">Paid</p>
                  @endif
                  
              </td>

              <td class="td_deg">{{$order->delivery_status}}</td>
                
              {{-- image of order start --}}
              <td class="td_deg">
                  <img src="/product/{{$order->image}}" alt="">
              </td>
              {{-- image of order end --}}

              {{-- Delivery status button start --}}
              <td>
                  
              @if ($order->delivery_status=='processing')

              <a onclick="return confirm('Are you sure the item is delivered?')"  
              href="{{url('delivered',$order->id)}}" class="btn btn-success p-3">Delivered</a>

              @else
               <p class="delivery_message">Item delivered!</p>                    
              @endif
              </td>
              {{-- Delivery status button end --}}

              <td class="td_deg"><a class="btn btn-info" href="{{url('send_email',$order->id)}}">Send email</a></td>


           </tr>

                @empty
                <tr>
                  <td colspan="16">Item not found in the table</td>
                </tr>
                    
          @endforelse ($order as $order)                        
            
                
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