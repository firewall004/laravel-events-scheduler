@include('includes.header')

<body>

	<div class="container">
		<div class="row" style="margin-top:45px">
			<div class="col-md-4 col-md-offset-4">
				<h4>Add event</h4>
				<div>
					<a class="btn btn-default" href="{{ route('events.show') }}">All Events</a>
				</div>
				<hr>
				<form action="{{ route('event.save') }}" method="post">

					<!-- Move this to reusable -->
					@if(Session::get('success'))
					<div class="alert alert-success">
						{{ Session::get('success') }}
					</div>
					@endif

					@if(Session::get('fail'))
					<div class="alert alert-danger">
						{{ Session::get('fail') }}
					</div>
					@endif

					@csrf
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name" placeholder="Enter event name" value="{{ old('eventName') }}">
						<span class="text-danger">@error('event'){{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="textarea" class="form-control" name="description" placeholder="Enter description" value="{{ old('description') }}">
						<span class="text-danger">@error('description'){{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<label class="control-label">Start Time</label>
						<div class='input-group date' id='datetimepicker1'>
							<input type='text' class="form-control" name="startTime" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">End Time</label>
						<div class='input-group date' id='datetimepicker2'>
							<input type='text' class="form-control" name="endTime" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label">Day of the week</label><br>
						<select class="input-group" multiple name="days[]">
							<option value="sunday">Sunday</option>
							<option value="monday">Monday</option>
							<option value="tuesday">Tuesday</option>
							<option value="wednesday">Wednesday</option>
							<option value="friday">Friday</option>
							<option value="saturday">Saturday</option>
						</select>
					</div>

					<button type="submit" class="btn btn-block btn-primary">Save</button>
					<br>
				</form>
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
