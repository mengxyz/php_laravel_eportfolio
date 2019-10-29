<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <script>
    @if (session('success'))
      document.addEventListener('DOMContentLoaded',()=>{
        alert('{{session('success')}}');
      });
    @endif
    @if($errors->count() > 0)
      document.addEventListener('DOMContentLoaded',()=>{
        var msg = 'Error\n'
        @foreach ($errors->all() as $err)

          msg +='{{$err}}\n'

        @endforeach
        alert(msg);
      });
    @endif
  </script>
</head>

<body>
  <table width="832" border="1" align="center">
    <tr>
      <td width="822"><img src="{{asset ('/image/school.png')}}" width="851" height="315" alt="" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFAD00">
        <div align="right">
          <a href="showdept.php">กลุ่มสาระ</a> |
          <a href="showposition.php">ตำเเหน่ง</a> |
          <a href="showteacher.php">ครูอาจารย์</a> |
          <a href="showwork.php">ผลงาน</a> |
          <a href="{{url('classroom')}}">ชั้นเรียน</a> |
          <a href="{{url('student')}}">นักเรียน</a> |
          <a href="logout.php">Logout </a>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div align="center">
          <p>&nbsp;</p>

          @yield('content')

          <p>&nbsp;</p>
        </div>
      </td>
    </tr>
    <tr>
      <td bgcolor="#FFAD00">
        <div align="center">จัดทำโดย Anantasak Nonkhunthod 601102064106</div>
      </td>
    </tr>
  </table>
</body>

</html>