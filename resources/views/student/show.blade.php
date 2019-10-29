@extends('layouts.admin')
@section('title','เพิ่มข้อมูลนักศึกษา')
@section('content')
<table width="800" border="1" align="center">
    <tbody>
        <tr>
            <td width="266">รายงานข้อมูลผลงาน</td>
            <td width="518">
                <div align="right">[<a href="{{url('student/create')}}">เพิ่มข้อมูลนักเรียน</a>][ <a
                        href="showparent.php">จัดการข้อมูลผู้ปรครอง</a> ]</div>
            </td>
        </tr>
    </tbody>
</table>
<table width="800" border="1" align="center">
    <tr>
        <td width="156">รหัสนักเรียน</td>
        <td width="212">ชื่อนักเรียน</td>
        <td width="152">ชั้นเรียน</td>
        <td width="128">&nbsp;</td>
        <td width="118">&nbsp;</td>
    </tr>
    @foreach ($student as $std)
    <tr>
        <td>{{$std->std_id}}</td>
        <td>{{$std->std_name}}</td>
        <td>{{$std->c_name}}</td>
        <td>
            <div align="center">
                <a href="{{action('StudentController@edit',$std->std_id)}}">แก้ไข</a>
            </div>
        </td>
        <td>
            <div align="center">
                <a href="{{action('StudentController@delete',$std->std_id)}}">ลบ</a>
            </div>
        </td>
    </tr>
    @endforeach
</table>
@endsection