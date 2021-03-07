@extends('users.user_layout')

@section('user_content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payments of <strong>{{ $user->name }}</strong></h6>
        </div>

        <div class="card-body">
        	<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Admin</th>
                        <th>Date</th>
                        <th class="text-right">Total</th>
                        <th>Note</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-right">Total :</th>
                        <th class="text-right">{{ $user->payments()->sum('amount') }}</th>
                        <th colspan="2"></th>
                    </tr>
                </tfoot>
                <tbody>
                	@foreach($user->payments as $payment)
                	<tr>
                        <td>{{ optional($payment->admin)->name }}</td>
                        <td>{{ $payment->date }}</td>
                        <td class="text-right">{{ $payment->amount }}</td>
                        <td>{{ $payment->note }}</td>
                        <td class="text-right">
                        	
                        	<form action="{{ route('user.payments.destroy', ['id' => $user->id, 'payment_id' => $payment->id]) }}" method="post">
                        		
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

    <!-- Modal for add new payment -->

    

    <!-- Modal -->
    <div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentLabel" aria-hidden="true">
        
        <div class="modal-dialog" role="document">
            {!! Form::open(['route' => ['user.payments.store', $user->id], 'method' => 'post']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPaymentLabel">New Payments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal body start -->
                <div class="modal-body">

<div class="form-group row">
  <label for="date" class="col-sm-3 text-right col-form-label">Date <span class="text-danger">*</span></label>
  <div class="col-sm-9">
      {{ Form::date('date', Null, ['class' => 'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required']) }}
  </div>
</div>

<div class="form-group row">
  <label for="amount" class="col-sm-3 text-right col-form-label">Amount <span class="text-danger">*</span></label>
  <div class="col-sm-9">
      {{ Form::text('amount', Null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => 'Amount', 'required']) }}
  </div>
</div>

<div class="form-group row">
  <label for="note" class="col-sm-3 text-right col-form-label">Note</label>
  <div class="col-sm-9">
      {{ Form::textarea('note', Null, ['class' => 'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note']) }}
  </div>
</div>

                </div>
                <!-- Modal body end -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            !! Form::close() !!
        </div>
    </div>
    <!-- Modal for Add new payment END -->
@stop