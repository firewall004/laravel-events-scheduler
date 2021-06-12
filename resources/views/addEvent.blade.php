@include('includes.header')

<body>

	<div class="container">
		<div class="row" style="margin-top:45px">
			<div class="row">
				<h4 class="float-left">Add event</h4>
				<div class="float-right pl-4">
					<a class="btn btn-info" href="{{ route('events.show') }}">All Events</a>
				</div>
				<hr>
			</div>
			<div class="w-100 d-block row">
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
						<textarea class="form-control" style="resize:none" name="description" placeholder="Enter description" rows="3" value="{{ old('description') }}" /></textarea>
						<span class="text-danger">@error('description'){{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<label class="control-label">Start Time</label>
						<div class='input-group time' id='datetimepicker1'>
							<input type='text' class="timepicker  form-control" name="startTime" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">End Time</label>
						<div class='input-group time' id='datetimepicker2'>
							<input type='text' class="timepicker  form-control" name="endTime" />
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
			$('#datetimepicker1').datetimepicker({
				format: 'HH:mm:ss'
			});
			$('#datetimepicker2').datetimepicker({
				format: 'HH:mm:ss'
			});
		});
	});
</script>
