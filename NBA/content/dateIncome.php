 
 <?php 
 if($ViewInc == "byDate")
 {
 ?>

<form action="?AdminPageID=ViewIncome&ViewInc=byDateView" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr>
			<td colspan="2" class="title">View Income Entry
	Datewise		  
			  <hr size ="1" color="#c1cdd8"></td>
			</tr>
			<tr > 
			  <td width="134" class="text">Enter Date<font color="#FF0000">::</font></td>
			  <td width="593">B.S.
			    <input type="text" name="dateY" value="<?=$_POST['dateY'];?>" size="10" id="dateY" >
			    Month&nbsp;
			    <select name="dateM" id="dateM" >
			  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[dateM]\" selected>$_POST[dateM]</option>";
				  }
				  else {
				  
				  }
			  ?>
				  <option></option>
				  <option>Baisakh</option>
				  <option>Jestha</option> 
				  <option>Asar</option>
				  <option>Shrawan</option>
				  <option>Bhadra</option>
				  <option>Asoj</option>
				  <option>Kartik</option>
				  <option>Manghsir</option>
				  <option>Poush</option>
				  <option>Magh</option>
				  <option>Falgun</option>
				  <option>Chaitra</option>
				 
				</select> 
			    Date 
				 <select name="dateD" id="dateD" >
			  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[dateD]\" selected>$_POST[dateD]</option>";
				  }
				  else {
				  
				  }
			  ?>
				  <option></option>
				  <option>1</option>
				  <option>2</option> 
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				  <option>6</option>
				  <option>7</option>
				  <option>8</option>
				  <option>9</option>
				  <option>10</option>
				  <option>11</option>
				  <option>12</option>
					 <option>13</option>
					 <option>14</option>
					 <option>15</option>
					 <option>16</option>
					 <option>17</option>
					 <option>18</option>
					 <option>19</option>
					 <option>20</option>
					 <option>21</option>
				 <option>22</option>
				 <option>23</option>
				 <option>24</option>
				 <option>25</option>
				 <option>26</option>
				 <option>27</option>
				 <option>28</option>
				 <option>29</option>
				 <option>30</option>
				 <option>31</option>
				 <option>32</option>
				 
				</select> 
			  </td>
			</tr>
			
			
			
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="submit" type="submit" value="Submit" >&nbsp;&nbsp;<input type="button" name="Submit" value="Cancel" onClick="javascript: history.back()" ></td>
			</tr>
		  </table>
		</form>
		<?
		} //end of  if($ViewInc == "byDate")
		?>
		
		
		<!--//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
		<!--//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
		<!--//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
		<!--//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
		<!--//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
		<!--//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
		 
 <?php 
 if($ViewInc == "byMonth")
 {
 ?>

<form action="?AdminPageID=ViewIncome&ViewInc=byDateViewMonth" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr>
			<td colspan="2" class="title">View Income Entry
	Monthwise		  
			  <hr size ="1" color="#c1cdd8"></td>
			</tr>
			<tr > 
			  <td width="134" class="text">Enter Date<font color="#FF0000">::</font></td>
			  <td width="593">B.S.
			    <input type="text" name="dateY" value="<?=$_POST['dateY'];?>" size="10" id="dateY" >
			    Month&nbsp;
			    <select name="dateM" id="dateM" >
			  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[dateM]\" selected>$_POST[dateM]</option>";
				  }
				  else {
				  
				  }
			  ?>
				  <option></option>
				  <option>Baisakh</option>
				  <option>Jestha</option> 
				  <option>Asar</option>
				  <option>Shrawan</option>
				  <option>Bhadra</option>
				  <option>Asoj</option>
				  <option>Kartik</option>
				  <option>Manghsir</option>
				  <option>Poush</option>
				  <option>Magh</option>
				  <option>Falgun</option>
				  <option>Chaitra</option>
				 
				</select> 
		      </td>
			</tr>
			
			
			
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="submit" type="submit" value="Submit" >&nbsp;&nbsp;<input type="button" name="Submit" value="Cancel" onClick="javascript: history.back()" ></td>
			</tr>
		  </table>
		</form>
		<?
		} //end of  if($ViewInc == "byDate")
		?>
		
		
		
		<!-- 9999999999999999999999999999999999999999999999999 -->
		<!-- 9999999999999999999999999999999999999999999999999 -->
		<!-- 9999999999999999999999999999999999999999999999999 -->
		<!-- 9999999999999999999999999999999999999999999999999 -->
		<!-- 9999999999999999999999999999999999999999999999999 -->
		<!-- 9999999999999999999999999999999999999999999999999 -->
		<!-- 9999999999999999999999999999999999999999999999999 -->
		
		
		<?php 
 if($ViewInc == "byHeading")
 {
 include ("include/db.php");
 				$query2="SELECT idtbl_incomehead,heading from tbl_incomehead" ;
					$result2=@mysql_query($query2); //run the query
					$row2=mysql_fetch_array($result2);
					$n2 = mysql_num_rows($result2);
 ?>

<form action="?AdminPageID=ViewIncome&ViewInc=byHeadingView" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr>
			<td colspan="2" class="title">View Income Headingwise
			  <hr size ="1" color="#c1cdd8"></td>
			</tr>
			<tr > 
			  <td width="134" class="text">Enter Heading <font color="#FF0000">::</font></td>
			  <td width="593">
			  <select name="heading" id="heading"   >
				  <option></option>
				  <?
				  for($ro = 0;$ro < $n2;$ro++)
							{
							echo "<option value=$row2[idtbl_incomehead]>$row2[heading]&nbsp;</option>";
							  $row2=mysql_fetch_array($result2);
							}
				  ?>
				  			 
				</select>
		      </td>
			</tr>
			
			
			<tr>
			  <td><span class="text">Enter Date<font color="#FF0000">::</font></span></td>
			  <td>B.S.
                <input type="text" name="dateY" value="<?=$_POST['dateY'];?>" size="10" id="dateY" >
Month&nbsp;
<select name="dateM" id="dateM" >
  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[dateM]\" selected>$_POST[dateM]</option>";
				  }
				  else {
				  
				  }
			  ?>
  <option></option>
  <option>Baisakh</option>
  <option>Jestha</option>
  <option>Asar</option>
  <option>Shrawan</option>
  <option>Bhadra</option>
  <option>Asoj</option>
  <option>Kartik</option>
  <option>Manghsir</option>
  <option>Poush</option>
  <option>Magh</option>
  <option>Falgun</option>
  <option>Chaitra</option>
</select></td>
		    </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="submit" type="submit" value="Submit" >&nbsp;&nbsp;<input type="button" name="Submit" value="Cancel" onClick="javascript: history.back()" ></td>
			</tr>
			
		  </table>
 </form>
		<?
		} //end of  if($ViewInc == "byDate")
		?>
		
		
		
		<?php 
 if($ViewInc == "byMember")
 {
 include ("include/db.php");
 				$query2="SELECT firmname from tbl_member order by firmname asc" ;
					$result2=@mysql_query($query2); //run the query
					$row2=mysql_fetch_array($result2);
					$n2 = mysql_num_rows($result2);
 ?>

<form action="?AdminPageID=ViewIncome&ViewInc=byMemberView" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr>
			<td colspan="2" class="title">View Income Firmwise/Memberwise 
			  <hr size ="1" color="#c1cdd8"></td>
			</tr>
			<tr > 
			  <td width="134" class="text">Enter Firmname <font color="#FF0000">::</font></td>
			  <td width="593">
			  <select name="firmname" id="firmname"   >
			    <option selected></option>
				  <?
				  for($ro = 0;$ro < $n2;$ro++)
							{
							echo "<option value=\"$row2[firmname]\">$row2[firmname]&nbsp;</option>";
							  $row2=mysql_fetch_array($result2);
							}
				  ?>
				  			 
				</select>
		      </td>
			</tr>
			
			
			<tr>
			  <td><span class="text">Enter Year <font color="#FF0000">::</font></span></td>
			  <td>B.S.
                <input type="text" name="dateY" value="<?=$_POST['dateY'];?>" size="10" id="dateY" >
</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="submit" type="submit" value="Submit" >&nbsp;&nbsp;<input type="button" name="Submit" value="Cancel" onClick="javascript: history.back()" ></td>
			</tr>
			
		  </table>
 </form>
		<?
		} //end of  if($ViewInc == "byDate")
		?>