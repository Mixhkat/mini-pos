@extends('users.user_layout')

@section('user_content')
	<!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchases of <strong>{{ $user->name }}</strong></h6>
        </div>

        <div class="card-body">
        	<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    	<th>Challan No</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    	<th>Challan No</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th class="text-right">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                	@foreach($user->purchases as $purchase)
                	<tr>
                        <td>{{ $purchase->challan_no }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $purchase->date }}</td>
                        <td>100</td>
                        <td class="text-right">
                        	
                        	<form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                        		<a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i> 
                                </a>
                        		@csrf
                        		@method('DELETE')
                        		<button onclick="return confirm('Are yoou sure?')" type="submit" class="btn btn-danger btn-sm">
                        			<i class="fa fa-trash"></i> 
                        		</button>
                        	</form>
                        </td>
                    </tr>
                	@endforeach
                </tbody>
            </table>
        	</div>
       </div>
    </div>
@stop