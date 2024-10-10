@extends('layout.master');
@section('content')
	<div class="section-header">
		<h1>Edit Product</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
			<div class="breadcrumb-item">Edit Product</div>
	    </div>
	</div>
	<div class="section-body">
		@if($product)
			<form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="row">
		          	<div class="col-12 col-md-6 col-lg-6">
		                <div class="card">
		                  	<div class="card-body">
			                    <div class="form-group">
			                      	<label>Name</label>
			                      	<input type="text" class="form-control" name="name" value="{{ $product->name }}">
			                      	<span style="color:red;">@error('name'){{$message}}@enderror</span>
			                    </div>
			                    <div class="form-group">
							    	<label>Price</label>
							    	<input type="text" class="form-control" name="price" value="{{ $product->price }}">
			                      	<span style="color:red;">@error('email'){{$message}}@enderror</span>
							  	</div>
			                    <div class="card-footer">
			                      	<button class="btn btn-primary">Submit</button>
			                    </div>
		                  	</div>
		                </div>
		          	</div>
		          	<div class="col-12 col-md-6 col-lg-6">
		                <div class="card">
		                  	<div class="card-body">
			                    <div class="form-group">
			                      	<div class="form-group">
										<label>Country</label>
										<select class="form-control select2 @error('country') is-invalid @enderror" name="country">
											<option value="">Select Country</option>
											<option value="IN" {{ ( $product->country == "IN") ? 'selected' : '' }}>India</option>
											<option value="AU" {{ ( $product->country == "AU") ? 'selected' : '' }}>Australia</option>
											<option value="CA" {{ ( $product->country == "CA") ? 'selected' : '' }}>Canada</option>
											<option value="CN" {{ ( $product->country == "CN") ? 'selected' : '' }}>China</option>
											<option value="AS" {{ ( $product->country == "AS") ? 'selected' : '' }}>American Samoa</option>
										</select>
										@error('country')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
			                    </div>
			                    <div class="row">
			                    	<div class="col-12 col-md-9 col-lg-8">
			                    		<div class="form-group">
					                      	<div class="form-group">
						                      	<label>Image</label>
						                      	<input type="file" class="form-control" name="image">
						                      	<span style="color:red;">@error('image'){{$message}}@enderror</span>
						                    </div>
					                    </div>
			                    	</div>
			                    	<div class="col-12 col-md-4 col-lg-4">
			                    		@if($product->image != '' && file_exists(public_path($product->image)))
		                                    <img class="profile-user-img img-responsive img-circle" src="{{ asset($product->image) }}" alt="Product Image" style="width: 100px; height: auto;">
		                                @endif
			                    	</div>
			                    </div>
		                  	</div>
		                </div>
		            </div>
		        </div>
			</form>
		@else
			<center><h3>No Record Found!</h3></center>
		@endif
	</div>
@endsection
