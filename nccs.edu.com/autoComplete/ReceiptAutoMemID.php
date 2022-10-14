<?php

	include ("DBCon.php");

	if(!$db) {
		// Show error if we cannot connect.
		echo 'ERROR: Could not connect to the database.';
	} else {
		// Is there a posted query string?
		if(isset($_POST['MemqueryString'])) {
			$MemqueryString = $db->real_escape_string($_POST['MemqueryString']);

			// Is the string length greater than 0?

			if(strlen($MemqueryString) >0) {
				// Run the query: We use LIKE '$queryString%'
				// The percentage sign is a wild-card, in my example of countries it works like this...
				// $queryString = 'Uni';
				// Returned data = 'United States, United Kindom';

				// YOU NEED TO ALTER THE QUERY TO MATCH YOUR DATABASE.
				// eg: SELECT yourColumnName FROM yourTable WHERE yourColumnName LIKE '$queryString%' LIMIT 10

				$query = $db->query("SELECT username, firstname, middlename, lastname, auth_user FROM tbl_members WHERE username LIKE '$MemqueryString%' LIMIT 5");
				echo "<table cellpadding=0 cellspacing=0 width=508 class=text  bgcolor=#B2B2B2><tr height=22><td width=75 background=\"../images/AutoTop.gif\" bgcolor=#FEFEFE>&nbsp;&nbsp;Username |</td><td width=283 background=\"../images/AutoTop.gif\">&nbsp;Member Name</td><td width=150 background=\"../images/AutoTop.gif\">| Type</td></tr></table>";
				if($query) {
					// While there are results loop through them - fetching an Object (i like PHP5 btw!).
					while ($result = $query ->fetch_object()) {
						// Format the results, im using <li> for the list, you can change it.
						// The onClick function fills the textbox with the result.

						// YOU MUST CHANGE: $result->value to $result->your_colum
	         			echo '<li onMouseOver="style.background=\'#EFEFEF\'" onMouseOut="style.background=\'#d8d6e7\'" onClick="Memfill(\''.$result->username.'\');">'.$result->username.'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'.$result->firstname. '&nbsp;'.$result->middlename.'&nbsp;'.$result->lastname.'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'.$result->auth_user.'</li>';
	         		}
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