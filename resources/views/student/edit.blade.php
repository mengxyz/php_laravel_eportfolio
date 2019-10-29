@extends('layouts.admin')
@section('title','แก้ไขข้อมูลนักเรียน')
@section('content')
<form action="{{action('StudentController@update',$students['std_id'])}}" method="post" enctype="multipart/form-data"
    name="form1" id="form1">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PATCH">
    <table width="375" border="1">
        <tr>
            <td colspan="2" bgcolor="#FFB700">
                <div align="center">แก้ไขข้อมูลนักเรียน</div>
            </td>
        </tr>
        <tr>
            <td width="132">ชื่อ - สกุล</td>
            <td width="227">
                <input type="text" name="std_name" id="std_name" value="{{$students['std_name']}}" />
                <input name="std_id" type="hidden" id="std_id" value="">
                <input name="std_pic" type="hidden" id="std_pic" value="">
            </td>
        </tr>
        <tr>
            <td height="44">ที่อยู่</td>
            <td><textarea name="std_address" id="std_address">{{$students['std_address']}}</textarea></td>
        </tr>
        <tr>
            <td>เบอร์โทร</td>
            <td><input type="text" name="std_tel" id="std_tel" value="{{$students['std_tel']}}"></td>
        </tr>
        <tr>
            <td height="170">รูป</td>
            <td>
                <div align="center">
                    @if ($students['std_pic'])
                    <input type="hidden" name="std_pic" value="{{$students['std_pic']}}">
                    <img src="{{ asset ( 'profile_pic/'.$students['std_pic'] ) }}" width="100" height="100">
                    @endif
                    <input type="file" name="photo" id="photo">
                </div>
            </td>
        </tr>
        <tr>
            <td>ผู้ปกครอง</td>
            <td>
                <select name="pa_id" id="pa_id">
                </select>
            </td>
        </tr>
        <tr>
            <td>ชั้นเรียน</td>
            <td>
                <select name="c_id" id="c_id">
                    <option value="">-- ชั้นเรียน --</option>
                    @foreach ($classroom as $c)
                    @if ($students['c_id'] == $c['c_id'])
                    <option selected value="{{$c['c_id']}}">{{$c['c_name']}}</option>
                    @else
                    <option value="{{$c['c_id']}}">{{$c['c_name']}}</option>
                    @endif
                    @endforeach
                </select>
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