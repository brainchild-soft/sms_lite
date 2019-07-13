@if(count($errors)>0)
		<div class="alert badge-danger text-white">
			@foreach($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif