@extends('layout.master');
@section('content')
	<div class="section-header">
		<h1>Add Product</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
			<div class="breadcrumb-item">Add Product</div>
	    </div>
	</div>
	<div class="section-body">
		<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
			<div class="row">
              	<div class="col-12 col-md-6 col-lg-6">
	                <div class="card">
	                  	<div class="card-body">
		                    <div class="form-group">
		                      	<label>Name</label>
		                      	<input type="text" class="form-control" name="name">
		                      	<span style="color:red;">@error('name'){{$message}}@enderror</span>
		                    </div>
		                    <div class="form-group">
						    	<label>Price</label>
						    	<input type="text" class="form-control" name="price">
		                      	<span style="color:red;">@error('price'){{$message}}@enderror</span>
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
										<option value="IN">India</option>
										<option value="AU">Australia</option>
										<option value="CA">Canada</option>
										<option value="CN">China</option>
										<option value="AS">American Samoa</option>
									</select>
									@error('country')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
		                    </div>
		                    <div class="form-group">
		                      	<div class="form-group">
			                      	<label>Image</label>
			                      	<input type="file" class="form-control" name="image">
			                      	<span style="color:red;">@error('image'){{$message}}@enderror</span>
			                    </div>
		                    </div>
	                  	</div>
	                </div>
	            </div>
            </div>
		</form>
	</div>
@endsection
<!-- <script type="text/javascript">
	$(document).ready(function ()
	{
		$('.datemask').datepicker({minDate:1,dateFormat: "dd/mm/yy"});
	}):

    $(function() {
        $( "#birthday-date" ).datepicker({  minDate: new Date() });
    });
</script> -->
