<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> 
<html>
<head>
<title>Admin Area</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="Webmaster" content="Ashish L Shrestha">
<meta name="E-mail" content="ls.ashish@gmail.com">

<script type="text/javascript">
<!--

function newImage(arg) {
	if (document.images) {
		rslt = new Image();
		rslt.src = arg;
		return rslt;
	}
}

function changeImages() {
	if (document.images && (preloadFlag == true)) {
		for (var i=0; i<changeImages.arguments.length; i+=2) {
			document[changeImages.arguments[i]].src = changeImages.arguments[i+1];
		}
	}
}

var preloadFlag = false;
function preloadImages() {
	if (document.images) {
		admin_09_over = newImage("images/admin_09-over.jpg");
		admin_10_over = newImage("images/admin_10-over.jpg");
		admin_11_over = newImage("images/admin_11-over.jpg");
		admin_12_over = newImage("images/admin_12-over.jpg");
		admin_21_over = newImage("images/admin_21-over.jpg");
		admin_23_over = newImage("images/admin_23-over.jpg");
		admin_25_over = newImage("images/admin_25-over.jpg");
		admin_27_over = newImage("images/admin_27-over.jpg");
		preloadFlag = true;
	}
}

// -->
</script>
<script src="include/form_validator.js"></script>
<script src="include/form_validator4student.js"></script>
<script src="include/form_validator4staff.js"></script>
<script src="include/form_validator4teacher.js"></script>
<script src="include/form_validator4res.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<?
	include ("../include/db.php");
	$log_query = "SELECT * from tbl_admin where id=$_SESSION[valid_id]";
	$log_result = mysql_query($log_query);
	$log_show = mysql_fetch_array($log_result);
?>
<link href="include/admin.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload="preloadImages();">
<table id="Table_01" width="778" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<img src="images1/admin_01.jpg" width="248" height="7" alt=""></td>
		<td>
			<img src="images1/admin_02.jpg" width="243" height="7" alt=""></td>
		<td>
			<img src="images1/admin_03.jpg" width="287" height="7" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images1/admin_04.jpg" width="248" height="89" alt=""></td>
		<td>
			<img src="images1/admin_05.jpg" width="243" height="89" alt=""></td>
		<td>
			<img src="images1/admin_06.jpg" width="287" height="89" alt=""></td>
	</tr>
</table>
<table id="Table_02" width="778" border="0" cellpadding="0" cellspacing="0">
	<tr>
		
    <td width="248" height="22" background="images1/admin_07.jpg">
	<?php
		if($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "administrator") {
	echo "&nbsp;<img src=\"../contents/directory/icons/user.gif\" width=\"19\" height=\"16\"> 
      <a href=\"?pageID=User\"><font color=\"#585B8A\"><strong>Users</strong></font></a>";
	  }
	?>
		 </td>
		 <td>
			<img src="images1/admin_08.jpg" width="243" height="22" alt=""></td>
		<td>
			<a href="admin.php"
				onmouseover="changeImages('admin_09', 'images/admin_09-over.jpg'); return true;"
				onmouseout="changeImages('admin_09', 'images/admin_09.jpg'); return true;"
				onmousedown="changeImages('admin_09', 'images/admin_09-over.jpg'); return true;"
				onmouseup="changeImages('admin_09', 'images/admin_09-over.jpg'); return true;">
				<img name="admin_09" src="images1/admin_09.jpg" width="64" height="22" border="0" alt=""></a></td>
		<td>
			<a href="?pageID=Search"
				onmouseover="changeImages('admin_10', 'images/admin_10-over.jpg'); return true;"
				onmouseout="changeImages('admin_10', 'images/admin_10.jpg'); return true;"
				onmousedown="changeImages('admin_10', 'images/admin_10-over.jpg'); return true;"
				onmouseup="changeImages('admin_10', 'images/admin_10-over.jpg'); return true;">
				<img name="admin_10" src="images1/admin_10.jpg" width="79" height="22" border="0" alt=""></a></td>
		<td>
			<a href="?pageID=About"
				onmouseover="changeImages('admin_11', 'images/admin_11-over.jpg'); return true;"
				onmouseout="changeImages('admin_11', 'images/admin_11.jpg'); return true;"
				onmousedown="changeImages('admin_11', 'images/admin_11-over.jpg'); return true;"
				onmouseup="changeImages('admin_11', 'images/admin_11-over.jpg'); return true;">
				<img name="admin_11" src="images1/admin_11.jpg" width="75" height="22" border="0" alt=""></a></td>
		
    <td> <a href="logout.php?id=<?=$log_show[id];?>"
				onmouseover="changeImages('admin_12', 'images/admin_12-over.jpg'); return true;"
				onmouseout="changeImages('admin_12', 'images/admin_12.jpg'); return true;"
				onmousedown="changeImages('admin_12', 'images/admin_12-over.jpg'); return true;"
				onmouseup="changeImages('admin_12', 'images/admin_12-over.jpg'); return true;"> 
      <img name="admin_12" src="images1/admin_12.jpg" width="69" height="22" border="0" alt=""></a></td>
	</tr>
	<tr>
		<td>
			<img src="images1/admin_13.jpg" width="248" height="11" alt=""></td>
		<td>
			<img src="images1/admin_14.jpg" width="243" height="11" alt=""></td>
		<td>
			<img src="images1/admin_15.jpg" width="64" height="11" alt=""></td>
		<td>
			<img src="images1/admin_16.jpg" width="79" height="11" alt=""></td>
		<td>
			<img src="images1/admin_17.jpg" width="75" height="11" alt=""></td>
		<td>
			<img src="images1/admin_18.jpg" width="69" height="11" alt=""></td>
	</tr>
</table>
<table width="778" height="411" border="0" cellpadding="5" cellspacing="1" id="Table_04">
	<tr>
		
    <td valign="top">
	<?php
		if ($pageID == "About") {
			include $pageID . ".php";
		}
		else if ($pageID == "Student" || $pageID == "Teacher" || $pageID == "Staff" || $pageID == "User" || $pageID == "Result") {
			include "profiles/" . $pageID . ".php";
		}
		else if ($pageID == "Search" || $pageID == "Search_Student" || $pageID == "Search_Teacher" || $pageID == "Search_Staff" || $pageID == "SearchEnf") {
			include "profiles/" . $pageID . ".php";
		}
		else if ($pageID == "Result") {
			include "result/" . $pageID . ".php";
		}
		else {
			include "home.php";
		}
	
	?>
	</td>
	</tr>
</table>
<table id="Table_03" width="778" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<img src="images1/admin_30.jpg" width="248" height="40" alt=""></td>
		<td colspan="2">
			<img src="images1/admin_31.jpg" width="243" height="40" alt=""></td>
		<td colspan="10">
			<img src="images1/admin_32.jpg" width="287" height="40" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images1/spacer.gif" width="248" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="216" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="27" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="26" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="38" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="55" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="24" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="12" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="41" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="22" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="14" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="45" height="1" alt=""></td>
		<td>
			<img src="images1/spacer.gif" width="10" height="1" alt=""></td>
	</tr>
</table>
</body>
</html>