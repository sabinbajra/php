<?php
require_once('../include/db.php');
                    $query="SELECT * from tbl_bod where bod_id = '$_GET[id]'";
					$result=@mysql_query($query); //run the query
					
					$row=mysql_fetch_array($result);
				


?>
		<table  align="left" >
				  <tr>
					<td colspan="3"><hr><hr><div align="center">
					 <strong>
					 <?= $row['Name'] ?></strong> 
				    </div></td>
				  </tr>
				  <tr>
					<td colspan="3"><div align="center">
					  <img src="../image/bod/<?= $row['IMG']?>" width="90px" height="109px">
				    </div></td>
				  </tr>
				  <tr>
					<td colspan="3"><div align="center">
					  <?= $row['Post'] ?>
				    </div></td>
				  </tr>
				  <tr>
					<td colspan="3"><div align="center">
					  <?= $row['electfrom'] ?>
				    </div></td>
				  </tr>
				  <tr>
					<td colspan="3"><div align="center">
					  <?= $row['Company'] //#D1e0DA?>
				    </div></td>
				  </tr>
				  <tr>
					<td><a href="?adminID=BOD&Edit=Board&id=<?= $row['bod_id'] ?>">Edit | </a></td>
				    <td><a href="?adminID=BOD&Edit=EditBODenf&BOD=Delete&id=<?= $row['bod_id'] ?>" onclick="return confirm('Are you sure to delete this User?')">Delete | </a></td>
				    <td><input type="button" value="Back<<" class="login_box"  onClick="javascript: history.back()"></td>
				  </tr>
</table>
