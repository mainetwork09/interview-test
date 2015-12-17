@include('header')

<div class="container">

<h1>Create Courses</h1>


<div class="panel panel-default">
  <div class="panel-body">
<form class="form-horizontal form-create-course" method="post" action="{{url('courses/store')}}">
<div class="form-group">
    <label for="input_category" class="col-sm-2 control-label">Category</label>
    <div class="col-sm-10">
    	<select class="form-control" name="input_category">
    		<option value="">Please select category</option>
    		@foreach( $categories as $cate )
    		<option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
    		@endforeach
    	</select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_course_name" class="col-sm-2 control-label">Course Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="input_course_name" id="input_course_name" placeholder="Enter Course Name">
    </div>
  </div>
  <div class="form-group">
    <label for="input_subject" class="col-sm-2 control-label">Subject</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="input_subject" id="input_subject" placeholder="Enter Subject">
    </div>
  </div>
  <div class="form-group">
    <label for="input_description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
    	<textarea class="form-control" name="input_description" id="input_description" rows="10"></textarea>
      
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Duration</label>
    <div class="col-sm-4">
    	<div class="input-group input-daterange">
		    <input type="text" class="form-control" name="input_start_date" value="">
		    <span class="input-group-addon">to</span>
		    <input type="text" class="form-control" name="input_end_date" value="">
		</div>

      
    </div>
     
  </div>
  <div class="form-group">
    <label for="input_number_of_student" class="col-sm-2 control-label">Number Of Student</label>
    <div class="col-sm-3">
      <input type="number" class="form-control" name="input_number_of_student" id="input_number_of_student" placeholder="Enter Number of Student">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-primary">Create</button>
    </div>
  </div>
</form>
</div>
</div>

</div>

@include('script')

<script type="text/javascript" src="{{url('js/course-create.js')}}"></script>

</body>
</html>


