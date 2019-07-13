@if(session()->has('alert'))
	<div class="alert badge-primary">
	{{ session()->get('alert') }}
	</div>
@endif