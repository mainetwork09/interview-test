<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Course extends Model
{
    //

    public static function getCourse( $field, $keyword ){
    	
    	if( !$field && !$keyword ){

	    	$courses = DB::table('courses as c')
	    		->selectRaw('c.*, cat.*, c.id as course_id, ins.firstname as instructor_name')
	    		->leftjoin('categories as cat','c.cate_id','=','cat.id')
	    		->leftjoin('users as ins','c.user_id','=','ins.id')
	    		->orderBy('c.id','desc')
	    		->get();

    	}else{

    		$courses = DB::table('courses as c')
	    		->selectRaw('c.*, cat.*, c.id as course_id, ins.firstname as instructor_name')
	    		->leftjoin('categories as cat','c.cate_id','=','cat.id')
	    		->leftjoin('users as ins','c.user_id','=','ins.id');

	    	if( $field == 'course_name' ){
	    		$courses = $courses->where('c.course_name','LIKE','%' . $keyword . '%');
	    	}elseif( $field == 'instructor_name' ){
	    		$courses = $courses->where('ins.firstname','LIKE','%' . $keyword . '%');
	    	}

	    	$courses = $courses->orderBy('c.id','desc')
	    		->get();

    	}


    	return $courses;
    }
    
}
