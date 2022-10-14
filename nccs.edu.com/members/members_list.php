<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> 
<link href="../include/bcis.css" rel="stylesheet" type="text/css">
 
		  
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<title>-: Member's List :-</title>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="628" border="0" align="left" cellpadding="3" cellspacing="0" class="table">
  <tr> 
    <td class="title">:: &nbsp;Member's List<br> 
      <?
	include ("../include/db.php");
	if(!isset($start)) $start = 0;
	$query = "SELECT * FROM tbl_members WHERE username <> '".$_SESSION["valid_user"]."' order by username ASC LIMIT " . $start . ", 20";
	$result = mysql_query($query);
	

		
	// Gives total number of members...
	$qu = "SELECT * FROM tbl_members";
	$re = mysql_query($qu);
	$count = mysql_num_rows($re);
	
	$num = mysql_num_rows($result);
	$finish = $start+$num;
	$first = $start+1;
	
	  	if ($num == 0) {
			echo "<span class=\"text\">&nbsp;&nbsp;&nbsp;&nbsp;No members added</span><p>";
		}
		else {
			if ($num == 1) {
				echo "<span class=\"text\">&nbsp;&nbsp;&nbsp;&nbsp;No. of member: $first - $finish of $count</span><p>";	
			}
			else {
				echo "<span class=\"text\">&nbsp;&nbsp;&nbsp;&nbsp;No. of members: $first - $finish of $count</span><p>";
			}
		}
		
?>
    </td>
  </tr>
  <tr>
    <td><table width="580" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
        <tr class="text"> 
          <td width="74" height="20" bgcolor="#ECECEC"><strong>&nbsp;Username</strong></td>
          <td width="231" bgcolor="#ECECEC"><strong>Name</strong> <div align="center"></div></td>
          <td width="47" bgcolor="#ECECEC"><strong>Gender</strong></td>
          <td width="81" bgcolor="#ECECEC"><div align="center"><strong>User</strong></div>  </td>
          <td bgcolor="#ECECEC"><div align="center"></div></td>
          <td bgcolor="#ECECEC">&nbsp;</td>
          <td width="45" bgcolor="#ECECEC"><strong>Profile</strong></td>
        </tr>
        <?
				while ($show = mysql_fetch_array($result)) {
					if ($alternate == "1") { 
						$color = "#FDFDF7"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; 
						$alternate = "1";
					}
		?>
        <tr  <? echo "bgcolor=$color";?> class="EE"> 
          <td> &nbsp; 
            <?=$show[username];?>
          </td>
          <td> <? echo"$show[firstname] $show[middlename] $show[lastname]";?> 
            <div align="center"> </div></td>
          <td> 
            <?
				if (empty($show[gender])) { 
					echo "[]";
				} 
				else {
					if ($show[gender]=="Male") {
						echo "<img src=\"../images/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
					}
					else if ($show[gender]=="Female"){
						echo "<img src=\"../images/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
					}
				} 
			?>
          </td>
          <td> <div align="center"> 
              <?
				if (empty($show[auth_user])) { 
					echo "None";
				} 
				else { 
					echo "$show[auth_user]";
				} 
			?>
            </div></td>
          <td width="14"> <div align="center">-&gt; </div></td>
          <td width="52"> 
            <?
			// for tbl_student for semester
			$q="SELECT * FROM tbl_students,tbl_staffs WHERE tbl_students.id = $show[id]";
			$r=mysql_query($q);
			$s=mysql_fetch_array($r);
			
			// for tbl_staff for designation
			$qq="SELECT * FROM tbl_staffs WHERE tbl_staffs.id = $show[id]"; 
			$rr=mysql_query($qq);
			$ss=mysql_fetch_array($rr);
			
				if($show[auth_user]=='Student'){
				if (empty($s[semester])) { 
					echo "None";
				} 
				else { 
					echo "$s[semester] sem";
					} 
				}
				else {
					if (empty($ss[designation])) { 
					echo "None";
					} 
					else { 
					echo "$ss[designation]";
					} 
				}
					
			?>
          </td>
          <td> <div align="center"> 
              <?
				echo "<a href=\"view_member_profile.php?id=".$show[id]."\"><img src=\"../images/icons/individual.gif\" width=\"15\" height=\"12\" border=\"0\" alt=\"View Profile of $show[username]\"></a>";
			?>
            </div></td>
        </tr>
        <?			
				} 
		  ?>
        <tr> 
          <td colspan="7"> 
            <?
		$q = "SELECT count(*) as count FROM tbl_members";
		$r = mysql_query($q);
		$row = mysql_fetch_array($r);
		$numrows = $row['count'];
	?>
            <table width="580" border="0" cellspacing="1" cellpadding="3" class="text">
              <tr> 
                <td width="300" align="left"> 
                  <?
		if($start > 0)
			echo "<a href=\"" . $PHP_SELF . "?Members=index&&start=" . ($start - 20) . "\"><img src='../images/icons/ico_prev.gif' border='0' title=\"Previous\"></a>";
	?>
                </td>
                <td width="300" align="right"> 
                  <?
		if($numrows > ($start + 20))
			echo "<a href=\"" . $PHP_SELF . "?Members=index&&start=" . ($start + 20) . "\"><img src='../images/icons/ico_nxt.gif' border='0' title=\"Next\"></a>";	
	?>
                  &nbsp;&nbsp; </td>
              </tr>
            </table></td>
        </tr>
      </table>
      <br>
    </td>
  </tr>
</table>
