@extends('layouts.adminheader')
@section('content')
    <!-- Header -->
 <header class="w3-container" style="padding-top:22px">
   <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
 </header>

 <div class="w3-row-padding w3-margin-bottom">

   <div class="w3-quarter">
     <div class="w3-container w3-teal w3-padding-16">
       <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
       <a href="{{route('admin.orders')}}">
       <div class="w3-right">
         <h3>{{DB::table('orders')->count()}}</h3>
       </div>
       </a>
       <div class="w3-clear"></div>
       <h4>Orders</h4>
     </div>
   </div>
   <div class="w3-quarter">
     <div class="w3-container w3-blue w3-padding-16">
       <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
       <a href="{{route('admin.contact')}}">
       <div class="w3-right">
         <h3>{{DB::table('contacts')->count()}}</h3>
       </div>
     </a>
       <div class="w3-clear"></div>
       <h4>Contacts</h4>
     </div>
   </div>
   <div class="w3-quarter">
     <div class="w3-container w3-orange w3-text-white w3-padding-16">
       <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
       <div class="w3-right">
         <h3>{{DB::table('users')->count()}}</h3>

       </div>
       <div class="w3-clear"></div>
       <h4>Users</h4>
     </div>
   </div>
 </div>

@stop
