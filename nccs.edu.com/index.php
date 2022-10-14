<?php
	@session_start();
	include "include/config.php";
?> 

<html>
<head>
<title><? include "include/titles.php";?></title>
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
		members_03_over = newImage("members/images/members_03-over.gif");
		/*
		members_04_over = newImage("members/images/members_04-over.gif");
		members_05_over = newImage("members/images/members_05-over.gif");
		members_06_over = newImage("members/images/members_06-over.gif");
		members_07_over = newImage("members/images/members_07-over.gif");
		*/
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
  mm_menu_0030145739_0.addMenuItem("Introduction&nbsp;of&nbsp;BIM","location='?PageID=Introduction_BIM'");
  mm_menu_0030145739_0.addMenuItem("Introduction&nbsp;of&nbsp;NCCS","location='?PageID=Introduction_NCCS'");
  mm_menu_0030145739_0.addMenuItem("Aims&nbsp;&amp;&nbsp;Objectives","location='?PageID=Aims_Objectives'");
   mm_menu_0030145739_0.hideOnMouseOut=true;
   mm_menu_0030145739_0.menuBorder=0;
   mm_menu_0030145739_0.menuLiteBgColor='#ffffff';
   mm_menu_0030145739_0.menuBorderBgColor='#624a7e';
   mm_menu_0030145739_0.bgColor='#555555';
  window.mm_menu_0030145851_1 = new Menu("root",120,16,"Verdana, Arial, Helvetica, sans-serif",10,"#624a7e","#ffffff","#d8d6e7","#624a7e","left","middle",3,0,1000,-5,7,true,false,true,0,true,true);
  mm_menu_0030145851_1.addMenuItem("Site&nbsp;Team&nbsp;","location='?PageID=SiteTeam'");
   mm_menu_0030145851_1.hideOnMouseOut=true;
   mm_menu_0030145851_1.menuBorder=0;
   mm_menu_0030145851_1.menuLiteBgColor='#ffffff';
   mm_menu_0030145851_1.menuBorderBgColor='#624a7e';
   mm_menu_0030145851_1.bgColor='#555555';

  mm_menu_0030145851_1.writeMenus();
} // mmLoadMenus()

//-->
</script>
<script language="JavaScript1.2" src="include/mm_menu.js"></script>
<script language="javascript" src="include/fvalid.js"></script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<link href="include/bcis.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="preloadImages();MM_preloadImages('images/bcisn2k5.com.np-menu_01_sim.gif','images/bcisn2k5.com.np-menu_01_ov.gif','images/bcisn2k5.com.np-menu_02_sim.gif','images/bcisn2k5.com.np-menu_02_ov.gif','images/bcisn2k5.com.np-menu_r1_c1.gif','images/bcisn2k5.com.np-menu_r2_c1.gif')">
<script language="JavaScript1.2">mmLoadMenus();</script>
<?php
	include "include/header.inc";
?>
<table width="778" height="22" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td width="716" height="22" class="bk_navbar">
			&nbsp;-&gt; Welcome to NCCS - CMS</td>
		<td width="62">
			<a href="index.php"
				onmouseover="changeImages('members_03', 'members/images/members_03-over.gif'); return true;"
				onmouseout="changeImages('members_03', 'members/images/members_03.gif'); return true;"
				onmousedown="changeImages('members_03', 'members/images/members_03-over.gif'); return true;"
				onmouseup="changeImages('members_03', 'members/images/members_03-over.gif'); return true;">
				<img name="members_03" src="members/images/members_03.gif" width="62" height="22" border="0" alt=""></a></td>
	</tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td>
			<img src="images/index_13.gif" width="133" height="9" alt=""></td>
		<td>
			<img src="images/index_14.gif" width="512" height="9" alt=""></td>
		<td>
			<img src="images/index_15.gif" width="133" height="9" alt=""></td>
	</tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="133" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="135">
        <tr> 
          <td><img src="images/index_16.gif" width="133" height="23" alt=""></td>
        </tr>
        <tr> 
          <td><a href="javascript:;" target="_top" onClick="MM_nbGroup('down','navbar1','bcisn2k5comnpmenu_r1_c1','images/bcisn2k5.com.np-menu_r1_c1.gif',1)" onMouseOver="MM_showMenu(window.mm_menu_0030145739_0,125,0,null,'bcisn2k5comnpmenu_r1_c1');MM_nbGroup('over','bcisn2k5comnpmenu_r1_c1','images/bcisn2k5.com.np-menu_01_ov.gif','',1)" onMouseOut="MM_startTimeout();;MM_nbGroup('out')"><img name="bcisn2k5comnpmenu_r1_c1" src="images/bcisn2k5.com.np-menu_r1_c1.gif" width="133" height="20" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><a href="javascript:;" target="_top" onClick="MM_nbGroup('down','navbar1','bcisn2k5comnpmenu_r2_c1','images/bcisn2k5.com.np-menu_r2_c1.gif',1)" onMouseOver="MM_showMenu(window.mm_menu_0030145851_1,125,0,null,'bcisn2k5comnpmenu_r2_c1');MM_nbGroup('over','bcisn2k5comnpmenu_r2_c1','images/bcisn2k5.com.np-menu_02_ov.gif','',1)" onMouseOut="MM_startTimeout();;MM_nbGroup('out')"><img name="bcisn2k5comnpmenu_r2_c1" src="images/bcisn2k5.com.np-menu_r2_c1.gif" width="133" height="17" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><a href="?PageID=Articles"><img name="bcisn2k5comnpmenu_r3_c1" src="images/bcisn2k5.com.np-menu_r3_c1.gif" width="133" height="17" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><a href="?PageID=Downloads"><img name="bcisn2k5comnpmenu_r4_c1" src="images/bcisn2k5.com.np-menu_r4_c1.gif" width="133" height="17" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><a href="?PageID=Contact_Us"><img name="bcisn2k5comnpmenu_r5_c1" src="images/bcisn2k5.com.np-menu_r5_c1.gif" width="133" height="16" border="0" alt=""></a></td>
        </tr>
        <tr> 
          <td><img src="images/index_25.gif" width="133" height="5" alt=""></td>
        </tr>
      </table>
      <br>
      <table width="133" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="images/index_28.gif" width="133" height="23"></td>
        </tr>
        <tr>
          <td background="images/log_bk.gif"><form name="form1" method="post" action="members/?login=member" onSubmit="return form_Validator(this)" >
            <table width="78%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="bottom" class="login_text">Username :</td>
              </tr>
              <tr>
                <td valign="bottom" class="login_text"><div align="center">
                  <input name="username" type="text" id="uname" class="login_box" size="15">
                </div></td>
              </tr>
              <tr>
                <td valign="bottom" class="login_text">Password :</td>
              </tr>
              <tr>
                <td valign="bottom" class="login_text"><div align="center">
                  <input name="password" type="password" id="passwd" class="login_box" size="15">
                </div></td>
              </tr>
              <tr>
                <td valign="bottom" class="login_text"><div align="center">
                  <input type="image" name="imageField" src="images/go.gif">
                </div></td>
              </tr>
              <tr>
                <td valign="middle" class="login_sm_text" height="15">Forgot Password! </td>
              </tr>
            </table>
                    </form>
          </td>
        </tr>
        <tr>
          <td><img src="images/index_32.gif" width="133" height="7"></td>
        </tr>
      </table>
      <br>
      <table width="133" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="box_hd" height="23">:: Currently Online</td>
      </tr>
        <tr>
          <td background="images/left_barbk.gif"><table width="78%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="bottom" class="login_text"><center>
                    <?php
						include "online_mems.php";
					?>
                </center></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td><img src="images/index_25.gif" width="133" height="5"></td>
        </tr>
      </table>
      <br>
      <table width="133" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="box_hd" height="23">:: Total</td>
      </tr>
        <tr> 
          <td background="images/left_barbk.gif"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="login_sm_text">
              <tr> 
                <td width="48%" valign="middle">Members<br>
                </td>
                <td width="52%">: 
				<? 
				  include "include/db.php"; 
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
                <td>:&nbsp;<? include "online.php";?></td>
              </tr>
            </table>
            <span class="login_sm_text"></span></td>
        </tr>
        <tr> 
          <td><img src="images/index_25.gif" width="133" height="5"></td>
        </tr>
      </table>
    </td>
    <td width="512" valign="top" class="text">
      <?php
	  if($PageID == "View_Profile") {
	  	// To Show Member's Name in Member/View Profie Title
	  	include "include/db.php";
	  	$query = "Select * from tbl_members where id = $id";
		$result = mysql_query($query);
		$show = mysql_fetch_array($result);
		}

	  	function TitleTable() {
			global $PageID;
			global $query;
			global $result;
			global $show;
			echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
					<tr> 
					  <td background=\"images/icons/bk1.gif\"><NOBR>"; 
						include "include/pagetitle.php";
					  echo "</NOBR>
					  </td>
					  <td width=\"22\"><img src=\"images/icons/bk2.gif\" width=\"22\" height=\"21\"></td>
					  <td width=\"100%\" background=\"images/icons/bk3.gif\">&nbsp;</td>
					</tr>
				  </table>";
			return;		
		}
	   
	  	if ($PageID == "Introduction_BIM" || $PageID == "Introduction_NCCS" || $PageID == "Aims_Objectives" || $PageID == "SiteTeam" || $PageID == "Articles" || $PageID == "Downloads"  || $PageID == "Contact_Us") {
			TitleTable();
			//echo "<br>";
			include "contents/". $PageID .".php";
		}
		else {
			include "home.php";
		}	  
	  ?>
    </td>
    <td width="133" valign="top"><table width="133" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="box_hd" height="23">:: Events</td>
      </tr>
        <tr> 
          <td background="images/right_barbk.gif"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td valign="bottom" class="login_sm_text"> 
                  <?php
						 include "events.php";
					?>
                </td>
              </tr>
            </table></td>
        </tr>
      </table><br>
	  <table width="133" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="box_hd" height="23">:: Notice </td>
      </tr>
        <tr> 
          <td background="images/right_barbk.gif"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td valign="bottom" class="login_sm_text"> 
                  <?php
						 include "notice.php";
					?>
                </td>
              </tr>
			  <?
			  	if ($ToTNoT == 0) {
					?>
						<tr>
			  				<td><img src="images/index_25.gif" width="133" height="5"></td>
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
	include "include/footer.inc";
?>
</body>
</html>