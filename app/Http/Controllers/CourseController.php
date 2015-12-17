<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Category;
use App\Course;
use App\Http\Requests\UpdateCourseRequest; 
use App\Http\Requests\CreateCourseRequest; 
use DB;

class CourseController extends Controller
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return View('courses.index');
    }

    public function json( Request $request ){

        $field   = $request->get('field');
        $keyword = $request->get('keyword');
       
        $courses = Course::getCourse( $field, $keyword );

        return response()->json($courses);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Category $cate )
    {
        //

        $categories = $cate->get();

        return View('courses.create',[
            'categories'    =>  $categories
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( CreateCourseRequest $request )
    {
        //

        //$db = new DB;

        $input_category     = $request->get('input_category');
        $input_course_name  = $request->get('input_course_name');
        $input_subject      = $request->get('input_subject');
        $input_description  = $request->get('input_description');
        $input_start_date   = $request->get('input_start_date');
        $input_end_date     = $request->get('input_end_date');
        $input_number_of_student  = $request->get('input_number_of_student');


        Course::insert([
            'cate_id'           =>  $input_category,
            'user_id'           =>  $this->auth->user()->id,
            'course_name'       =>  $input_course_name,
            'subject'           =>  $input_subject,
            'description'       =>  $input_description,
            'date_start'        =>  $input_start_date,
            'date_end'          =>  $input_end_date,
            'number_of_student' =>  $input_number_of_student,
            'created_at'        =>  DB::raw('now()')
            ]);

        return response()->json(['success'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        //$course = Course::find( $id );

        $course = DB::table('courses as c')
                ->selectRaw('c.*, cat.*, c.id as course_id, ins.firstname as instructor_name')
                ->leftjoin('categories as cat','c.cate_id','=','cat.id')
                ->leftjoin('users as ins','c.user_id','=','ins.id')
                ->where('c.id','=',$id)
                ->orderBy('c.id','desc')
                ->first();

        return view('courses.show',[
            'course'    =>  $course
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::get();
        //$course = Course::find( $id );
        $course = DB::table('courses as c')
            ->selectRaw('*,c.id as course_id')
            ->where('c.id','=',$id)
            ->first();

        return view('courses.edit',[
            'course'    =>  $course,
            'categories'    =>  $categories
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        //
        
        $input_category     = $request->get('input_category');
        $input_course_name  = $request->get('input_course_name');
        $input_subject      = $request->get('input_subject');
        $input_description  = $request->get('input_description');
        $input_start_date   = $request->get('input_start_date');
        $input_end_date     = $request->get('input_end_date');
        $input_number_of_student  = $request->get('input_number_of_student');


        DB::table('courses')
            ->where( 'id','=',$id )
            ->update([
                'cate_id'           =>  $input_category,
                'course_name'       =>  $input_course_name,
                'subject'           =>  $input_subject,
                'description'       =>  $input_description,
                'date_start'        =>  $input_start_date,
                'date_end'          =>  $input_end_date,
                'number_of_student' =>  $input_number_of_student,
                'updated_at'        =>  DB::raw('now()')
            ]);
    
        return response()->json(['success'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $id;
    }
}
