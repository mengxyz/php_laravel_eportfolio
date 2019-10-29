@extends('layouts.admin')
@section('title','เพิ่มข้อมูลนักศึกษา')
@section('content')
<table width="800" border="1" align="center">
    <tbody>
        <tr>
            <td width="266">รายงานข้อมูลชั้นเรียน</td>
            <td width="518">
                <div align="right">[<a href="{{url('classroom/create')}}">เพิ่มข้อมูลชั้นเรียน</a>]</div>
            </td>
        </tr>
    </tbody>
</table>
<table width="800" border="1" align="center">
    <tr>
        <td width="93">รหัสชั้นเรียน</td>
        <td width="154">ชื่อชั้นเรียน</td>
        <td width="116">ครูประจำชั้น</td>
        <td width="118">หัวหน้าชั้นเรียน</td>
        <td width="134">&nbsp;</td>
        <td width="73">&nbsp;</td>
        <td width="66">&nbsp;</td>
    </tr>
    @foreach ($classroom as $c)
    <tr>
        <td>{{$c->c_id}}</td>
        <td>{{$c->c_name}}</td>
        <td></td>
        <td>{{$c->std_name}}</td>
        <td>
            <div align="center">
                จัดการข้อมูลชั้นเรียน
            </div>
        </td>
        <td>
            <div align="center">
                <a href="{{action("ClassroomController@edit",$c->c_id)}}">แก้ไข</a>
            </div>
        </td>
        <td>
            <div align="center">
                <a href="{{action("ClassroomController@show",$c->c_id)}}">ลบ</a>
            </div>
        </td>
    </tr>
    @endforeach

</table>
@endsection