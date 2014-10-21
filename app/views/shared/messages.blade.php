@if (Session::has('message'))
	<div class="row">
		<div class="col-xs-12">
			<p class="text-red text-center">{{Session::get('message')}}</p>
		</div>
	</div>
@endif