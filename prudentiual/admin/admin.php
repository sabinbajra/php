<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	//$admin = $_GET["AdminPageID"];
	$edit = $_GET["edit"];
	$view = $_GET["view"];
	$edited = $_GET["edited"];
	$view = $_GET["view"];
	
	$adminID = $_GET["adminID"];
	$Edit = $_REQUEST["Edit"];
	$MGMT=$_GET["MGMT"];	
	$BOD = $_GET["BOD"];
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- saved from url=(0057)http://allwebcodesign.com/templates/T27dChromeLightgreen/ -->
<HTML><HEAD><META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<!-- get the value-->



<!-- CHANGE THE NEXT THREE LINES -->

<TITLE>Drop Menu Website Template</TITLE>
<META name="Description" content="Place your website description in this area. This is read by some search engines.">
<META name="KeyWords" content="add, your, keywords and phrases in this area, separated, by, commas, this, is read by only a, few search, engines">

<!-- CHANGE THE ABOVE THREE LINES -->




<META name="Copyright" content="Allwebco Design Corporation http://allwebcodesign.com/">

 
<LINK rel="StyleSheet" href="../Drop Menu Website Template_files/common-style.css" type="text/css">
<LINK rel="StyleSheet" href="../Drop Menu Website Template_files/gray.css" type="text/css">
<LINK rel="StyleSheet" href="../Drop Menu Website Template_files/gray-menu.css" type="text/css">


<SCRIPT language="JavaScript" type="text/javascript" src="../Drop Menu Website Template_files/css.js"></SCRIPT><LINK rel="StyleSheet" href="../Drop Menu Website Template_files/lightgreen.css" type="text/css"><LINK rel="StyleSheet" href="../Drop Menu Website Template_files/lightgreen-menu.css" type="text/css">


<SCRIPT language="JavaScript" type="text/javascript" src="../Drop Menu Website Template_files/javascripts.js"></SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript" src="../Drop Menu Website Template_files/pop-closeup.js"></SCRIPT></HEAD>
<BODY bgcolor="#FFFFFF" text="#000000"> 


<!-- OUTER PAGE TABLE-->







<!-- PICTURE AND BAR TABLE -->
<TABLE cellpadding="0" cellspacing="0" border="0" width="100%"><TBODY><TR><TD height="95" background="" class="pictbackground"><img  src="../image/top.gif" border="0" width="100%" height="95" alt="Image"></TD>
</TR><TR class="printhide"><TD class="pagebars">
<IMG src="../Drop Menu Website Template_files/spacer.gif" width="10" height="1" alt="image"><BR>
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
<LI style="width: 110px;"><A href="admin.php">Home</A>    
  </LI>  
<LI style="width: 110px;"><A href="?adminID=Content">Contents</A></LI>
<LI style="width: 110px;">
<A href="#">Services</A>    
<UL>      
<LI>
<A href="#">Deposit Collection</A></LI>      
<LI>
<A href="#">Loans and Advances</A></LI> 
<LI>
<A href="#">Consortium Loans<br>&nbsp;&nbsp;(through negotiations)</A></LI>  
<LI>
<A href="#">Share Loan</A></LI>
<LI>
<A href="#">Issue of Bank Guarantee</A></LI>  
<LI>
<A href="#">Merchant Banking<br>&nbsp;&nbsp;(Not Started)</A></LI> 
<LI>
<A href="#">Additional Services<br>&nbsp;&nbsp;as per Clients' Needs</a></LI>
</UL>  
</LI>  

<LI style="width: 110px;">
<A href="#">Gallery</A>    
<UL>      
<LI>
<A href="#">Gallery 1</A></LI>      

<LI>
<A href="#">Gallery 2</A></LI>      

<LI><A href="#">Gallery 3</A></LI>      

<LI><A href="#">Ordering 1</A></LI>

<LI><A href="#">Ordering 2</A></LI>

<LI><A href="#">Ordering 3</A></LI>    
</UL>
</LI>

<LI style="width: 110px;"><A href="#">Resources</A>    
<UL>      
<LI><A href="#">Company News</A></LI>      
<LI><A href="#">Website Links</A></LI>    
</UL>  
</LI>  

<LI style="width: 140px;"><A href="#">Help &amp; Support</A>    
<UL>
<LI><A href="#">Site Map</A></LI>      
<LI><A href="#">F.A.Q.</A></LI>      
<LI><A href="#">Contact Us</A></LI>    
<LI><A href="#">Careers</A></LI>      
<LI><A href="#" target="_blank">PDF Downloads</A></LI>    
</UL>
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
<TABLE cellpadding="0" cellspacing="0" border="0" width="100%;"><TBODY><TR>
<TD height="675" align="left" valign="top" bgcolor="#FFFFFF" class="sidebar-background">
<br>
<table width="100%">
  <tr>
    <td><a href="#">Promoters</a></td>
  </tr>
  <tr>
    <td><a href="?adminID=BOD">Board of Directors&nbsp;</a></td>
  </tr>
  <tr>
    <td><a href="?adminID=Management">Management&nbsp;</a></td>
  </tr>
  <tr>
    <td><a href="#">Product and Interest </a></td>
  </tr>
  <tr>
    <td><a href="#">Balance Sheet </a></td>
  </tr>
  <tr>
    <td><a href="#">Visit us </a></td>
  </tr>
</table>




<!-- LEFT SIDEBAR AREA --></TD>
<TD align="left" valign="top" width="40" class="pageheight"><BR></TD><TD align="center" valign="top" class="shadow-horizontal">



<BR><BR>



<!-- START CONTENT TABLE -->
<TABLE cellpadding="5" cellspacing="0" border="0" width="100%"><TBODY><TR><TD height="100%" align="left" valign="top" class="just">





<?php   

if($adminID=="Management" || $adminID=="BOD" || $adminID=="Content" || $adminID == "viewservice" ||$adminID == "viewsaving")
{

	include "content/".$adminID.".php";
}
else
{
include "home.php";
}
?><BR>

</TD>
<TD align="center" valign="top" class="sidebarright-width">

<table width="100%" border="0" bgcolor="">
  <tr>
    <td bgcolor="#d1dada"><div align="center"><strong>Register!</strong>&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="center">admin user </div></td>
  </tr>
</table>
<hr>
<table width="100%" border="0" bgcolor="">
  <tr>
    <td bgcolor="#d1dada"><div align="center"><strong><a href="?adminID=BOD"><strong>BOD</strong></a></strong>&nbsp;</div></td>
  </tr>
  <tr>
    <td bgcolor="#d1dada"><div align="center"><strong><a href="?adminID=Management">Management</a></strong>&nbsp;</div></td>
  </tr>
</table>
<hr>

<!-- RIGHT SIDEBAR AREA --></TD>
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
</TD></TR><TR>
  <TD align="center" valign="middle" bgcolor="#D1DADA" class="shadow-horizontal" height="35px">

<!-- COPYRIGHT -->

&copy;Prudential Bittiya Sanstha Ltd<br>Kamaladi, Kathamandu</TD>
</TR></TBODY></TABLE>
<!-- END OUTER PAGE TABLE -->






</BODY></HTML>