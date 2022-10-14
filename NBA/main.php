<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: index.php");
		}
	
	$AdminPageID	=	$_GET['AdminPageID'];
	$Opt			= 	$_GET['Opt'];
	$Action			=	$_GET['Action'];
	$old_pwd		=	$_POST['old_pwd'];
	$new_pwd		=	$_POST['new_pwd'];
	$retype_pwd		=	$_POST['retype_pwd'];
	$Edit = $_REQUEST["Edit"];
	$mem = $_REQUEST["mem"];
	$id = $_REQUEST["id"];
	$View = $_REQUEST["View"];
	$Inc = $_REQUEST["Inc"];
	$ViewInc = $_REQUEST["ViewInc"];
	$ViewExp = $_REQUEST["ViewExp"];
	$MGMT=$_GET["MGMT"];	
	
	$BOD = $_GET["BOD"];
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- saved from url=(0057)http://allwebcodesign.com/templates/T27dChromeLightgreen/ -->
<HTML><HEAD><META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<!-- get the value-->



<!-- CHANGE THE NEXT THREE LINES -->

<TITLE>::National Business Association</TITLE>
<META name="Description" content="Place your website description in this area. This is read by some search engines.">
<META name="KeyWords" content="add, your, keywords and phrases in this area, separated, by, commas, this, is read by only a, few search, engines">

<!-- CHANGE THE ABOVE THREE LINES -->




<META name="Copyright" content="Allwebco Design Corporation http://allwebcodesign.com/">

 
<LINK rel="StyleSheet" href="Drop Menu Website Template_files/common-style.css" type="text/css">
<LINK rel="StyleSheet" href="Drop Menu Website Template_files/gray.css" type="text/css">
<LINK rel="StyleSheet" href="Drop Menu Website Template_files/gray-menu.css" type="text/css">


<SCRIPT language="JavaScript" type="text/javascript" src="Drop Menu Website Template_files/css.js"></SCRIPT><LINK rel="StyleSheet" href="Drop Menu Website Template_files/lightgreen.css" type="text/css"><LINK rel="StyleSheet" href="Drop Menu Website Template_files/lightgreen-menu.css" type="text/css">


<SCRIPT language="JavaScript" type="text/javascript" src="Drop Menu Website Template_files/javascripts.js"></SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript" src="Drop Menu Website Template_files/pop-closeup.js"></SCRIPT>
<style type="text/css">
<!--
.style1 {font-size: large}
.style2 {font-size: medium}
.style3 {
	font-size: small;
	font-weight: bold;
}
.style4 {color: #FFFFFF}
.style5 {
	font-size: x-large;
	font-weight: bold;
}
-->
</style>
</HEAD>
<BODY background="images/loginbg.jpg" > 


<!-- OUTER PAGE TABLE-->







<!-- PICTURE AND BAR TABLE -->
<TABLE cellpadding="0" cellspacing="0" border="0" width="100%">

<TBODY>

<TR>
<TD height="95" background=""  class="pictbackground">
  <div align="center" class="style1 style4"><span class="style5">NATIONAL BUSINESS ASSOCIATION </span><BR> 
    <span class="style2">ESTABILISHED:: 2061 </span><BR> 
    <span class="style3">NEW ROAD , KATHMANDU , NEPAL
    <!-- for banner <img  src="../image/top.gif" border="0" width="100%" height="95" alt="Image"> -->
    </span></div></TD>


</TR>
<TR class="printhide"><TD class="pagebars">
<IMG src="Drop Menu Website Template_files/spacer.gif" width="10" height="1" alt="image"><BR>
</TD></TR></TBODY></TABLE>
<!-- END PICTURE TABLE -->




<TABLE cellpadding="0" cellspacing="0" border="0" class="menutable">
<TBODY>

<TR>
<TD class="printhide" align="left"><TABLE cellpadding="0" cellspacing="0" border="0">
<TBODY>
<TR>
<TD>
<UL id="menunav"> 
<LI style="width: 110px;"><A href="main.php">Home</A>    
  </LI>  




  




<LI style="width: 110px;"><A href="logout.php">Log Out</A></LI>
</UL></TD>
</TR>
</TBODY>

</TABLE>
</TD>
</TR>
</TBODY>
</TABLE>




<!-- SPLIT TABLE-->
<TABLE cellpadding="0" cellspacing="0" border="0" width="100%;" >
  <TBODY><TR >
<TD  align="left" valign="top" width="15%">
<br>
<?
if($AdminPageID!="")
{
?>
<table width="100%" align="center" background="">
  <tr>
    <td><div align="center"><img src="images/icons/post_article.gif" alt="View Articles" width="32" height="32" border="0"></a><strong>Income</strong>
      </div>
      <hr size="15" color="#CCCCCC"></td>
  </tr>
  <tr>
    <td><div align="left"><a href="?AdminPageID=NewIncome&Opt=New">New Heading </a></a></div></td>
  </tr>
  <tr>
    <td><div align="left"><a href="?AdminPageID=IncomeEntry&Opt=Add">Income From </a> </div></td>
  </tr>
  <tr>
    <td><div align="left"><a href="?AdminPageID=ViewIncome">View</a>&nbsp;</div></td>
  </tr>
 
  
  <tr>
    <td><p align="center"><img src="images/icons/account_details.gif" alt="View Profile" width="32" height="32" border="0"></p>
      <div align="center"><strong>Member Profile </strong></div>        <hr size="15" color="#CCCCCC">
</td>
  </tr>
  <tr>
    <td><div align="left"><span class="text"><a href="?AdminPageID=Member&Edit=New">Add</a></span></div></td>
  </tr>
  <tr>
    <td><div align="left"><a href="?AdminPageID=Member">View</a>&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><span class="text"> 
					<a href="?AdminPageID=Option&Opt=Modify_My_Profile&id=<?=$_SESSION[valid_id];?>">Modify</a>	</span>&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><a href="?AdminPageID=Option&Opt=Change_Validity">Renewal</a>&nbsp;</div></td>
  </tr>
</table>

<?
}
?>


<!-- LEFT SIDEBAR AREA --></TD>
<TD width="40" align="left" valign="top" class="pageheight" ><BR></TD><TD align="center" valign="top" class="shadow-horizontal">

<table width="100%"  border="0" >
  <tr>
    <td>&nbsp;</td>
  </tr>
</table><BR>



<!-- START CONTENT TABLE -->
<TABLE width="100%" border="0" align="center" cellpadding="5" cellspacing="0"  >
  <TBODY><TR ><TD width="60%" height="100%" align="left" valign="top"  class="just">





<?php   


if($AdminPageID == "Option" || $AdminPageID == "Member" || $AdminPageID=="Registration"  || $AdminPageID=="NewexpenseHead"|| $AdminPageID=="NewIncome" || $AdminPageID=="IncomeEntry" || $AdminPageID=="ViewIncome" || $AdminPageID=="ExpensesEntry" || $AdminPageID=="ViewExpenses") {
			include "content/" . $AdminPageID . ".php";
			
			}
else
{
include "home.php";
}
?><BR>

</TD>
<?
if($AdminPageID!="")
{
?>
<TD width="100%" align="center" valign="top"  class="sidebarright-width">

<table width="100%" border="0" bgcolor="">
  <tr>
    <td ><div >
      <div align="center"><img src="images/icons/file_manager.gif" alt="Publish/Unpublish Results" width="32" height="32" border="0"><strong>Expenses:</strong>      </div>
        <hr size="15" color="#CCCCCC">
    </div></td>
  </tr>
  <tr>
    <td><div >
      <div align="left"><a href="?AdminPageID=NewexpenseHead&Opt=New">New Heading</a></div>
    </div></td>
  </tr>
  <tr>
    <td><div align="left"><a href="?AdminPageID=ExpensesEntry&Opt=Add">Expenditure On</a> &nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="left"><a href="?AdminPageID=ViewExpenses">View</a>&nbsp;</div></td>
  </tr>
</table>

<!-- RIGHT SIDEBAR AREA --></TD>
<?
}
else
{
?>
<TD width="12%" align="center" valign="top"  class="sidebarright-width"></td>
<?
}
?>
</TR></TBODY></TABLE>
<!-- CONTENT TABLE -->




</TD></TR></TBODY></TABLE>
<!-- SPLIT TABLE -->




<!-- PAGE TABLE -->
</TD></TR><TR><TD>




<!-- BOTTOM PAGEBAR -->
<TABLE cellpadding="0" cellspacing="0" border="0" width="100&percnt;"><TBODY><TR class="printhide">
</TR></TBODY></TABLE>




<!-- PAGE TABLE -->
</TD></TR>
<TABLE width="100%;" border="0" cellpadding="0" cellspacing="0">
  <TBODY>
   <TR>
      <TD align="center" valign="middle" bgcolor="#C0CCCC" class="shadow-horizontal" height="100%">&nbsp;</TD>
    </TR>
    <TR>
      <TD align="center" valign="middle" bgcolor="#D1DADA" class="shadow-horizontal" height="35px">
        <!-- COPYRIGHT -->
        <strong>&copy;National Business Association 2010 <br>
        New Road, Kathamandu</strong></TD>
    </TR>
    <TR>
      <TD align="center" valign="middle" bgcolor="#C0CCCC" class="shadow-horizontal" height="100%">&nbsp;</TD>
    </TR>
  </TBODY>
</TABLE>
</BODY></HTML>