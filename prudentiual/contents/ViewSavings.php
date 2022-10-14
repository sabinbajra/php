<?php

require_once('include/db.php');
                    $query="SELECT * from tbl_savings where saving_id = '$_GET[id]'" ;
					$result=@mysql_query($query); //run the query
					$row = mysql_fetch_array($result);
?>

<SPAN class="title">
<?php echo $row['Type']; ?><BR>
</SPAN>



<HR class="page-splits">
<table width="100%" border="0">
  <tr>
    <td align="justify"><div align="justify">
 
 <?php echo $row['Description']; ?>
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
echo "<center>";
include "contents/SavingDeposit.php";
echo "</center>";
}
?>




<?
if($_GET['id'] == '2')
{
?>
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

}
?>



<?
if($_GET['id'] == '3')
{
echo "<center>";
include "contents/pInSaving.php";
echo "</center>";
}
?>

<?
if($_GET['id'] == '4')
{
echo "<center>";
include "contents/pCerDeposit.php";
echo "</center>";
}
?>

<?
if($_GET['id'] == '5')
{
echo "<center>";
include "contents/calldeposit.php";
echo "</center>";
}
?>
<!-- PARAGRAPH 1 -->









<!-- PARAGRAPH 2 --><br>
<SPAN class="subtitle">
The different saving schemes are:<BR>
</SPAN>
<HR class="page-splits">
<?php

require_once('include/db.php');
                    $query="SELECT * from tbl_savings order by saving_id asc" ;
					$result=@mysql_query($query); //run the query
					
?>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=100% 
              align=center><TBODY>
			  <TR vAlign=top align=left>
                <TD height=6 width="4%"><B></B></TD>
                <TD height=6 width="72%">&nbsp;</TD>
                <TD height=6 width="2%">&nbsp;</TD>
                <TD height=6 background=main_files/stcoins.jpg rowSpan=7 
                width="22%"><div align="center"><img src="image/stcoins.jpg" alt="capital structure" width="150" height="103"></div></TD>
              </TR>
<?
//ehile loop starts
$sno=1;
while($row=mysql_fetch_array($result))
{

					if ($alternate == "1") { 
						$color = "#FDFDF7"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; 
						$alternate = "1";
					} 
?>  
              
              <TR vAlign=top align=left bgcolor="<?php echo $color; ?>">
                <TD width="4%"><?= $sno ?>.</TD>
                <TD width="72%"><div align="left">
				
				<? 
				
				if($row['saving_id'] == $_GET['id'])
				{
				echo $row['Type'];
				}
					else
					{
				
				?>
				
				<a href="?PageID=ViewSavings&id=<?=$row['saving_id']?>">
                <?= $row['Type'] ?></a>
				
				<?
				}
				?>
				</div></TD>
                
				
				<TD width="2%"><br>
			    <br></TD>
              </TR>
			  
			  
<?
$sno++;
}//while loop ends
?>			  
  
            
              <TR vAlign=top align=left >
                <TD height=2 width="4%">&nbsp;</TD>
                <TD height=2 width="72%">&nbsp;</TD>
                <TD height=2 
        width="2%">&nbsp;</TD>
              </TR></TBODY></TABLE>
		
		


<!-- PARAGRAPH 2 -->


<br>
<HR class="page-splits">






