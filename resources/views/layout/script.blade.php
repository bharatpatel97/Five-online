<!-- General JS Scripts -->
<script src="{{ URL::asset('assets/modules/jquery.min.js'); }}"></script>
<script src="{{ URL::asset('assets/modules/popper.js'); }}"></script>
<script src="{{ URL::asset('assets/modules/tooltip.js'); }}"></script>
<script src="{{ URL::asset('assets/modules/bootstrap/js/bootstrap.min.js'); }}"></script>
<script src="{{ URL::asset('assets/modules/nicescroll/jquery.nicescroll.min.js'); }}"></script>
<script src="{{ URL::asset('assets/modules/moment.min.js'); }}"></script>
<script src="{{ URL::asset('assets/js/stisla.js'); }}"></script>

<!-- JS Libraies -->
<script src="{{ URL::asset('assets/modules/jquery.sparkline.min.js'); }}"></script>
<script src="{{ URL::asset('assets/modules/chart.min.js'); }}"></script>
<script src="{{ URL::asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js'); }}"></script>
<script src="{{ URL::asset('assets/modules/summernote/summernote-bs4.js'); }}"></script>
<script src="{{ URL::asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js'); }}"></script>

<!-- Page Specific JS File -->
<script src="{{ URL::asset('assets/js/page/index.js'); }}"></script>

<!-- Template JS File -->
<script src="{{ URL::asset('assets/js/scripts.js'); }}"></script>
<script src="{{ URL::asset('assets/js/custom.js'); }}"></script>

<script type="text/javascript">
	function isNumber(evt) 
	{
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}
</script>

<!-- toastr -->
<script src="{{ asset('/assets/js/toastr.min.js') }}" type="text/javascript"></script>

<script>
	@if(Session::has('message'))
	  	
	  	toastr.options =
	  	{
	  		"closeButton" : true,
	  		"progressBar" : true
	  	}
  		
  		toastr.success("{{ session('message') }}");

  	@endif

  	@if(Session::has('error'))
		
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
  		
  		toastr.error("{{ session('error') }}");

  	@endif

  	@if(Session::has('info'))
		
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}

  		toastr.info("{{ session('info') }}");

  	@endif

  	@if(Session::has('warning'))

		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}

  		toastr.warning("{{ session('warning') }}");

  	@endif
</script>