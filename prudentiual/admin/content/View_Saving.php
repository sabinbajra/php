<?
include ("../include/db.php");
	$query = "select * from tbl_savings where saving_id=$_GET[id]";
	$result = mysql_query($query);
	$mgmt = mysql_fetch_array($result);
	?>
	
	
	
	<table width="100%" border="0" class="table">
	  <tr>
	<td align=right><label><a href="?adminID=viewsaving&amp;Edit=Edit_Saving&id=<?= $_GET['id'] ?>">Edit</a></label>
		  <label>
		  <input type="submit" name="Submit2" value="Back"  onClick = "javascript: history.back()" class="search_box1"/>
		</label></td>
	  </tr>
	</table>
	<br>
	<?
	
	
	if($_GET['id'] == '2')
	{
	?>
	<SPAN class="title">
		<?php echo $mgmt['Type']; ?><BR>
		</SPAN>
		
		<HR class="page-splits">
			<table width="100%" border="0">
			  <tr>
				<td align="justify"><div align="justify">
	 
			<?php echo $mgmt['Description']; ?>
			</div>
	  
	  <!--This provide the image-->
	  <!-- </td>
		<td valign="top"><img src="image/pics.jpg" alt="PSBL.com.np" width="215" height="128">&nbsp;</td>
	  </tr>
	  -->
	
		</table>
	
	
			<br /><BR>
			<SPAN class="subtitle">
			The saving descripton can be listed as:<BR>
			</SPAN>
	
		
	<center><br>
<table width="80%" border="0" class="table">
  <tr>
    <td rowspan="2"><div align="center">Duraiton</div></td>
    <td colspan="4" bgcolor="#d1dad0"><div align="center">Interest Rate </div></td>
  </tr>
  
  <tr>
    <td bgcolor="#d1dada"><div align="center">Monthly</div></td>
    <td bgcolor="#d1dada"><div align="center">Semi-Annualy</div></td>
    <td bgcolor="#d1dada"><div align="center">Annualy</div></td>
    <td bgcolor="#d1dada"><div align="center">Cummulatiive</div></td>
  </tr>
  
  <?
   $query="SELECT * from tbl_fixed_deposit";
					$result=mysql_query($query); //run the query
  
  while($row = mysql_fetch_array($result))
  {
  ?>
  
  <tr>
    <td align="center"><?= $row['duration'] ?>&nbsp;</td>
	<td align="center"><?= $row['monthlyIR'] ?>%&nbsp;</td>
	<td align="center"><?= $row['semiyearlyIR'] ?>%&nbsp;</td>
	<td align="center"><?= $row['yearly'] ?>%&nbsp;</td>
	<td align="center"><?= $row['cummulative'] ?>%&nbsp;</td>
  </tr>
  


<?

}//end of while
echo "</table></center>";

}//end of if(get_id==2)

	
	
	
		else
		{
		?>
		
		<SPAN class="title">
		<?php echo $mgmt['Type']; ?><BR>
		</SPAN>
	
	
	
			<HR class="page-splits">
			<table width="100%" border="0">
			  <tr>
				<td align="justify"><div align="justify">
	 
			<?php echo $mgmt['Description']; ?>
			</div>
	  
	  <!--This provide the image-->
	  <!-- </td>
		<td valign="top"><img src="image/pics.jpg" alt="PSBL.com.np" width="215" height="128">&nbsp;</td>
	  </tr>
	  -->
	
		</table>
	
	
			<br /><BR>
			<SPAN class="subtitle">
			The saving descripton can be listed as:<BR>
			</SPAN>
	
		<?
			if($_GET['id'] == '1')
			{
			include "../contents/SavingDeposit.php";
			}
			
			if($_GET['id'] == '3')
			{
			include "../contents/pInSaving.php";
			}
			
			if($_GET['id'] == '4')
			{
			include "../contents/pCerDeposit.php";
			}
			
			if($_GET['id'] == '5')
			{
			include "../contents/calldeposit.php";
			}
			
			if($_GET['id'] == '6')
			{
			//include "../contents/previlege.php";
			}
			
			if($_GET['id'] == '7')
			{
			//include "../contents/premiere.php";
			}
			
			
			
			
			
			
		}
	?>
	<br>
									<table width="100%" border="0" class="table">
	  <tr>
		<td align="right"><label>
		  <a href="?adminID=viewservice&amp;edit=<? echo $view; ?>">Edit</a>    </label>
		  <label>
		  <input type="submit" name="Submit2" value="Back"  onClick = "javascript: history.back()" class="search_box1"/>
		</label></td>
	  </tr>
	</table>