@include('includes.header')

<body>

	<div class="container">
		<div class="row" style="margin-top:45px">
			<div>
				<h4 class="float-left">All events</h4>
				<div class="float-right pl-4">
					<a class="btn btn-primary btn-sm" href="{{ route('event.add') }}">Add Event</a>
				</div>
			</div>
			<div class="w-100 d-block d-md-table">
				<table class="table table-light table-hover table-bordered">
					<thead>
						<tr class="table-dark">
							<th scope="col">Name</th>
							<th scope="col">Description</th>
							<th scope="col">Start Time</th>
							<th scope="col">End Time</th>
							<th scope="col">Day(s)</th>
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
						<tr class="table-warning">
							<td colspan="5"> No record found </td>
						</tr>
						@endforelse
					</tbody>
				</table>
				<div class="d-flex justify-content-center">
					{!! $events->links() !!}
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
