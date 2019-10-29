<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroom = DB::select('
            SELECT 
            c.c_name,
            c.c_id,
            s.std_name 
            FROM classrooms c 
            LEFT JOIN students s ON 
            c.std_id = s.std_id
            ORDER BY c.c_id');
        return view('classroom.show',compact('classroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classroom.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'c_name' => 'required'
        ]);

        $classroom = new Classroom(
            [
                'c_name' => $request->get('c_name'),
            ]
        );
        $classroom->save();
        return redirect()->route('classroom.index')->with('success','บันทึกข้อมูลเรียบร้อยเเล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = Classroom::where("c_id","=",$id)->first();
        return view("classroom.delete",compact("classroom"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom = Classroom::where("c_id","=",$id)->first();
        return view("classroom.edit",compact("classroom"));
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
        $classroom = Classroom::where("c_id","=",$id)
        ->update([
            "c_name" => $request->get('c_name')
        ]);
        return redirect()->route("classroom.index")->with("success","แก้ไขข้อมูลเรียบร้อยเเล้ว");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom = Classroom::where("c_id","=",$id)
        ->delete();
        return redirect()->route("classroom.index")->with("success","ลบข้อมูลเรียบร้อยเเล้ว");
    }
}
