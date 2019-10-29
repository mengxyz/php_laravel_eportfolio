<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as File;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = DB::select('
            SELECT s.std_name,
            s.std_id,c.c_name 
            FROM students s 
            left join classrooms c 
            on s.c_id = c.c_id'
        );
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classroom = Classroom::all()->toArray();
        return view('student.add',compact('classroom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('photo')){
            $directory = 'profile_pic';
            $file = $request->file('photo');
            $file_name = uniqid().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move($directory,$file_name);
        }
        
        $student = new Student(
            [
                'std_name' => $request->get('std_name'),
                'std_address' => $request->get('std_address'),
                'std_tel' => $request->get('std_tel'),
                'std_pic' => $file_name ?? '',
                'c_id' => $request->get('c_id')
                ]
            );
            
        $student->save();
        return redirect()->route('student.index')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::where('std_id','=',$id)->first();
        $classroom = Classroom::all()->toArray();
        return view('student.edit',compact('students','classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->file('photo')){
            $directory = 'profile_pic';
            $file = $request->file('photo');
            $file_name = uniqid().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move($directory,$file_name);
            File::delete('profile_pic/'.$request->get('std_pic'));
        }
        
        $student = Student::where('std_id','=',$id)
        ->update([
                'std_name' => $request->get('std_name'),
                'std_address' => $request->get('std_address'),
                'std_tel' => $request->get('std_tel'),
                'std_pic' => $file_name ?? '',
                'c_id' => $request->get('c_id')
        ]);
        return redirect()->route('student.index')->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $students = Student::where('std_id','=',$id)->first();
        $classroom = Classroom::all()->toArray();
        return view('student.delete',compact('students','classroom'));
    }


    public function destroy($id)
    {
        $student = Student::where('std_id','=',$id);
        File::delete('profile_pic/'.$student->value('std_pic'));
        $student->delete();
        return redirect()->route('student.index')->with('success','ลบข้อมูลเรียบร้อยแล้ว');
    }
}
