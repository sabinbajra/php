<?
	class clsMisc
		{
			//function to check if the username exists or not
			function IsValidUsername($USERNAME)
				{
					$strSql	=	"SELECT username FROM tbl_members WHERE username = '$USERNAME'";
					$dbSql	=	mysql_query($strSql);
					if(!$dbSql)
						die("Error: IsValidUsername()");
					
					$intTotal	=	mysql_num_rows($dbSql);
					
					if($intTotal != 0)
						return "TRUE";
					elseif($intTotal == 0)
						return "FALSE";
				}//end of function
		}//end of class
?>