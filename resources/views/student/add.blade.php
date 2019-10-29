@extends('layouts.admin')
@section('title','เพิ่มข้อมูลนักศึกษา')
@section('content')
<form action="{{url('student')}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
  {{ csrf_field() }}
  <table width="375" border="1">
    <tr>
      <td colspan="2" bgcolor="#FFB700">
        <div align="center">เพิ่มข้อนักเรียน</div>
      </td>
    </tr>
    <tr>
      <td width="132">ชื่อ - สกุล</td>
      <td width="227"><input type="text" name="std_name" id="std_name" /></td>
    </tr>
    <tr>
      <td height="44">ที่อยู่</td>
      <td><textarea name="std_address" id="std_address"></textarea></td>
    </tr>
    <tr>
      <td>เบอร์โทร</td>
      <td><input type="text" name="std_tel" id="std_tel"></td>
    </tr>
    <tr>
      <td>รูป</td>
      <td>
        <div align="right">
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
        @foreach  ($classroom as $c)
            <option value="{{$c['c_id']}}">{{$c['c_name']}}</option>
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