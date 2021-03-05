@extends('layouts.main')

@section('main_content')
	<!-- <h2> products List </h2> -->

	<div class="row crearfix  page_header">
		<div class="col-md-6">
			<h2> Products </h2>
		</div>
		<div class="col-md-6 text-right">

		<a href="{{ route('products.create') }}" class="btn btn-info"> <i class="fa fa-plus"></i> New Product </a>

		</div>
	</div>

	<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Cost Price</th>
                            <th>Sale Price</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Cost Price</th>
                            <th>Sale Price</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	@foreach($products as $product)
                    	<tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->cost_price }}</td>
                            <td>{{ $product->price }}</td>
                            <td class="text-right">
                            	
                            	<form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                            		<a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary btn-sm">
                            			<i class="fa fa-edit"></i> 
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