<?
if($Inc == "Add")
		{
		include ("include/db.php");
		echo "<span class=\"text\">Upload Status...</span>";
         
		 $amount = (int)$_POST['amt'];
		 $id = (int)$_POST['heading'];
		 
		
		 
		 $add = @mysql_query("INSERT INTO tbl_income(year,month,date,voucher_no,inc_head_id,amount,memno) VALUES (
		'$_POST[dateY]',
		'$_POST[dateM]',
		'$_POST[dateD]',
		'$_POST[voucher]',
		$id,
		$amount,
		'$_POST[memno]'
		)");
		
		
		}
			?>

<center>
<table width="50%" border="0" align="center" class="table" >
  <tr>
    <td><img src="images/icons/compose.gif" />: <strong>Adding Income.</strong>&nbsp;</td>
  </tr>
  
  <tr>
    <td>					
<?
				if ($add) 
				{
				echo "<span> <font color=\"#FF0000\"><strong>Income ::</strong></font> was successfully added !!! </span><br>";
				}
					else {
							echo "<span <font color=\"#FF0000\"><strong>Income </strong></font> could not added !!! </span>";
						}
				?>
				&nbsp;
	</td>
  </tr>
  
  <tr>
    <td><div align="right"><a href="?AdminPageID=IncomeEntry&Opt=Add">ADD other</a> | <a href="?AdminPageID=ViewIncome">View</a></div></td>
  </tr>
</table>
</center>
<? 
 ?>

