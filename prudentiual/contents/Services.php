
<SPAN class="title">
Prudential Services Ooffered:<BR>
</SPAN>


<BR><BR>



<HR class="page-splits">
<table width="100%" border="0">
  
  <tr>
  	<td><img src="image/sevre.gif" width="100%" />
	</td>
  </tr>
  
  <tr>
    <td align="justify">
	
	<div align="justify">
	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services 	Prudential Services  
	</div>

  </td>
   <!--<td valign="top"><img src="image/pics.jpg" alt="PSBL.com.np" width="215" height="128">&nbsp;</td>-->
  </tr>
</table>



<!-- PARAGRAPH 1 -->









<!-- PARAGRAPH 2 --><br>
<SPAN class="subtitle">
The different saving schemes are:<BR>
</SPAN>
<HR class="page-splits">
<?php

require_once('include/db.php');
                    $query="SELECT * from tbl_services" ;
					$result=@mysql_query($query); //run the query
					
?>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=100% 
              align=center><TBODY>
			  <TR vAlign=top align=left>
                <TD height=6 width="4%"><B></B></TD>
                <TD height=6 width="31%">&nbsp;</TD>
                <TD height=6 width="43%">&nbsp;</TD>
                <!--<TD height=6 background=main_files/stcoins.jpg rowSpan=7 
                width="22%"><div align="center"><img src="image/stcoins.jpg" alt="capital structure" width="150" height="103"></div></TD>-->
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
                <TD width="31%"><div align="left"><a href="?PageID=ViewServices&id=<?= $row['savin_id']?>">
                  <?= $row['save_type'] ?></a></div></TD>
                <TD width="43%"><div align="left"><?= $row['description'] ?></div><br></TD>
              </TR>
			  
			  
<?
$sno++;
}//while loop ends
?>			  
  
            
              <TR vAlign=top align=left >
                <TD height=2 width="4%">&nbsp;</TD>
                <TD height=2 width="31%">&nbsp;</TD>
                <TD height=2 
        width="43%">&nbsp;</TD></TR></TBODY></TABLE>
		
		


<!-- PARAGRAPH 2 -->


<br>
<HR class="page-splits">






