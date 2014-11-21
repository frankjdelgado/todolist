<div class="container">
	<div class="row">
		<div class="col-xs-12">
			@if (Session::has('message'))
				<div class="alert alert-success alert-dismissible alert-todo text-center" role="alert">
				  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  <strong>{{Session::get('message')}}</strong>
				</div>
			@endif
			@if (Session::has('error'))
				<div class="alert alert-danger alert-dismissible alert-todo text-center" role="alert">
				  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  <strong>Warning!</strong> {{Session::get('error')}}
				</div>
			@endif
		</div>
	</div>
</div>