@extends('layout.master');
@section('content')
	<div class="section-header">
		<h1>Product List</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
			<div class="breadcrumb-item">Product List</div>
			<div style="padding: 0.75rem 1.25rem;">
				<a class="btn btn-primary btn-sm" href="{{route('product.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Product</a>
            </div>
	    </div>
	</div>
	<div class="section-body">
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped table-md">
					<tr>
						<th>Image</th>
					  	<th>Name</th>
					  	<th>Country</th>
					  	<th>Price</th>
					  	<th>Action</th>
					</tr>
					@if($products && $products->count())
						@foreach($products as $key => $row)
							<tr>
							  	<td><img src="{{$row->image}}" alt="Product Image" style="width: 70px;"></td>
							  	<td>{{ $row->name }}</td>
							  	<td>{{ $row->country }}</td>
							  	<td>{{ $row->price }}</td>
							  	<td>
							  		<div class="row ml-0">
							  			<a href="{{ route('product.edit', $row->id) }}" style="padding-top: 2px;"><i class="fa fa-edit text-info"></i></a>
										<form class="ml-1" action="{{ URL::route('product.destroy', $row->id) }}" method="POST">
											@csrf
											@method('DELETE')
											<button class="btn" onclick="return confirm('Are you sure delete?')"><i class="fa fa-trash text-info"></i></button>
										</form>
							  		</div>
							  	</td>
							</tr>
						@endforeach
					@else
						<tr>
						  	<td colspan="6"><center><b>No Record Found!</b></center></td>
						</tr>
					@endif
				</table>
			</div>
		</div>
	</div>
@endsection
