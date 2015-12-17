$().ready(function(){

	$('.input-birthday').datepicker({
		autoclose:true,
		format:"yyyy-mm-dd"
	})

	$('.form-update-profile').validate({
		rules:{
			input_firstname:{
				required:true
			},
			input_lastname:{
				required:true
			},
			input_nickname:{
				required:true
			},
			input_birthday:{
				required:true
			}
		},
		messages:{
			input_firstname:{
				required:'กรุณากรอกข้อมูล'
			},
			input_lastname:{
				required:'กรุณากรอกข้อมูล'
			},
			input_nickname:{
				required:'กรุณากรอกข้อมูล'
			},
			input_birthday:{
				required:'กรุณากรอกข้อมูล'
			}
		},
		submitHandler:function(form){
			var action = $(form).attr('action')
			var data = $(form).serialize()
			$.post( action, data, function( response ){

				if( response.success ){
					alert('บันทึกแล้ว')
				}else{
					alert('มีปัญหา')
				}

			})
		}
	})

})