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

				//$query = $db->query("SELECT tbl_lib_book.code_no, tbl_lib_book.bk_name, tbl_lib_book.bk_author, tbl_lib_book.ref_yn, tbl_members.username FROM tbl_lib_book, tbl_members WHERE code_no LIKE '$queryString%' AND tbl_lib_book.mem_id=tbl_members.id LIMIT 5");
				$query = $db->query("SELECT * from tbl_lib_book WHERE code_no LIKE '$queryString%' LIMIT 5");
				if($query) {
					echo "<table cellpadding=0 cellspacing=0 width=508 class=text  bgcolor=#B2B2B2><tr height=22><td width=75 background=\"../images/AutoTop.gif\" bgcolor=#FEFEFE>&nbsp;&nbsp;&nbsp;Code No |</td><td width=283 background=\"../images/AutoTop.gif\">Book Name</td><td width=150 background=\"../images/AutoTop.gif\">| Author Name</td></tr></table>";
					// While there are results loop through them - fetching an Object (i like PHP5 btw!).
					while ($result = $query ->fetch_object()) {
						// Format the results, im using <li> for the list, you can change it.
						// The onClick function fills the textbox with the result.

						// YOU MUST CHANGE: $result->value to $result->your_colum
						/*if ($result->ref_yn == 1 && $result->in_out == 1) {
							//$Ico = "<img src=\"../images/icons/b_mul.gif\" width=\"9\" height=\"9\" alt=\"Reference book is in use!\"/>";
							$Title = "Reference book is using by '".$result->username."'!";
						}
						else {
							$Title = "The book is using by '".$result->username."'!";
						} 
						
						/*if ($result->in_out==1) {
							$InOut = "[O]";
						}
						else {
							$InOut = "[I]";
						}*/
	         			echo '<li onMouseOver="style.background=\'#EFEFEF\'" onMouseOut="style.background=\'#d8d6e7\'" title="'.$Title.'" onClick="Bkfill(\''.$result->code_no.'\'),Memfill(\''.$result->username.'\');">'.$result->code_no.'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'.$result->bk_name.'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'.$result->bk_author.'</li>';
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