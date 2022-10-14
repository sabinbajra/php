<table width="100%" border="0">
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr bgcolor="#d1dada">
    <td colspan="5" valign="top">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="6%">&nbsp;</td>
    <td colspan="2" valign="top" >
	
	<?php

					require_once('../include/db.php');
                    $query="SELECT * from tbl_savings order by saving_id asc" ;
					$result=@mysql_query($query); //run the query
					echo "<table><tr><td colspan=2><strong>Deposit Collection</strong></td><td>";
					?>
					
					
					<a href="?adminID=viewservice&view=savin">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a> 
	
					<a href="?adminID=viewservice&edit=savin">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a> 
					</td></tr>
					<?
					while($row = mysql_fetch_array($result))
					{
					echo "<tr><td>";
					echo $row['Type']."</td><td>";
					?>
	<a href="?adminID=viewsaving&view=View_Savings&id=<?= $row['saving_id'] ?>">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a> 
    
	<a href="?adminID=viewsaving&Edit=Edit_Saving&id=<?= $row['saving_id'] ?>">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a> 
	
	
	
	<a href="?adminID=viewsaving&Edit=EditSaving&Save=Delete&id=<?= $row['saving_id'] ?>">
	<img src="images/ico_delete.gif" width="19" height="19" border="0" title="Delete the record!" onclick="return confirm('Are you sure to delete this User?')"></a>					</td></tr>
					<?
					
					}
					?>
					</table>
					
					</td>
    <td colspan="2" valign="top" width="40%">
	<?php

					
                    $query="SELECT * from tbl_loan order by loan_id asc" ;
					$result=@mysql_query($query); //run the query
					?>
					<TABLE>
					<tr><td colspan="2"><strong>Loans And Advances</strong></td>
					<td>
					<a href="?adminID=viewservice&view=Lon">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a> 
	
					<a href="?adminID=viewservice&edit=Lon">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a> 
					</td></tr>
					
					<?
					while($row = mysql_fetch_array($result))
					{
					echo "<TR><td>";
					echo $row['Name'];
					echo "</td><td>";
					?>
					<a href="?adminID=BOD&Edit=Viewbod&id=<?= $bod['bod_id'] ?>">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a> 
    
	<a href="?adminID=BOD&Edit=Board&id=<?= $bod['bod_id'] ?>">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a> 
	
	<a href="?adminID=BOD&Edit=EditBODenf&BOD=Delete&id=<?= $bod['bod_id'] ?>">
	<img src="images/ico_delete.gif" width="19" height="19" border="0" title="Delete the record!" onclick="return confirm('Are you sure to delete this User?')"></a>
					
					<?
					echo "</td></tr>";
					}
					
?>	</TABLE>
</td>
  </tr>
  <tr bgcolor="#d1dada">
    <td colspan="5" valign="top">&nbsp;</td>
  </tr>
  
  <tr >
    <td rowspan="2" valign="top">&nbsp;</td>
    <td colspan="1" ><strong>Consortium Loan Through Negotiations </strong><td><a href="?adminID=viewservice&view=consortium">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a> 
	
					<a href="?adminID=viewservice&edit=consortium">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a> </td></td>
    <td colspan="1"><strong>Share Loan </strong><td><a href="?adminID=viewservice&view=share">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a> 
	
					<a href="?adminID=viewservice&edit=share">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a> </td></td>
  </tr>
  
  
  <tr >
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr bgcolor="#d1dada">
    <td colspan="5" valign="top">&nbsp;</td>
  </tr>
  <tr >
    <td rowspan="2" valign="top">&nbsp;</td>
    <td colspan="1"><strong>Issue Of Bank Gurantee</strong><td><a href="?adminID=viewservice&view=bankgurantee">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a> 
	
					<a href="?adminID=viewservice&edit=bankgurantee">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a> </td></td>
    <td colspan="1"><strong>Merchant Banking</strong><td><a href="?adminID=viewservice&view=merchant">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a> 
	
					<a href="?adminID=viewservice&edit=merchant">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a> </td></td>
  </tr>
  
  
  <tr >
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#d1dada">
    <td colspan="5" valign="top">&nbsp;</td>
  </tr>
  
  <tr >
    <td rowspan="2" valign="top">&nbsp;</td>
    <td colspan="1"><strong>Additional Services as per client requiredments </strong><td><a href="?adminID=viewservice&view=additional">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a> 
	
					<a href="?adminID=viewservice&edit=additional">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a> </td></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  
  <tr >
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
</table>
