<?
	//===============================================================================
	include ("../include/db.php");
	$s_date= date("F j, Y");
	
	echo "<br>";
	// Posted Data ref or not.
	$bk_type = $_POST['bk_type'];
	if ($bk_type == "Reference Book") {
		$bk_type = 1;		
	}
	else {
		$bk_type = 0;
	}
	// Add Book
	if ($Book == "Add") {
		$cd_no = trim($_POST['cd_no']);
		$bk_name = trim($_POST['bk_name']);
		$bk_author = trim($_POST['bk_author']);
		$bk_publisher = trim($_POST['bk_publisher']);
		$bk_qty = $_POST['qty'];
		$bk_grade = $_POST['grade'];
		$image = trim($_POST['image']);
		

		$query = "INSERT INTO tbl_lib_book (grade,code_no, bk_name, bk_author, bk_publisher, add_date, ref_yn,qty,img,bk_out_qty) VALUES ('$bk_grade','$cd_no', '$bk_name', '$bk_author', '$bk_publisher', '$s_date', '$bk_type','$bk_qty','0','$image')"; 
		$result = mysql_query($query);
		if ($result) {
			echo "<span class=\"text\">Code No.: <font color=\"#FF0000\"><strong>".$cd_no ."</strong></font><br>Book: <font color=\"#FF0000\"><strong>" . $bk_name . "</strong></font><br>Author: <font color=\"#FF0000\"><strong>" . $bk_author . "</strong></font><br>has been added in the Database successfully!</span><br>";
			echo "<hr size=\"1\" color=\"#624a7e\">Add again!";
			include "BookAdd.php";
		}
		else {
			echo "<span class=\"text\">Code No: <font color=\"#FF0000\"><strong>".$cd_no."</strong></font> has been already in the Database!!! </span>";
			echo "<hr size=\"1\" color=\"#624a7e\">Try again!";
			include "BookAdd.php";
		}
	}
	
	// Modify Book
	if ($Book == "Modify") {
		$id = $_POST['id'];
		$cd_no = trim($_POST['cd_no']);
		$bk_name = trim($_POST['bk_name']);
		$bk_author = trim($_POST['bk_author']);
		$bk_publisher = trim($_POST['bk_publisher']);
		$bk_qty = $_POST['qty'];
		$bk_grade = $_POST['grade'];
		$image = trim($_POST['image']);
		//$query = "INSERT INTO tbl_lib_book (grade,code_no, bk_name, bk_author, bk_publisher, add_date, ref_yn,qty,img,bk_out_qty) VALUES ('$bk_grade','$cd_no', '$bk_name', '$bk_author', '$bk_publisher', '$s_date', '$bk_type','$bk_qty','0','$image')"; 
		$query = "UPDATE tbl_lib_book SET code_no='$cd_no', bk_name='$bk_name', bk_author='$bk_author',bk_publisher='$bk_publisher',ref_yn='$bk_type',qty='$bk_qty',grade='$bk_grade',img='$image' WHERE bk_id='$id'"; 
		$result = mysql_query($query);
		if ($result) {
			echo "<span class=\"text\">Code No.: <font color=\"#FF0000\"><strong>".$cd_no ."</strong></font><br>Book: <font color=\"#FF0000\"><strong>" . $bk_name . "</strong></font><br>Author: <font color=\"#FF0000\"><strong>" . $bk_author . "</strong></font><br>has been Modified in the Database successfully!</span><br>";
			echo "<br><center><input name=\"Submit\" type=\"button\" value=\"Ok!\" onClick=\"window.location='?MemberPageID=BookList&sortby=bk_name'\" class=\"text_box\"/></center>";
			//header("Location: member.php?MemberPageID=BookList");
		}
		else {
			echo "<span class=\"text\">Couldn't modify! </span>";
			echo "<hr size=\"1\" color=\"#624a7e\">Try again!";
			include "BookModify.php";
		}
	}
	
	// Delete Book
	if ($Book == "Delete") {
		$id = $_GET['id'];
		
		$ConfQ = "Select * FROM tbl_lib_book WHERE bk_id = $id";
		$ConfR = mysql_query($ConfQ);
		$ConfS = mysql_fetch_array($ConfR);
				
		//Now Delete
		$query = "DELETE FROM tbl_lib_book WHERE bk_id = '$id'";
		$result = mysql_query($query);
		if ($result) {
			echo "<span class=\"text\">Code No.: <font color=\"#FF0000\"><strong>".$ConfS['code_no'] ."</strong></font><br>Book: <font color=\"#FF0000\"><strong>" . $ConfS['bk_name'] . "</strong></font><br>Author: <font color=\"#FF0000\"><strong>" . $ConfS['bk_author'] . "</strong></font><br>has been Deleted from the Database successfully!</span><br>";
			echo "<br><center><input name=\"Submit\" type=\"button\" value=\"Ok!\" onClick=\"window.location='?MemberPageID=BookList&sortby=bk_name'\" class=\"text_box\"/></center>";
		} 
		else {
			echo "<script> alert('Error: Events could not Delete')</script>";
		}
	}
	
	// Issue Book
	if ($Book == "Issue" || $Book == "Receipt") {
		$cd_no = trim($_POST['cd_no']);
		$mem_user = trim($_POST['mem_user']);
		
		//echo "Code No - $cd_no & Mem - $mem_user";
	
		// check for valid book code
		$CheckBCodeQ = "SELECT * FROM tbl_lib_book WHERE code_no = '$cd_no'";
		$CheckBCodeR = mysql_query($CheckBCodeQ);
		$CheckBCodeS = mysql_fetch_array($CheckBCodeR);
		
		 // check for valid username
		$CheckUNameQ = "SELECT * from tbl_members WHERE username = '$mem_user'";
		$CheckUNameR = mysql_query($CheckUNameQ);
		$CheckUNameS = mysql_fetch_array($CheckUNameR);	

		$bk_name = $CheckBCodeS["bk_name"];
		$bk_author = $CheckBCodeS["bk_author"];
		$mem_name = $CheckUNameS["firstname"] . " " . $CheckUNameS["middlename"] . " " . $CheckUNameS["lastname"];
		
		//Get current date.		
		$IssueDate = date("l, F jS Y");
		//Get submission date.
		$Sub = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
		$SubDate = date("l, F jS Y", $Sub);
		// First check Entry Validation
		if (($cd_no == $CheckBCodeS["code_no"]) && ($mem_user == $CheckUNameS["username"])) {
			//echo $CheckBCodeS["code_no"] . " " . $CheckUNameS["username"] . " ID = " . $CheckUNameS["id"];
			// if not error entry...
			
			// Entry for Issue.
			$Check_bk="select * from tbl_lib_book where code_no='$cd_no'";
			$Show_bk=mysql_fetch_array(mysql_query($Check_bk));
			if($Show_bk['qty']!=$Show_bk['bk_out_qty']){
			if ($Book == "Issue") {
				//$inout = 1;
				$uid = $CheckUNameS["username"];
				$query="INSERT INTO tbl_book_detail (bk_id,mem_id,issue_date,receipt_date)values('$cd_no','$uid','$IssueDate','$SubDate')";
				//$query = "UPDATE tbl_lib_book SET issue_date='$IssueDate', receipt_date='$SubDate', in_out='$inout', mem_id='$uid' WHERE code_no='$cd_no'"; 
				$result = mysql_query($query);
				if ($result) {
					$q1="select * from tbl_lib_book where code_no='$cd_no'";
					$r=mysql_query($q1);
					$s=mysql_fetch_array($r);
					
					$num=$s['bk_out_qty'];
					$num=$num+1;
					$q2="UPDATE tbl_lib_book SET bk_out_qty='$num' where code_no='$cd_no'";
					$r2=mysql_query($q2);
					echo "<span class=\"text\">Code No.: <font color=\"#FF0000\"><strong>".$cd_no ."</strong></font><br>Book: <font color=\"#FF0000\"><strong>" . $bk_name . "</strong></font><br>Author: <font color=\"#FF0000\"><strong>" . $bk_author . "</strong></font><br>has been Issued to:<br>Member ID: $mem_user<br>Name: $mem_name</span><br>";
					echo "<br><center><input name=\"Submit\" type=\"button\" value=\"Ok!\" onClick=\"window.location='?MemberPageID=BookList&sortby=bk_name'\" class=\"text_box\"/></center>";
					//header("Location: member.php?MemberPageID=BookList");
				}
				else {
					echo "<span class=\"text\">Issue unsuccess! </span>";
					echo "<hr size=\"1\" color=\"#624a7e\">Try again!";
					include "BookIssue.php";
				}			
			
			}
			else
				echo"All Books Are In Use...";
			}// Entry for Receipt.	
			if ($Book == "Receipt") {
				//$inout = 0;
				$cd_no = $_POST['cd_no'];
				$uid = $_POST['mem_user'];
				//$query = "UPDATE tbl_book_detail SET issue_date='', receipt_date='', in_out='$inout', mem_id='$uid' WHERE code_no='$cd_no'"; 
				$query="Delete from tbl_book_detail where mem_id='$uid' AND bk_id='$cd_no'"; 
				$result = mysql_query($query);
				if ($result) {
					
					$q1="select bk_out_qty from tbl_lib_book where code_no='$cd_no'";
					$r1=mysql_query($q1);
					$s1=mysql_fetch_array($r1);
					
					$bk_no_out=$s1['bk_out_qty'];
					$bk_no_out=$bk_no_out-1;
					
					$q2="update tbl_lib_book set bk_out_qty='$bk_no_out' where code_no='$cd_no'";
					$r2=mysql_query($q2);
					echo "<span class=\"text\">Code No.: <font color=\"#FF0000\"><strong>".$cd_no ."</strong></font><br>Book: <font color=\"#FF0000\"><strong>" . $bk_name . "</strong></font><br>Author: <font color=\"#FF0000\"><strong>" . $bk_author . "</strong></font><br>has been Receipt from:<br>Member ID: $mem_user<br>Name: $mem_name</span><br>";
					echo "<br><center><input name=\"Submit\" type=\"button\" value=\"Ok!\" onClick=\"window.location='?MemberPageID=BookList&sortby=bk_name'\" class=\"text_box\"/></center>";
					//header("Location: member.php?MemberPageID=BookList");
				}
				else {
					echo "<span class=\"text\">Receipt unsuccess! </span>";
					echo "<hr size=\"1\" color=\"#624a7e\">Try again!";
					include "BookReceipt.php";
				}			
			}		
		
		}// if error!
		else {
			echo "<font color=\"#FF0000\">Please Check your entry</font><br>";
			if ($Book == "Issue") {
				include "BookIssue.php";
			}
			else {
				include "BookReceipt.php";
			}
		}
	}
	
	//===============================================================================
?>