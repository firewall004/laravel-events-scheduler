@include('includes.header')

<head>
	<script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
	<div class="container">
		<div class="row" style="margin-top:20px">
			<div class="col-md-4 col-md-offset-4">
				<h4>Schedules Calendar</h4>
				<hr>
			</div>
		</div>

		<div id="app">
			<div class="py-4">
				<calendar-component></calendar-component>
			</div>
		</div>
	</div>
</body>

</html>
