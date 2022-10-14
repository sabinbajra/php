<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
	include "../include/config.php";
	
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
		top_admin_02_over = newImage("images/top_admin_02-over.gif");
		top_admin_03_over = newImage("images/top_admin_03-over.gif");
		top_admin_04_over = newImage("images/top_admin_04-over.gif");
		top_admin_05_over = newImage("images/top_admin_05-over.gif");
		top_admin_06_over = newImage("images/top_admin_06-over.gif");
		top_admin_07_over = newImage("images/top_admin_07-over.gif");
		top_admin_08_over = newImage("images/top_admin_08-over.gif");
		preloadFlag = true;
	}
}

// -->
</script>
<script src="include/form_validator.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<SCRIPT language=JavaScript 
src="include/new_menu.js"></SCRIPT>
<?
	include ("../include/db.php");
	$log_query = "SELECT * from tbl_admin where id=$_SESSION[valid_id]";
	$log_result = mysql_query($log_query);
	$log_show = mysql_fetch_array($log_result);
?>
<link href="include/admin.css" rel="stylesheet" type="text/css">
<link href="../include/bcis.css" rel="stylesheet" type="text/css">
<link href="include/new_menu.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="preloadImages();">
<? include "../include/header.inc";?>
<table width="778" height="22" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td width="312" class="bk_navbar">&nbsp;</td>
		<td>
			<a href="admin.php"
				onmouseover="changeImages('top_admin_02', 'images/top_admin_02-over.gif'); return true;"
				onmouseout="changeImages('top_admin_02', 'images/top_admin_02.gif'); return true;"
				onmousedown="changeImages('top_admin_02', 'images/top_admin_02-over.gif'); return true;"
				onmouseup="changeImages('top_admin_02', 'images/top_admin_02-over.gif'); return true;">
				<img name="top_admin_02" src="images/top_admin_02.gif" width="63" height="22" border="0" alt=""></a></td>
		<td noWrap class="P" id=NewTD 
          onclick=MCH(event,NewMenu,changeImages) 
          onmouseover="MME(event, NewMenu, changeImages('top_admin_04', 'images/top_admin_04-over.gif'));" onMouseOut="MME(event, NewMenu, changeImages('top_admin_04', 'images/top_admin_04.gif'));" onblur="MME(event, NewMenu, changeImages('top_admin_04', 'images/top_admin_04.gif'));">
			
				<img name="top_admin_04" src="images/top_admin_04.gif" width="90" height="22" border="0" alt=""></td>
		<td>
			<a href="?AdminPageID=Users"
				onmouseover="changeImages('top_admin_05', 'images/top_admin_05-over.gif'); return true;"
				onmouseout="changeImages('top_admin_05', 'images/top_admin_05.gif'); return true;"
				onmousedown="changeImages('top_admin_05', 'images/top_admin_05-over.gif'); return true;"
				onmouseup="changeImages('top_admin_05', 'images/top_admin_05-over.gif'); return true;">
				<img name="top_admin_05" src="images/top_admin_05.gif" width="74" height="22" border="0" alt=""></a></td>
		<td>
			<a href="?AdminPageID=Contents"
				onmouseover="changeImages('top_admin_06', 'images/top_admin_06-over.gif'); return true;"
				onmouseout="changeImages('top_admin_06', 'images/top_admin_06.gif'); return true;"
				onmousedown="changeImages('top_admin_06', 'images/top_admin_06-over.gif'); return true;"
				onmouseup="changeImages('top_admin_06', 'images/top_admin_06-over.gif'); return true;">
				<img name="top_admin_06" src="images/top_admin_06.gif" width="88" height="22" border="0" alt=""></a></td>
		<td>
			<a href="?AdminPageID=Option"
				onmouseover="changeImages('top_admin_07', 'images/top_admin_07-over.gif'); return true;"
				onmouseout="changeImages('top_admin_07', 'images/top_admin_07.gif'); return true;"
				onmousedown="changeImages('top_admin_07', 'images/top_admin_07-over.gif'); return true;"
				onmouseup="changeImages('top_admin_07', 'images/top_admin_07-over.gif'); return true;">
				<img name="top_admin_07" src="images/top_admin_07.gif" width="76" height="22" border="0" alt=""></a></td>
		<td>
			<a href="logout.php?id=<?=$log_show[id];?>"
				onmouseover="changeImages('top_admin_08', 'images/top_admin_08-over.gif'); return true;"
				onmouseout="changeImages('top_admin_08', 'images/top_admin_08.gif'); return true;"
				onmousedown="changeImages('top_admin_08', 'images/top_admin_08-over.gif'); return true;"
				onmouseup="changeImages('top_admin_08', 'images/top_admin_08-over.gif'); return true;">
				<img name="top_admin_08" src="images/top_admin_08.gif" width="75" height="22" border="0" alt=""></a></td>
	</tr>
	<tr>
		<td colspan="8"><img src="images/admin_15.jpg" width="64" height="11" alt=""></td>
	</tr>
</table>
<!-- DropDown Menu -->
  <TABLE class=U id=NewTable onclick=MCH(event,NewMenu,true)>
  	<TR>
      <TD class=W onClick="G('?AdminPageID=Students');" 
      onmouseout=MU_D() onmouseover=MO_D()><IMG align=absMiddle alt=Folder border=0 hspace=1 src="../images/icons/users.gif">&nbsp;Students</TD></TR>
  	<TR>
      <TD class=V><IMG height=1 src="MSN Hotmail - Inbox_files/spacer.gif" width=1></TD>
	</TR>
  	<TR>
      <TD class=W onClick="G('?AdminPageID=Staffs');" 
      onmouseout=MU_D() onmouseover=MO_D()><IMG align=absMiddle alt=Calendar 
      border=0 hspace=1 src="../images/icons/profile.gif">&nbsp;Staffs</TD>
	</TR>
  </TABLE>
<SCRIPT language=javascript>
	var NewMenu = new MenuObj("NewMenu", "NewTable", "NewTD", "", "", "", "","Hfrm","");
</SCRIPT>

<table width="778" height="411" border="0" cellpadding="3" cellspacing="1" id="Table_04" align="center">
  <tr>
		
    <td valign="top">
	<?php
		if ($AdminPageID == "Inbox" || $AdminPageID == "Students" || $AdminPageID == "Staffs" || $AdminPageID == "RegAdminUser" || $AdminPageID == "Registration" || $AdminPageID == "Users" || $AdminPageID == "Contents" || $AdminPageID == "Option") {
			include "contents/" . $AdminPageID . ".php";
		}
		else if ($AdminPageID == "Search" || $AdminPageID == "Search_Student" || $AdminPageID == "Search_Teacher" || $AdminPageID == "Search_Staff" || $AdminPageID == "SearchEnf") {
			include "profiles/" . $AdminPageID . ".php";
		}
		else if ($AdminPageID == "Result") {
			include "result/" . $AdminPageID . ".php";
		}
		else {
			include "home.php";
		}
	
	?>
	</td>
  </tr>
</table>
<?php
	include "../include/footer.inc";
?>
</body>
</html>