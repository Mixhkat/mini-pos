@extends('layouts.main')

@section('main_content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2> Create new User </h2>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">New User Info</h6>
    </div>
    <div class="card-body">
    	<div class="row justify-content-md-center">
    		<div class="col-md-8">

                  {!! Form::open(['route' => 'users.store', 'method' => 'post']) !!}

                  <div class="form-group row">
                    <label for="group" class="col-sm-3 col-form-label">User Group <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        {{ Form::select('group_id', $groups, Null, ['class' => 'form-control', 'id' => 'group', 'placeholder' => 'Select Group']) }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        {{ Form::text('name', Null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        {{ Form::text('email', Null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                        {{ Form::text('phone', Null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone']) }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        {{ Form::text('address', Null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Address']) }}
                    </div>
                  </div>

                  <div class="mt-4 text-right">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>

                  {!! Form::close() !!}

				</form>
    		</div>
    	</div>
    </div>
</div>

@stop