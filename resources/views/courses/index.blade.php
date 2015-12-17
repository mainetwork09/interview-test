@include('header')

<div class="container">

<h1>
	Courses 
	@if( Auth::check() )
	@if( Auth::user()->type_id == 1 || Auth::user()->type_id == 2 )
	<a href="{{url('courses/create')}}" class="btn btn-primary btn-xs">Create</a>
	@endif
	@endif
</h1>

<div class="clear"></div>

<div class="panel panel-default">
	<div class="panel-body">
		<form class="form-search" method="post">
			<div class="row">
				<div class="col-xs-2">
					Search by
				</div>
				<div class="col-xs-3">
					<select class="form-control" name="field">
						<option value="course_name">Course Name</option>
						<option value="instructor_name">Instructor Name</option>
					</select>
				</div>
				<div class="col-xs-4">
					<input class="form-control" name="keyword" />
				</div>
				<div class="col-xs-3">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-primary btn-block">Search</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="course-lists" class="row">

</div>


</div>

@include('script')

<script src="{{url('js/course.js')}}"></script>

</body>
</html>