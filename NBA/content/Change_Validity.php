<script language="javascript">
<!-- 
function form_Validator(form)
{

  if (form.memno.value == "")
  {
    alert("Please enter Membership No::");
    form.memno.focus();
	return (false);
     }
  
  return (true);
  }
  //-->
</script>


<?php 

 
 include ("include/db.php");
 				$query2="SELECT firmname from tbl_member order by firmname asc" ;
					$result2=@mysql_query($query2); //run the query
					$row2=mysql_fetch_array($result2);
					$n2 = mysql_num_rows($result2);
 ?>

<form action="?AdminPageID=Option&Opt=Change_Validity_Enf" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr>
			<td colspan="2" class="title">Renewal of Membership:
			  <hr size ="1" color="#c1cdd8"></td>
			</tr>
			<tr > 
			  <td width="134" class="text">Membership No<font color="#FF0000">::</font></td>
			  <td width="593">
                <input type="text" name="memno" value="<?=$_POST['memno'];?>" size="10" id="memno" >
</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="submit" type="submit" value="Submit" >&nbsp;&nbsp;<input type="button" name="Submit" value="Cancel" onClick="javascript: history.back()" ></td>
			</tr>
			
		  </table>
</form>
		