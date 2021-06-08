@include('includes.header')

<body>

	<div class="container">
		<div class="row" style="margin-top:45px">
			<div class="col-md-4 col-md-offset-4">
				<h4>All events</h4>
				<div>
					<a class="btn btn-default" href="{{ route('event.add') }}">Add Event</a>
				</div>
				<hr>
				<div>
					<table>
						<thead>
							<tr>
								<th> name</th>
								<th> Description </th>
								<th> Start Time </th>
								<th> End Time</th>
								<th> Days </th>
							</tr>
						</thead>
						<tbody>
							@forelse($events as $event)
							<tr>
								<td>{{$event->name}}</td>
								<td>{{$event->description}}</td>
								<td>{{$event->start_time}}</td>
								<td>{{$event->end_time}}</td>
								<td>{{$event->days}}</td>
							</tr>
							@empty
							<tr>
								<td colspan="3"> No record found </td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</body>

</html>


<script>
	$(function() {
		$(document).ready(function() {
			$('select').selectpicker();
			$('#datetimepicker1').datetimepicker();
			$('#datetimepicker2').datetimepicker();
		});
	});
</script>
