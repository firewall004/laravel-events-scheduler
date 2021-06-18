@extends('includes.master')

@section('content')

<head>
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script>
		window.userId = "{{ $userId }}"
	</script>
</head>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h4>Schedules Calendar</h4>
		<hr>
	</div>
</div>

<div id="app">
	<div class="py-4">
		<calendar-component :userId="{{ $userId }}"></calendar-component>
	</div>
</div>
@endsection
