<?php

	include ("DBCon.php");

	if(!$db) {
		// Show error if we cannot connect.
		echo 'ERROR: Could not connect to the database.';
	} else {
		// Is there a posted query string?
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);

			// Is the string length greater than 0?

			if(strlen($queryString) >0) {
				// Run the query: We use LIKE '$queryString%'
				// The percentage sign is a wild-card, in my example of countries it works like this...
				// $queryString = 'Uni';
				// Returned data = 'United States, United Kindom';

				// YOU NEED TO ALTER THE QUERY TO MATCH YOUR DATABASE.
				// eg: SELECT yourColumnName FROM yourTable WHERE yourColumnName LIKE '$queryString%' LIMIT 10

				$query = $db->query("SELECT tbl_students.reg_no, tbl_students.year_batch, tbl_students.semester, tbl_students.id, tbl_members.firstname, tbl_members.middlename, tbl_members.lastname, tbl_members.gender FROM tbl_students, tbl_members WHERE reg_no LIKE '$queryString%' AND tbl_students.id=tbl_members.id LIMIT 5");
				if($query) {
					echo "<table cellpadding=0 cellspacing=0 width=608 class=text  bgcolor=#d8d6e7><tr height=22><td width=120 background=\"../images/AutoTop.gif\" bgcolor=#FEFEFE>&nbsp;&nbsp;Registration</td><td width=258 background=\"../images/AutoTop.gif\">Name</td><td width=50 background=\"../images/AutoTop.gif\">Gender</td><td width=100 background=\"../images/AutoTop.gif\"><center>Year/Batch</center></td><td width=80 background=\"../images/AutoTop.gif\"><center>Semester</center></td></tr>";
					// While there are results loop through them - fetching an Object (i like PHP5 btw!).
					while ($result = $query ->fetch_object()) {
	         			echo '<tr style="cursor:pointer" onMouseOver="style.background=\'#EFEFEF\'" onMouseOut="style.background=\'#d8d6e7\'" onClick="fill(\''.$result->reg_no.'\'),Semfill(\''.$result->semester.'\');"><td>&nbsp;'.$result->reg_no.'</td><td>'.$result->firstname.'&nbsp;'.$result->middlename.'&nbsp;'.$result->lastname.'</td><td><center>'.$result->gender.'</center></td><td><center>'.$result->year_batch.'</center></td><td><center>'.$result->semester.'</center></td></tr>';
	         		}
					echo "</table>";
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				// Dont do anything.
			} // There is a queryString.
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>