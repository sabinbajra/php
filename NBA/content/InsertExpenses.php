<?
if($Inc == "Add")
		{
		include ("include/db.php");
		echo "<span class=\"text\">Upload Status...</span>";
        
		$query1="SELECT idtbl_exphead from tbl_exphead where heading = '$_POST[heading]'" ;
					$result1=@mysql_query($query1); //run the query
					$row1=mysql_fetch_array($result1);
					//echo $row1['idtbl_exphead']; 
		 
		 
		 $amount = (int)$_POST['amt'];
		 $date = (int)$_POST['dateD'];
		 
		
		 
		 $add = @mysql_query("INSERT INTO tbl_expenses(expheadid,amount,year,month,date) VALUES (
		 $row1[idtbl_exphead],
		 $amount,
		'$_POST[dateY]',
		'$_POST[dateM]',
		'$date'
		)");
		
		
		}
			?>

<center>
<table width="50%" border="0" align="center" class="table" >
  <tr>
    <td><img src="images/icons/compose.gif" />: <strong>Adding Expenses.</strong>&nbsp;</td>
  </tr>
  
  <tr>
    <td>					
<?
				if ($add) 
				{
				echo "<span> <font color=\"#FF0000\"><strong>Income ::</strong></font> was successfully added !!! </span><br>";
				}
					else {
							echo "<span <font color=\"#FF0000\"><strong>Expenditure </strong></font> could not added !!! </span>";
						}
				?>
				&nbsp;
	</td>
  </tr>
  
  <tr>
    <td><div align="right"><a href="?AdminPageID=ExpensesEntry&Opt=Add">ADD other</a> | <a href="?AdminPageID=ViewExpenses">View</a></div></td>
  </tr>
</table>
</center>
<? 
 ?>

