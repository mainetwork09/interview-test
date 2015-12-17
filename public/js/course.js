function loadJson( q ){

	var url;

	if( !q ){
		url = base_url + '/courses/json'
	}else{
		url = base_url + '/courses/json?' + q
	}

	console.log( url )

	$.get( url , function( response ){
		var lists="";
		$.each( response, function(index){
			lists+=	'<div class="col-xs-4"><div class="panel panel-default">'+
					'<div class="panel-body">'+
					'<h3><a href="' + base_url + '/courses/' +response[index].course_id+ '">'+response[index].course_name+ '</a></h3>'+
					'<div>Subject : ' + response[index].course_name + '</div>'+
					'<div>Instructor : ' + response[index].instructor_name + '</div>'+
					'<div>Number Of Student : ' + response[index].number_of_student + '</div>'+
					'<div>Date Start : ' + response[index].date_start + '</div>'+
					'<div>Date END : ' + response[index].date_end + '</div>'+
					'</div>'+
					'</div></div>';
		})
		$('#course-lists').html( lists )
	})
}


$().ready(function(){

	loadJson()

	$('.form-search').submit(function(){
		var q = $(this).serialize()
		loadJson(q)
		return false;
	})

})