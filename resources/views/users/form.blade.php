@extends('layouts.main')

@section('main_content')

<!-- 
                                            Form validation Errors :
-->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($mode == 'edit')
<h2> Update <strong> {{ $user->name }} </strong> Information </h2>
@else
<h2> Add New User </h2>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update User Info</h6>
    </div>
    <div class="card-body">
    	<div class="row justify-content-md-center">
    		<div class="col-md-8">
                  @if($mode == 'edit')
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                  @else
                    {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'post']) !!}
                  @endif

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