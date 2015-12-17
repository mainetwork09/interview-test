@include('header')

<div class="container">

<h1>
	{{$course->course_name}} 
	@if( Auth::check() )
	@if( Auth::user()->type_id == 1 || Auth::user()->type_id == 2 )
	<a href="{{ url('courses/edit/'.$course->course_id) }}" class="btn btn-default btn-xs">edit</a>
	@endif
	@endif
</h1>
<div class="panel panel-default">
	<div class="panel-body">

		<form class="form-horizontal">
			<div class="form-group">
		    <div class="col-sm-2">Instructor Name</div>
		    <div class="col-sm-10">
		    	{{ $course->instructor_name }}
		    </div>
		  </div>
		<div class="form-group">
		    <div class="col-sm-2">Category</div>
		    <div class="col-sm-10">
		    	{{ $course->cate_name }}
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-2">Course Name</div>
		    <div class="col-sm-10">
		      {{ $course->course_name }}
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-2">Subject</div>
		    <div class="col-sm-10">
		      {{ $course->subject }}
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-2">Description</div>
		    <div class="col-sm-10">
		    	{{ $course->description }}
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-2">Duration</div>
		    <div class="col-sm-4">
		    	{{ $course->date_start }} - {{ $course->date_end }}
		    </div>
		     
		  </div>
		  <div class="form-group">
		    <div class="col-sm-2">Number Of Student</div>
		    <div class="col-sm-3">
		      {{ $course->number_of_student }}
		    </div>
		  </div>

		</form>
	</div>	
</div>

</div>

@include('script')

  </body>
</html>