$().ready(function(){


	$('.input-daterange input').each(function() {
	    $(this).datepicker({
	    	clearDate:true,
	    	autoclose:true,
	    	format:'yyyy-mm-dd'
	    });
	});

	$('.form-create-course').validate({
		rules:{
			input_category:{
				required:true
			},
			input_course_name:{
				required:true
			},
			input_subject:{
				required:true
			},
			input_description:{
				required:true
			},
			input_start_date:{
				required:true
			},
			input_end_date:{
				required:true
			},
			number_of_student:{
				required:true
			}
		},
		messages:{
			input_category:{
				required:'ต้องกรอกหมวดหมู่'
			},
			input_course_name:{
				required:'ต้องกรอกชื่อ'
			},
			input_subject:{
				required:'ต้องกรอกวิชา'
			},
			input_description:{
				required:'ต้องกรอกรายละเอียด'
			},
			input_start_date:{
				required:'ต้องกรอกวันที่'
			},
			input_end_date:{
				required:'ต้องกรอกวันที่'
			},
			number_of_student:{
				required:'ต้องกรอกจำนวนนักเรียน'
			}
		},
		submitHandler:function(form){
			var action = $(form).attr('action')
			var data = $(form).serialize()
			$.post( action, data, function( response ){

				if( response.success ){
					alert('บันทึกแล้ว')
					window.location.href= base_url + "/courses"
				}else{
					alert('มีปัญหา')
				}

			})
		}
	})

})