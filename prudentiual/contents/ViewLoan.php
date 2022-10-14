<?php

require_once('include/db.php');
                    $query="SELECT * from tbl_loan where loan_id = '$_GET[id]'" ;
					$result=@mysql_query($query); //run the query
					$row = mysql_fetch_array($result);
?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>


<SPAN class="title">
<?php echo $row['Name']; ?><BR>
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
The <?php echo $row['Name']; ?> descripton can be listed as:<BR>
</SPAN><HR class="page-splits">

<?
$query="SELECT * from tbl_loan_services where loan_id = '$_GET[id]'" ;
					$result=@mysql_query($query); //run the query
					

?>
<table width="100%" border="0" class="table">
  <tr bgcolor="#d1dada">
    <td width="5%">&nbsp;</td>
    <td width="81%">Loan For </td>
    <td width="14%"><div align="center">Interest Rate </div></td>
  </tr>
  <?
  $sn = 1;
  while ($row = mysql_fetch_array($result))
  {
  echo mysql_error();
  ?>
  <tr>
    <td><?php echo $sn; ?>&nbsp;</td>
    <td><?php echo $row['description']; ?>&nbsp;</td>
    <td align="center"><?php echo $row['rate']; ?>%</td>
  </tr>
  <?
  $sn++;
  }
  ?>
  <tr>
    <td valign="top">&nbsp;</td>
    <td align="justify">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td valign="top"><span class="style1">Note:</span> </td>
    <td align="justify">

 Interest Rates on loans are payable on monthly basis. 
 <br />
 Interest Rates on loans are payable at a diminishing basis on the ramaining balance .  
&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>
<HR class="page-splits">


<SPAN class="subtitle">
The different saving schemes are:<BR>
</SPAN>
<HR class="page-splits">
<?php

require_once('include/db.php');
                    $query="SELECT * from tbl_loan order by loan_id asc" ;
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
				
				if($row['loan_id'] == $_GET['id'])
				{
				echo $row['Name'];
				}
					else
					{
				
				?>
				
				<a href="?PageID=ViewLoan&id=<?=$row['loan_id']?>">
                <?= $row['Name'] ?></a>
				
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




