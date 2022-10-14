
<?php
require_once('include/db.php');
                    $query="SELECT * from tbl_bod where post = 'Chairman'" ;
					$result=@mysql_query($query); //run the query
					$row=mysql_fetch_array($result);
?>
				
<?
//variabel for 3 row count
$count = 0;
?>
<SPAN class="title">
The board of Directors:<BR>
</SPAN><BR><BR>




<HR class="page-splits">
<table width="100%" border="0">
  <tr>
    <td align="justify"><div align="justify">
  The Promoters of Prudential Bittiya Sanstha Ltd. are bankers, industrialists, businessmen and economists. The names of the present promoters are as follows:
   </div></td>
   
   <!--  <td valign="top"><img src="image/pics.jpg" alt="PSBL.com.np" width="215" height="128">&nbsp;</td> -->
  </tr>
</table>
<?


	
				
				
				
				
			if($row)//if1
			{
			
?>
				<table  align="center" >
				  <tr>
					<td><hr><hr><div align="center">
					 <strong>
					 <?= $row['Name'] ?></strong> 
				    </div></td>
				  </tr>
				  <tr>
					<td w><div align="center">
					  <img width="90px" height="109px" src="image/bod/<?= $row['IMG']?>"  >
				    </div></td>
				  </tr>
				  <tr>
					<td><div align="center">
					  <?= $row['Post'] ?>
				    </div></td>
				  </tr>
				  <tr>
					<td><div align="center">
					  <?= $row['electfrom'] ?>
				    </div></td>
				  </tr>
				  <tr>
					<td><div align="center">
					  <?= $row['Company'] //#D1e0DA?>
				    </div></td>
				  </tr>
</table>
		<HR class="page-splits">

<?				
			}	//end of if($row)


					$query="SELECT * from tbl_bod where post!= 'Chairman'" ;
					$result=@mysql_query($query); //run the query
					$row=mysql_fetch_array($result);
					$n = mysql_num_rows($result);
	
				$count = 3;
				
echo "<table  width=100% align=centre bgcolor=#D1DADA cellspacing=15>";

for($ro = 0;$ro < $n;$ro++)
{
$img = "";
//$name = $row['Name'];
//$post = $row['Post'];
//$comp = $row['Company']; 

if($ro % $count == 0) 
	  {
			echo "<TR>";
	  }
	  							echo "<td align=centre width=33%><hr>
									<table  align=centre width=100% >
									  
									  <tr>
										<td width=33%><div align=center>
										  <img src=image/bod/$row[IMG]>
										</div></td>
									  </tr><tr>
										<td width=33%><div align=center><strong>$row[Name]</strong></div></td>
									  </tr>
									  <tr>
										<td width=33%><div align=center>$row[Post]</div></td>
									  </tr>
									  <tr>
										<td width=33%><div align=center>$row[Company]</div></td>
									  </tr>
									  <tr>
										<td width=33%><div align=center>$row[From]</div></td>
									  </tr><hr>
									</table>
								</td>";
								
if(($ro % $count) == ($count-1) || ($ro+1) == $n)
		{
		echo "</TR>";
		}
  $row=mysql_fetch_array($result);
	  
}//end of for
					
echo "</table>";			
?>
<HR class="page-splits" >