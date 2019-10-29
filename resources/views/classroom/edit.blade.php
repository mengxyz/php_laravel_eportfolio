@extends('layouts.admin')
@section('content')
<form action="{{action('ClassroomController@update',$classroom['c_id'])}}" method="post" name="form1" id="form1">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PATCH">
    <table width="324" border="1" align="center">
        <tbody>
            <tr>
                <td colspan="2" bgcolor="#FFAD00">
                    <div align="center">แก้ไขข้อมูลชั้นเรียน</div>
                </td>
            </tr>
            <tr>
                <td width="92">ชื่อชั้นเรียน</td>
                <td width="216">
                    <input name="c_name" type="text" id="c_name" value="{{$classroom['c_name']}}">
                    <input name="c_id" type="hidden" id="c_id" value=""></td>
            </tr>
            <td colspan="2">
                <div align="center">
                    <input type="submit" name="submit" id="submit" value="บันทึก">
                    <input type="button" name="Button" onClick=window.history.back() id="reset" value="ยกเลิก">
                </div>
            </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection