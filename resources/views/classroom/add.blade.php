@extends('layouts.admin')
@section('title','เพิ่มข้อมูลนักศึกษา')
@section('content')
<form action="{{url('classroom')}}" method="post" name="form1" id="form1">
    {{ csrf_field() }}
    <table width="273" border="1">
        <tr>
            <td colspan="2" bgcolor="#FFB700">
                <div align="center">เพิ่มชั้นเรียน</div>
            </td>
        </tr>
        <tr>
            <td width="90">ชื่อชั้นเรียน</td>
            <td width="144">
                <input type="text" name="c_name" id="c_name" />
            </td>
        </tr>
        <tr>
            <td height="29" colspan="2">
                <div align="center">
                    <input type="submit" name="button" id="button" value="บันทึก" />
                    <input type="reset" name="button2" id="button2" value="ยกเลิก" />
                </div>
            </td>
        </tr>
    </table>
</form>
@endsection