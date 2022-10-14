<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> 
		  
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<?

	include ("../include/db.php");
	// Gives total number of Teacher...	
	$QTeacher = "SELECT * FROM teacher";
	$RTeacher = mysql_query($QTeacher);
	$CountTeacher = mysql_num_rows($RTeacher);	

	// Gives total number of Student...	
	$QStudent = "SELECT * FROM student_profile";
	$RStudent = mysql_query($QStudent);
	$CountStudent = mysql_num_rows($RStudent);

	// Gives total number of Staff...	
	$QStaff = "SELECT * FROM staff";
	$RStaff = mysql_query($QStaff);
	$CountStaff = mysql_num_rows($RStaff);
?>
<table width="770" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td class="title"><img src="directory/icons/fore.jpg" width="15" height="15"> 
      Search 
      <hr size="1"></td>
  </tr>
</table><br>
<table width="765" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td><table width="750" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
        <tr> 
          <td width="500"><form name="form1" method="post" action="../profiles/?pageID=Search&SearchBY=SearchEnf">
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr> 
                  <td><input name="searchstring" type="text" class="search_box1" id="searchstring" value="Name" size="30" maxlength="30"> 
                    <select name="searchcat" class="search_box1">
                      <option selected>Search...</option>
                      <option value="Student">Student</option>
                      <option value="Teacher">Teacher</option>
                      <option value="Staff">Staff</option>
                    </select> <select name="searchtype" class="search_box1">
                      <option selected>Search by...</option>
                      <option value="firstname">Firstname</option>
                      <option value="lastname">Lastname</option>
                    </select> <input type="submit" name="Submit" value="Submit" class="search_box1"> 
                  </td>
                </tr>
              </table>
            </form></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>
      <?
		  	if ($SearchBY == "SearchEnf") {
				include "$SearchBY.php";
			}
		  ?>
    </td>
  </tr>
</table>
