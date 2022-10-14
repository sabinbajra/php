<SPAN class="title">
Management Team:<BR>
</SPAN>


<BR><BR>



<HR class="page-splits">
<table width="100%" border="0">
  <tr>
    <td align="justify"><div align="justify">
  The Management Team of Prudential Bittiya Sanstha Ltd is a small family of friendly, studious, loyal and responsible professionals working under the able leadership and guidance of the C.E.O. in conjunction with the Chairman of the Board of Directors to run the insitution competently.The institution has been imparting services to customers in a timely, efficient and transparent manner in just a short time of its inception.
   </div></td>
    <td valign="top"><img src="image/pics.jpg" alt="PSBL.com.np" width="215" height="128">&nbsp;</td>
  </tr>
</table>



<!-- PARAGRAPH 1 -->









<!-- PARAGRAPH 2 --><br>
<SPAN class="subtitle">
The Management Team considered of the following members:<BR>
</SPAN>
<HR class="page-splits">
<?php

require_once('include/db.php');
                    $query="SELECT * from tbl_mgmt" ;
					$result=@mysql_query($query); //run the query
					
?>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=100% 
              align=center><TBODY>
			  <TR vAlign=top align=left>
                <TD height=6 width="4%"><B></B></TD>
                <TD height=6 width="31%"><strong>Name</strong></TD>
                <TD height=6 width="43%"><strong>Post</strong></TD>
                <TD height=6 background=main_files/stcoins.jpg rowSpan=7 
                width="22%"><div align="center"><img src="image/stcoins.jpg" alt="capital structure" width="150" height="103"></div></TD>
              </TR>
			  <tr>
			  <td></td>
			  <td></td>
			  <td></td>
			  </tr>
<?
//ehile loop starts
$sno=1;
while($row=mysql_fetch_array($result))
{
?>  
              
              <TR vAlign=top align=left>
                <TD width="4%"><?= $sno ?>.</TD>
                <TD width="31%"><div align="left"><?= $row['Name'] ?></div></TD>
                <TD width="43%"><div align="left"><?= $row['Post'] ?></div></TD>
              </TR>
<?
$sno++;
}//while loop ends
?>			  
              
              <TR vAlign=top align=left>
                <TD height=2 width="4%">&nbsp;</TD>
                <TD height=2 width="31%">&nbsp;</TD>
                <TD height=2 
        width="43%">&nbsp;</TD></TR></TBODY></TABLE>
		
		


<!-- PARAGRAPH 2 -->


<br>
<HR class="page-splits">






