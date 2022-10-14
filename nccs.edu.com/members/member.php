<?php
	@session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	include "../include/config.php";
?> 

<html>
<head>
<title><? include"../include/hd_titles.php";?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="Webmaster" content="Pujan, Sabin, Anil">
<script type="text/javascript">
<!--
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
		members_03_over = newImage("images/members_03-over.gif");
		members_04_over = newImage("images/members_04-over.gif");
		members_05_over = newImage("images/members_05-over.gif");
		members_06_over = newImage("images/members_06-over.gif");
		members_07_over = newImage("images/members_07-over.gif");
		preloadFlag = true;
	}
}

// -->

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_nbGroup(event, grpName) { //v6.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    nbArr = document[grpName];
    if (nbArr)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
      nbArr[nbArr.length] = img;
  } }
}
//-->
</script>
<script language="JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_nbGroup(event, grpName) { //v6.0
var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])?args[i+1] : img.MM_up);
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) { img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    nbArr = document[grpName];
    if (nbArr) for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
      nbArr[nbArr.length] = img;
  } }
}

function MM_preloadImages() { //v3.0
 var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
   if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function mmLoadMenus() {
  if (window.mm_menu_0030145739_0) return;
  window.mm_menu_0030145739_0 = new Menu("root",127,16,"Verdana, Arial, Helvetica, sans-serif",10,"#624a7e","#ffffff","#d8d6e7","#624a7e","left","middle",3,0,1000,-5,7,true,false,true,0,true,true);
  mm_menu_0030145739_0.addMenuItem("Introduction&nbsp;of&nbsp;BIM","location='?MemberPageID=Introduction_BIM'");
  mm_menu_0030145739_0.addMenuItem("Introduction&nbsp;of&nbsp;NCCS","location='?MemberPageID=Introduction_NCCS'");
  mm_menu_0030145739_0.addMenuItem("Aims&nbsp;&amp;&nbsp;Objectives","location='?MemberPageID=Aims_Objectives'");
   mm_menu_0030145739_0.hideOnMouseOut=true;
   mm_menu_0030145739_0.menuBorder=0;
   mm_menu_0030145739_0.menuLiteBgColor='#ffffff';
   mm_menu_0030145739_0.menuBorderBgColor='#624a7e';
   mm_menu_0030145739_0.bgColor='#555555';
  window.mm_menu_0030145851_1 = new Menu("root",120,16,"Verdana, Arial, Helvetica, sans-serif",10,"#624a7e","#ffffff","#d8d6e7","#624a7e","left","middle",3,0,1000,-5,7,true,false,true,0,true,true);
  mm_menu_0030145851_1.addMenuItem("Student's Profile","location='?MemberPageID=Students_Profile'");
  mm_menu_0030145851_1.addMenuItem("Staff's Profile","location='?MemberPageID=Staffs_Profile'");
  mm_menu_0030145851_1.addMenuItem("Site&nbsp;Team&nbsp;","location='?MemberPageID=SiteTeam'");
  mm_menu_0030145851_1.addMenuItem("Search","location='?MemberPageID=Search'");
   mm_menu_0030145851_1.hideOnMouseOut=true;
   mm_menu_0030145851_1.menuBorder=0;
   mm_menu_0030145851_1.menuLiteBgColor='#ffffff';
   mm_menu_0030145851_1.menuBorderBgColor='#624a7e';
   mm_menu_0030145851_1.bgColor='#555555';

  mm_menu_0030145851_1.writeMenus();
} // mmLoadMenus()

//-->
</script>
<script language="JavaScript1.2" src="../include/mm_menu.js"></script>
<script language="javascript" src="../include/fvalid.js"></script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<?
	include ("../include/db.php");
	$log_query = "SELECT * from tbl_members where id=$_SESSION[valid_id]";
	$log_result = mysql_query($log_query);
	$log_show = mysql_fetch_array($log_result);
?>

<link href="../include/bcis.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="preloadImages();MM_preloadImages('../images/bcisn2k5.com.np-menu_01_sim.gif','../images/bcisn2k5.com.np-menu_01_ov.gif','../images/bcisn2k5.com.np-menu_02_sim.gif','../images/bcisn2k5.com.np-menu_02_ov.gif','../images/bcisn2k5.com.np-menu_r1_c1.gif','../images/bcisn2k5.com.np-menu_r2_c1.gif')">
<script language="JavaScript1.2">mmLoadMenus();</script>
<?php
	include "../include/header.inc";
?>
<table width="778" height="22" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td width="490" height="22" background="images/members_01.gif" class="bk_navbar">
			&nbsp;You are 
      logged in as: <? echo $_SESSION["valid_user"] . " [".$_SESSION["valid_auth"]."]";?></td>
		<td>
			<a href="member.php"
				onmouseover="changeImages('members_03', 'images/members_03-over.gif'); return true;"
				onmouseout="changeImages('members_03', 'images/members_03.gif'); return true;"
				onmousedown="changeImages('members_03', 'images/members_03-over.gif'); return true;"
				onmouseup="changeImages('members_03', 'images/members_03-over.gif'); return true;">
				<img name="members_03" src="images/members_03.gif" width="62" height="22" border="0" alt=""></a></td>
		<td>
			<a href="?MemberPageID=Inbox"
				onmouseover="changeImages('members_04', 'images/members_04-over.gif'); return true;"
				onmouseout="changeImages('members_04', 'images/members_04.gif'); return true;"
				onmousedown="changeImages('members_04', 'images/members_04-over.gif'); return true;"
				onmouseup="changeImages('members_04', 'images/members_04-over.gif'); return true;">
				<img name="members_04" src="images/members_04.gif" width="76" height="22" border="0" alt=""></a></td>
		<td>
			<a href="?MemberPageID=Option"
				onmouseover="changeImages('members_05', 'images/members_05-over.gif'); return true;"
				onmouseout="changeImages('members_05', 'images/members_05.gif'); return true;"
				onmousedown="changeImages('members_05', 'images/members_05-over.gif'); return true;"
				onmouseup="changeImages('members_05', 'images/members_05-over.gif'); return true;">
				<img name="members_05" src="images/members_05.gif" width="75" height="22" border="0" alt=""></a></td>
		<td>
			<a href="logout.php?id=<?=$log_show[id];?>"
				onmouseover="changeImages('members_07', 'images/members_07-over.gif'); return true;"
				onmouseout="changeImages('members_07', 'images/members_07.gif'); return true;"
				onmousedown="changeImages('members_07', 'images/members_07-over.gif'); return true;"
				onmouseup="changeImages('members_07', 'images/members_07-over.gif'); return true;">
				<img name="members_07" src="images/members_07.gif" width="75" height="22" border="0" alt=""></a></td>
	</tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td>
			<img src="../images/index_13.gif" width="133" height="9" alt=""></td>
		<td>
			<img src="../images/index_14.gif" width="512" height="9" alt=""></td>
		<td>
			<img src="../images/index_15.gif" width="133" height="9" alt=""></td>
	</tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="133" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="135">
        <tr> 
          <td><img src="../images/index_16.gif" width="133" height="23" alt=""></td>
        </tr>
        <tr> 
          <td><a href="javascript:;" target="_top" onClick="MM_nbGroup('down','navbar1','bcisn2k5comnpmenu_r1_c1','../images/bcisn2k5.com.np-menu_r1_c1.gif',1)" onMouseOver="MM_showMenu(window.mm_menu_0030145739_0,125,0,null,'bcisn2k5comnpmenu_r1_c1');MM_nbGroup('over','bcisn2k5comnpmenu_r1_c1','../images/bcisn2k5.com.np-menu_01_ov.gif','',1)" onMouseOut="MM_startTimeout();;MM_nbGroup('out')"><img name="bcisn2k5comnpmenu_r1_c1" src="../images/bcisn2k5.com.np-menu_r1_c1.gif" width="133" height="20" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><a href="javascript:;" target="_top" onClick="MM_nbGroup('down','navbar1','bcisn2k5comnpmenu_r2_c1','../images/bcisn2k5.com.np-menu_r2_c1.gif',1)" onMouseOver="MM_showMenu(window.mm_menu_0030145851_1,125,0,null,'bcisn2k5comnpmenu_r2_c1');MM_nbGroup('over','bcisn2k5comnpmenu_r2_c1','../images/bcisn2k5.com.np-menu_02_ov.gif','',1)" onMouseOut="MM_startTimeout();;MM_nbGroup('out')"><img name="bcisn2k5comnpmenu_r2_c1" src="../images/bcisn2k5.com.np-menu_r2_c1.gif" width="133" height="17" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><a href="?MemberPageID=Articles"><img name="bcisn2k5comnpmenu_r3_c1" src="../images/bcisn2k5.com.np-menu_r3_c1.gif" width="133" height="17" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><a href="?MemberPageID=Downloads"><img name="bcisn2k5comnpmenu_r4_c1" src="../images/bcisn2k5.com.np-menu_r4_c1.gif" width="133" height="17" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><a href="?MemberPageID=Contact_Us"><img name="bcisn2k5comnpmenu_r5_c1" src="../images/bcisn2k5.com.np-menu_r5_c1.gif" width="133" height="16" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><img src="../images/index_25.gif" width="133" height="5" alt=""></td>
        </tr>
      </table>
	  <?
	  	if ($_SESSION["valid_auth"] != "Library") {
		  include "../include/db.php"; 
		  
		  //Display New books. 
		  $bknewquery = "SELECT * FROM tbl_lib_book ORDER BY bk_id DESC LIMIT 5";
		  $bknewresult = mysql_query($bknewquery);
		  $bknewnum = mysql_num_rows($bknewresult);
	  ?>
	  <br>
	  <table width="133" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td class="box_hd" height="23">:: New Books</td>
        </tr>
        <tr> 
          <td background="../images/left_barbk.gif">
		  <?
	
	if (!bknewnum) {
		echo "<span class=\"login_sm_text\">No Books in the Library!</span>";
	}
	echo " 
		<table width=\"112\" border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"#A7A1C7\" class=\"small\">";
		while ($show_NB = mysql_fetch_array($bknewresult)) {
		echo "
		  <tr bgcolor=\"#D8D6E7\">
			<td width=\"14%\" valign=\"top\">&nbsp;<img src=\"".$Images."icons/mem_bullet.gif\" width=\"7\" height=\"7\"></td>
			<td width=\"86%\">";
			if ($show_NB[ref_yn] == 1 && $show_NB[in_out] != 1) {
					$Type = "Reference book!";
				}
				else if ($show_NB[ref_yn] == 1 && $show_NB[in_out] == 1) {
					$Type = "Reference book is in use!";
				}
				else {
					if ($show_NB[in_out] == 0) { 
						$Type = "Book is in the Library!";
					}
					else { 
						$Type = "The book is in use!";
					}
				}
			echo "<a href=\"#\" onclick=\"alert('$Type\\n\\nCode No.: $show_NB[code_no]\\nName      : $show_NB[bk_name]\\nAuthor    : $show_NB[bk_author]\\nPublisher : $show_NB[bk_publisher]')\" class=\"small_lk\">$show_NB[bk_name]</a>
			</td>
		  </tr>";
		}
	echo"</table>";
		  ?>		  
		  </td>
        </tr>
        <tr> 
          <td><img src="../images/index_25.gif" width="133" height="5"></td>
        </tr>
      </table>
	  <?
	  }
	  ?>
	  <br>
	  <table width="133" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td class="box_hd" height="23">:: Currently Online </td>
        </tr>
        <tr> 
          <td background="../images/left_barbk.gif"><table width="78%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td valign="bottom" class="login_text"><center>
                    <?php
						include "../online_mems.php";
					?>
                  </center></td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td><img src="../images/index_25.gif" width="133" height="5"></td>
        </tr>
      </table>
      <br>
      <table width="133" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td class="box_hd" height="23">:: Total </td>
        </tr>
        <tr> 
          <td background="../images/left_barbk.gif"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="login_sm_text">
              <tr> 
                <td width="48%" valign="middle">Members<br>
                </td>
                <td width="52%">: 
                  <? 
		  include "../include/db.php"; 
		  $query = "SELECT * from tbl_members";
		  $result = mysql_query($query);
		  $num = mysql_num_rows($result);
		  echo "$num";
	  ?>
                </td>
              </tr>
              <tr> 
                <td> Users 
                </td>
                <td>:&nbsp;<? include "../online.php";?></td>
              </tr>
            </table>
            <span class="login_sm_text"></span></td>
        </tr>
        <tr> 
          <td><img src="../images/index_25.gif" width="133" height="5"></td>
        </tr>
      </table>
      <?php
	  	if ($_SESSION["valid_auth"] == "Library") {
		?>
		<table width="133" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="" height="23">&nbsp;</td>
        </tr>
        <tr>
          <td class="box_hd" height="23">:: Books</td>
        </tr>
        <tr>
          <td background="../images/left_barbk.gif"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="login_sm_text">
              <tr>
                <td width="50%" valign="middle">Total</td>
                <td width="50%">:
                  <? 
				    include "../include/db.php"; 
		  $query = "SELECT * FROM tbl_lib_book";
		  $result = mysql_query($query);
		  $bk_num = mysql_num_rows($result);
		  			echo "$bk_num";
	  			?>                </td>
              </tr>
              <tr class="AA">
                <td valign="middle">Reference</td>
                <td>: <? 
				  	 //Total no of ref. books. 
		  		include "../include/db.php";
		  $bkrefquery = "SELECT ref_yn FROM tbl_lib_book WHERE ref_yn='1'";
		  $bkrefresult = mysql_query($bkrefquery);
		  $bkrefnum = mysql_num_rows($bkrefresult);
		  			echo "$bkrefnum";
	  			?></td>
              </tr>
              <tr>
                <td colspan="2" valign="middle"><div align="center">[<a href="?MemberPageID=BookAdd" class="small_lk">Add</a> | <a href="?MemberPageID=BookList&sortby=bk_name" class="small_lk">List</a>]<br>
                  [<a href="?MemberPageID=BookIssue" class="small_lk">Issue</a> | <a href="?MemberPageID=BookReceipt" class="small_lk">Receipt</a>]</div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td><img src="../images/index_25.gif" alt="" width="133" height="5"></td>
        </tr>
      </table>
	<?	}
	  ?></td>
    <td width="512" valign="top" class="text">
      <?php
	  if($MemberPageID == "View_Profile") {
	  	// To Show Member's Name in Member/View Profie Title
	  	include "../include/db.php";
	  	$query = "Select * from tbl_members where id = $_REQUEST[id]";
		$result = mysql_query($query);
		$show = mysql_fetch_array($result);
		}

	  	function TitleTable() {
			global $MemberPageID;
			global $query;
			global $result;
			global $show;
			echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
					<tr> 
					  <td background=\"../images/icons/bk1.gif\"><NOBR>"; 
						include "../include/MpTitles.php";
					  echo "</NOBR>
					  </td>
					  <td width=\"22\"><img src=\"../images/icons/bk2.gif\" width=\"22\" height=\"21\"></td>
					  <td width=\"100%\" background=\"../images/icons/bk3.gif\">&nbsp;</td>
					</tr>
				  </table>";		
		}
	   
	  	if($MemberPageID == "Inbox" || $MemberPageID == "ViewMsg" || $MemberPageID == "Compose" || $MemberPageID == "Send_Message" || $MemberPageID == "Remove_Message" || $MemberPageID == "Reply" || $MemberPageID == "Option" || $MemberPageID == "View_Profile") {
			TitleTable();
			include "$MemberPageID.php";
		}
		else if ($MemberPageID == "Introduction_BIM" || $MemberPageID == "Introduction_NCCS" || $MemberPageID == "Aims_Objectives" || $MemberPageID == "Students_Profile" || $MemberPageID == "Staffs_Profile" || $MemberPageID == "SiteTeam" || $MemberPageID == "Search" || $MemberPageID == "Search_ENF" || $MemberPageID == "Articles" || $MemberPageID == "ArticlePOST" || $MemberPageID == "ArticlePosted" || $MemberPageID == "ArticleModify" || $MemberPageID == "ArticleENF" || $MemberPageID == "Downloads"  || $MemberPageID == "BookAdd"  || $MemberPageID == "Book_ENF" || $MemberPageID == "BookList" || $MemberPageID == "BookModify" || $MemberPageID == "BookIssue" || $MemberPageID == "BookReceipt" || $MemberPageID == "NotePOST" || $MemberPageID == "NotePosted" || $MemberPageID == "NoteModify" || $MemberPageID == "NoteENF" || $MemberPageID == "Contact_Us") {
			TitleTable();
			//echo "<br>";
			include "../contents/". $MemberPageID .".php";
		}
		else {
			include "home.php";
		}	  
	  ?>
    </td>
    <td width="133" valign="top"><table width="133" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td class="box_hd" height="23">:: Search </td>
        </tr>
      <tr>
        <td background="../images/right_barbk.gif">
          <table width="78%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="bottom" class="login_text">Book:</td>
            </tr>
            <tr>
              <td valign="bottom" class="login_text"><div align="center">
			  	<form name="search_book" method="post" action="?MemberPageID=Search_ENF&SearchCat=Book">
                  <input name="searchstring" type="text" id="uname" class="login_box" size="13">
                  <input name="imageField2" type="image" src="<?=$Images;?>go_sm.gif" align="middle">
			  	</form></div>
			  </td>
            </tr>
			<?
				if ($_SESSION["valid_auth"] == "Library") {
			?>
            <tr>
              <td valign="bottom" class="login_text">Borrower:</td>
            </tr>
            <tr>
              <td valign="bottom" class="login_text">
			  	<form name="search_borrower" method="post" action="?MemberPageID=Search_ENF&SearchCat=Borrower" ><div align="center">
                  <input name="searchstring" type="text" id="passwd" class="login_box" size="13">
                  <input name="imageField22" type="image" src="<?=$Images;?>go_sm.gif" align="middle"></div>
              	</form>
			  </td>
            </tr>
			<?
				}
			?>
          </table>
        </td>
      </tr>
      <tr> 
        <td><img src="../images/index_25.gif" width="133" height="5"></td>
      </tr>
    </table>
	  <?
	  	//Only for Librarian
	  	if ($_SESSION["valid_auth"] == "Library") {
		  include "../include/db.php"; 
		  $query = "SELECT * FROM tbl_lib_book";
		  $result = mysql_query($query);
		  $bk_num = mysql_num_rows($result);
		  
		  //Total no of books out. 
		//  $bkotquery = "SELECT in_out FROM tbl_lib_book WHERE in_out='1'";
		//  $bkotresult = mysql_query($bkotquery);
		//  $bkotnum = mysql_num_rows($bkotresult);
		  
		 
	  ?>
	  <?
	  	} //End for Librarian

		//Book Borrowers
		include "../include/db.php";
		//$BBQuery = "SELECT * FROM tbl_lib_book WHERE mem_id = '".$_SESSION["valid_id"]."'";
		//$BBRunQ = mysql_query($BBQuery);
		//$BBCount = mysql_num_rows($BBRunQ);
		
		if ($BBCount > 0) {
		?>
<script language="javascript" src="../include/mar_function.js"></script>
		<table width="133" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="box_hd" height="23">:: Borrowed [<?=$BBCount;?>]</td>
      </tr>
      <tr>
        <td background="../images/left_barbk.gif">
		<div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
		  <div id="vmarquee" style="position: absolute; width: 100%;">
		  <table width="86%" border="0" align="center" cellpadding="0" cellspacing="0" class="login_sm_text">
			<?
				while ($BBShow = mysql_fetch_array($BBRunQ)) {
				?>
				<tr>
				  <td width="4" valign="top">»&nbsp;</td>
				  <td><strong><?=$BBShow["bk_name"];?></strong> - <?=$BBShow["bk_author"];?></td>
				</tr>
				<tr>
				  <td></td>
				  <td>Borrow Date: <?=$BBShow["issue_date"];?></td>
				</tr>
				<tr>
				  <td></td>
				  <td>Submission Date: <?=$BBShow["receipt_date"];?></td>
				</tr>
				<tr>
				  <td></td>
				  <td><img src="../images/spacer.gif" height="5"></td>
				</tr>									
				<?
				}// End of while
			?>
		  </table>
		  </div>
		</div>			
        </td>
      </tr>
      <tr>
        <td><img src="../images/index_25.gif" width="133" height="5"></td>
      </tr>
    </table>
		<?
		}// End of BBCount
	  	?>
	<br>
    <table width="133" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="box_hd" height="23">:: Post </td>
      </tr>
      <tr>
        <td background="../images/left_barbk.gif">
		  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="login_sm_text">
			<tr>
              <td width="10%"><div align="center"><img src="../images/icons/pin_blue.gif" width="4" height="4"></div></td>
			  <?
			  	$PostART = mysql_query("SELECT * FROM tbl_news_articles WHERE mem_id = '".$_SESSION["valid_id"]."'");
				$CountART = mysql_num_rows ($PostART);
			  ?>
			  <td width="90%"><a href="?MemberPageID=ArticlePOST" class="small_lk">Article</a> [<?=$CountART;?>]
			    <?
			  	if ($CountART >= 1) {
					echo " | <a href=\"?MemberPageID=ArticlePosted\" class=\"small_lk\" title=\"List/view posted articles!\">List</a>";
				}
			  ?></td>
            </tr>
		<?
	  	//Only For Teacher
	  	if ($_SESSION["valid_auth"] == "Teacher") {
		  include "../include/db.php"; 
		  ?>
            <tr>
              <td width="10%"><div align="center"><img src="../images/icons/pin_blue.gif" width="4" height="4"></div></td>
			   <?
			  	$PostNOTE = mysql_query("SELECT * FROM tbl_note WHERE mem_id = '".$_SESSION["valid_id"]."'");
				$CountNOT = mysql_num_rows ($PostNOTE);
			  ?>
			  <td width="90%"><a href="?MemberPageID=NotePOST" class="small_lk">Notes</a>[<?=$CountNOT;?>]
			  <?
			  	if ($CountNOT >= 1) {
					echo " | <a href=\"?MemberPageID=NotePosted\" class=\"small_lk\" title=\"List/view posted notes!\">List</a>";
				}
			  ?>
			  </td>
            </tr>
            <tr>
              <td><div align="center"><img src="../images/icons/pin_blue.gif" width="4" height="4"></div></td>
			  <td>Marks Entry</td>
            </tr>
		  <?
		  } //End for Teacher
		?>
          </table>
		</td>
      </tr>
      <tr>
        <td><img src="../images/index_25.gif" width="133" height="5"></td>
      </tr>
    </table>
	<br>
	  <table width="133" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="box_hd" height="23">:: Events</td>
      </tr>
        <tr> 
          <td background="../images/right_barbk.gif"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td valign="bottom" class="login_sm_text"><?php
						 include "../events.php";
					?></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <br>
	  <table width="133" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="box_hd" height="23">:: Notice </td>
      </tr>
        <tr> 
          <td background="../images/right_barbk.gif"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td valign="bottom" class="login_sm_text"> 
                  <?php
						 include "../notice.php";
					?>
                </td>
              </tr>
			  <?
			  	if ($ToTNoT == 0) {
					?>
						<tr>
			  				<td><img src="<?=$Images;?>index_25.gif" width="133" height="5"></td>
						</tr>
					<?
				}
			  ?>
        
            </table></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php
	include "../include/footer.inc";
?>
</body>
</html>