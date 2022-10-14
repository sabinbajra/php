<?
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_lib_book WHERE code_no='".$_GET['id']."'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
	
?>
<title><? echo $show["code_no"]." ".$show["bk_name"];?></title>

<link href="../include/bcis.css" rel="stylesheet" type="text/css">
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="600" border="0" cellspacing="0" cellpadding="2" class="sd_tbl">
  <tr>
    <td width="15%" class="text">Code No </td>
    <td width="2%" class="text">:</td>
    <td width="83%" class="text"><strong><?=$show[code_no];?></strong></td>
  </tr>
  <tr>
    <td class="text">Name </td>
    <td class="text">:</td>
    <td class="text"><strong><?=$show[bk_name];?></strong></td>
  </tr>
  <tr>
    <td class="text">Author </td>
    <td class="text">:</td>
    <td class="text"><strong><?=$show[bk_author];?></strong></td>
  </tr>
  <tr>
    <td class="text">Publisher </td>
    <td class="text">:</td>
    <td class="text"><?=$show[bk_publisher];?></td>
  </tr>
  <tr>
    <td class="text">Book Added on </td>
    <td class="text">:</td>
    <td class="text"><?=$show[add_date];?></td>
  </tr>
  <?
	// if ref. book
	if ($show['ref_yn'] == 1) {
		$showbk_typ = "Reference Book";
	}
	else {
		$showbk_typ = "Issue Book";
	}		
  ?>
  <tr>
    <td class="text">Book Type</td>
    <td class="text">:</td>
    <td class="text"><?=$showbk_typ;?></td>
  </tr>
  <tr>
    <td class="text" valign="top">In/Out </td>
    <td class="text" valign="top">:</td>
    <td class="text">
	<?
		
		if ($show["bk_out_qty"] >= 0) {
		$total=$show[qty]-$show[bk_out_qty];
			echo "Book Available: $total<br>";
		}
		if ($_SESSION["valid_auth"] == "Library") {
		if ($show['bk_out_qty'] < $show['qty']) {
			echo "Book has been borrowed By: $show[bk_out_qty] users";
			
			//if ($show["bk_out_qty"] > 0) {
		//$query1 = "SELECT * FROM tbl_book_detail,tbl_members WHERE tbl_book_detail.mem_id = tbl_members.username AND tbl_book_detail.bk_id=$show[code_no]";
		$q1="select * from tbl_book_detail where bk_id='$show[code_no]'";
		$r1 = mysql_query($q1);
		while($s1 = mysql_fetch_array($r1)){
					$query1="select * from tbl_members where username ='$s1[mem_id]'";
					$result1 = mysql_query($query1);
				
		while($show1 = mysql_fetch_array($result1)){
									//echo "<br>$show1[firstname]";
									echo"<hr size=\"3\" color=\"#624a7e\">
									Username::<strong>$show1[username]</strong>";
									echo" <br> Name: $show1[firstname] $show1[middlename] $show1[lastname]<br>"
				."Issued On: $s1[issue_date]<br>"
				."Submission: $s1[receipt_date]<br>"
				."Type: $show1[auth_user]<br>";
			if ($show1["auth_user"] == "Student") {
				$stdqry = "SELECT * FROM tbl_members,tbl_students WHERE tbl_members.id=tbl_students.id";
				$stdrslt = mysql_query($stdqry);
				$stdshow = mysql_fetch_array($stdrslt);
				echo "Grade: $stdshow[semester]<br>"
				."Year/Batch: $stdshow[year_batch]<br>"
				."Registration No.: $stdshow[reg_no]<br>";			
			}
			else {
				$stdqry = "SELECT * FROM tbl_members,tbl_staffs WHERE tbl_members.id=tbl_staffs.id";
				$stdrslt = mysql_query($stdqry);
				$stdshow = mysql_fetch_array($stdrslt);	
				echo "Designation: $stdshow[designation]<br>";
			}
				echo "<hr size=\"1\" color=\"#624a7e\">"
				."Gender: $show1[gender]<br>"
				."E-mail: <a href=\"mailto:$show1[email]\" class=\"b_lk\">$show1[email]</a><br>"
				."Phone: $show1[phone1]";
			if (!empty($show1["phone2"])) {
				echo "<br>Phone2: $showa[phone2]";
			}
			if (!empty($show1["mobile"])) {
				echo "<br>Mobile: $show1[mobile]";
			}
				echo "<br>Address: $show1[address1]<br>";
									
									}echo "<hr size=\"3\" color=\"#624a7e\">";
			}
			
		}	
		
		}		
		
	?>	</td>
  </tr>  
</table>
