@extends('layouts.main')

@section('main_content')
	<!-- <h2> Users List </h2> -->

	<div class="row clearfix  page_header">
		<div class="col-md-2">
			<a href="{{ route('users.index') }}" class="btn btn-info"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
		</div>
		<div class="col-md-10 text-right">

		<a href="{{ route('users.create') }}" class="btn btn-info"> <i class="fa fa-plus"></i> New Sale </a>
		
		<!-- Purchase Button trigger Modal -->
	    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
	        <i class="fa fa-plus"></i> New Purchase
	    </button>

		<!-- Payment Button trigger Modal -->
	    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
	        <i class="fa fa-plus"></i> New Payment
	    </button>
	    
	    <!-- Receipt Button trigger Modal -->
	    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
	        <i class="fa fa-plus"></i> New Receipt
	    </button>

		</div>
	</div>


	<div class="row clearfix mt-5">
	  
	  <div class="col-md-2">
	    <div class="nav flex-column nav-pills">
	      <a class="nav-link @if($tab_menu == 'user_info') active @endif" href="{{ route('users.show', $user->id) }}">User Info</a>
	      <a class="nav-link @if($tab_menu == 'sales') active @endif" href="{{ route('user.sales', $user->id) }}">Sales</a>
	      <a class="nav-link @if($tab_menu == 'purchases') active @endif" href="{{ route('user.purchases', $user->id) }}">Purchase</a>
	      <a class="nav-link @if($tab_menu == 'payments') active @endif" href="{{ route('user.payments', $user->id) }}">Payments</a>
	      <a class="nav-link @if($tab_menu == 'receipts') active @endif" href="{{ route('user.receipts', $user->id) }}">Receipts</a>
	    </div>
	  </div>
	  
	  <div class="col-md-10">
	    
	    @yield('user_content')

	  </div>
	
	</div>
	
@stop