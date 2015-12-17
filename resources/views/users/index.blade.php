@include('header')

<div class="container">
<h1>Profile</h1>

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-horizontal form-update-profile" method="post" action="{{url('users/update/'.$user->id)}}">
	<div class="form-group">
    <label for="input_category" class="col-sm-2 control-label">
    	UserType
    </label>
    <div class="col-sm-10">
    	{{ $user->type_name }}
    </div>
  </div>
  <div class="form-group">
    <label for="input_category" class="col-sm-2 control-label">
    	Username
    </label>
    <div class="col-sm-10">
    	{{ $user->email }}
    </div>
  </div>
<div class="form-group">
    <label for="input_firstname" class="col-sm-2 control-label">
    	Firstname
    </label>
    <div class="col-sm-10">
    	<input type="text" class="form-control" name="input_firstname" id="input_firstname" placeholder="Enter Firstname" value="{{ $user->firstname }}">
    </div>
  </div>
  <div class="form-group">
    <label for="input_lastname" class="col-sm-2 control-label">
    	Lastname
    </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="input_lastname" id="input_lastname" placeholder="Enter Lastname" value="{{ $user->lastname }}">
    </div>
  </div>
  <div class="form-group">
    <label for="input_nickname" class="col-sm-2 control-label">
    	Nickname
    </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="input_nickname" id="input_nickname" placeholder="Enter Nickname" value="{{ $user->nickname }}">
    </div>
  </div>
  <div class="form-group">
    <label for="input_birthday" class="col-sm-2 control-label">
    	Birthday
    </label>
    <div class="col-sm-10">
    	<input type="text" class="form-control input-birthday" id="input_birthday" name="input_birthday" placeholder="Enter Birthday" value="<?php echo (strpos($user->birthday,'0') != 0 ) ? $user->birthday:'' ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-primary">Update Profile</button>
    </div>
  </div>
</form>

	</div>
</div>

</div>

@include('script')

<script type="text/javascript" src="{{url('js/user.js')}}"></script>

</body>
</html>