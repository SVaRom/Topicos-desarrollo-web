<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Program;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$students = DB::table('students')->get();
        //return $students;
        //foreach ($students as $students){
            //echo $students->name;
        //}
        //echo $request;
        $students = Student::where('name',$request->name)->first();
        return $students;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$student = new Student;
        //$student->name=$request->name;
        //$student->lastname=$request->lastname;
        //$student->control=$request->control;
        //$student->email=$request->email;
        // $student->save();
        // Student::create(['name'=>$request->name,
        // 'lastname'=>$request->lastname, 
        // 'control'=>$request->control, 
        // 'email'=>$request->email,
        // 'program_id'=>$request->program_id]);

        $validator=Validator::make($request->all(),[
            'lastname'=>'required|max:255', 
            'email'=>'required|unique:students|max:255',
            'program_id'=>'required|exists:programs,id'
        ]);

        if($validator->fails()){
            return $validator->errors();
        }

        $student=Student::create([
            'name'=>$request->name,
            'lastname'=>$request->lastname, 
            'control'=>$request->control, 
            'email'=>$request->email,
            'program_id'=>$request->program_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        Program::find(1)->student;//Llama al método con calusal program_id(1)
        $student=Student::find(1);
        return $student->program;
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Student::where('name', $request->name)
        ->where('lastname',$request->lastname)
        ->update(['email'=> $request->email]);
    }
    public function showToken()
    {
        echo csrf_token();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student = Student::where('name', $request->name)->delete();
    }
}
