<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>doc_session</title>
<style type="text/css">
body,td,th {
	color: #F00;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="400" height="232" border="0" align="center">
    <tr>
      <td height="35" colspan="2" align="center"><strong>Kết quả sau khi nhấn <em>Click here!</em> của trang session</strong></td>
    </tr>
    <tr>
      <td width="243" height="45"><img src="hinh_anh.JPG" width="356" height="85" /></td>
      <td width="157" align="center"><?php 
  	echo "<p align='center'>Xin chào <b>".$_SESSION['ho_ten']."</b><br>";
	echo "Tên đăng nhập <b><i>". $_SESSION['ten_dn']."</b></i><br>";
	echo "<a href='session.php'> Quay về trang ĐĂNG NHẬP</a></p>";
  ?></td>
    </tr>
    <tr>
      <td colspan="2"><img src="hinh_4.jpg" width="577" height="112" /></td>
    </tr>
  </table>
</form>
</body>

</html>