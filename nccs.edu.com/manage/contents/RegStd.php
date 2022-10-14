<?php
	// connect database
	include ("../include/db.php");
	$s_date= date("F j, Y");
	?>
	<form action="?AdminPageID=Students&New=RegisterENF&Student=Add" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
	  <input type="hidden" name="id" value="<?=$show['id'];?>" />
		
  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
    <tr> 
      <td class="text" width="166">Registration No. <font color="#FF0000">*</font></td>
      <td width="561"><input name="regno" size="20"  maxlength="15" id="regno" class="search_box1" value="<?=$TempRegNo;?>"></td>
    </tr>
    
       
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Year/Batch <font color="#FF0000">*</font></td>
      <td><input name="yr_batch" size="20"  id="yr_batch" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Grade<font color="#FF0000">*</font></td>
      <td> <select name="Grade" id="Grade" class="search_box1">
          <option selected>11</option>
          <option>12</option>
        </select> </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Admission On <font color="#FF0000">*</font></td>
      <td><input name="ad_dt" size="20"  id="ad_dt" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Nationality<font color="#FF0000">*</font></td>
      <td><input name="nationality" size="20" id="nationality" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Religion</td>
      <td><input name="religion" size="20" id="religion" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">CitizenshipNo<font color="#FF0000">&nbsp;</font></td>
      <td><input name="CitizenshipNo" size="20" id="CitizenshipNo" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text"><strong>Father Details</strong><font color="#FF0000">&nbsp;</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">First Name<font color="#FF0000">*</font></td>
      <td><input name="fisrtname" size="20" id="firstname" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Mid Name</td>
      <td><input name="Midname" size="20" id="Midname" class="search_box1" /></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Last Name<font color="#FF0000">*</font></td>
      <td><input name="lastname" size="20" id="lastname" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Contact</td>
      <td><input name="fcontact" size="20" id="fcontact" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text"><strong>Education Details</strong></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td colspan="2" class="text">Details of SLC or equivalent.</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Board</td>
      <td><input name="Board" size="20" id="Board" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">School</td>
      <td><input name="School" size="20" id="School" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Passed Year<font color="#FF0000">&nbsp;</font></td>
      <td><input name="passyear" size="20" id="passyear" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Passed Division<font color="#FF0000">&nbsp;</font></td>
      <td><input name="pdivision" size="20" id="pdivision" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Symbol No <font color="#FF0000">&nbsp;</font></td>
      <td><input name="symNo" size="20" id="symNo" class="search_box1"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="text">Percentage<font color="#FF0000">&nbsp;</font></td>
      <td><input name="Percentage" size="20" id="Percentage" class="search_box1"></td>
    </tr>
    <!--kjasdhfklasdhflksadjhfksadhfjda-->
    <tr bgcolor="#FFFFFF"> 
      <td colspan="5" class="text"><strong>2. Subjects Applied for Plus two </strong></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      
      <td class="text"><strong>XI </strong></td>
      <td colspan="3" class="text">&nbsp;</td>
    </tr>
    <?php 
		
		echo "<tr bgcolor=\"#FFFFFF\">" ;
     
      $q="select * from tbl_comp_course where grade='11' AND flag ='1'";
	  $r=mysql_query($q);
	  echo mysql_error();
	  $i=1;
	  while($s=mysql_fetch_array($r)){
	  ?>
        <td class="text"><?php echo $i;?></td>
          <td colspan="3"><input disabled="disabled" type="text" name="Nepali" value="<?php echo $s['subject'];?>" size="50" class="search_box1"></td>
   
    </tr>
    
   <? $i++;
   }?>
   
    <tr bgcolor="#FFFFFF"> 
      
      <td class="text"><?php echo $i;?> </td>
      <td colspan="3"><label>
        <select name="opt_11_1" class="search_box1">
          <option selected="selected">------</option>
          <?php
      $query="select * from tbl_comp_course where grade='11' AND flag ='0'";
	  $result=mysql_query($query);
	  echo mysql_error();
	  while($show=mysql_fetch_array($result)){
	  ?>
          <option value="<?=$show['comp_cos_id'];?>"><? echo $show['subject'];?></option>
          <? }?>
        </select>
      </label></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      
      <td class="text"><?php echo $i+1;?></td>
      <td colspan="3"><span class="text">
        <select  class="search_box1" name="opt_11_2">
          <option selected="selected" >------</option>
          <?php
      $query="select * from tbl_comp_course where grade='11' AND flag ='0'";
	  $result=mysql_query($query);
	  echo mysql_error();
	  while($show=mysql_fetch_array($result)){
	  ?>
          <option  value="<?=$show['comp_cos_id'];?>"><? echo $show['subject'];?></option>
          <? }?>
        </select>
      </span></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
     
      <td class="text"><strong>XII</strong></td>
      <td colspan="3" class="text">&nbsp;</td>
    </tr>
   <?php 
		
		echo "<tr bgcolor=\"#FFFFFF\">" ;
     
      $q="select * from tbl_comp_course where grade='12' AND flag ='1'";
	  $r=mysql_query($q);
	  echo mysql_error();
	  $j=1;
	  while($s=mysql_fetch_array($r)){
	  ?>
        <td class="text"><?php echo $j;?></td>
          <td colspan="3"><input disabled="disabled" type="text" name="Nepali" value="<?php echo $s['subject'];?>" size="50" class="search_box1"></td>
   
    </tr>
    
   <? $j++;
   }?>
   
    <tr bgcolor="#FFFFFF"> 
     
      <td class="text"><?php echo $j;?></td>
      <td colspan="3"><select name="opt_12_1" class="search_box1">
       <option selected="selected">------</option> 
        <?php
      $query="select * from tbl_comp_course where grade='12' AND flag ='0'";
	  $result=mysql_query($query);
	  echo mysql_error();
	  while($show=mysql_fetch_array($result)){
	  ?>
           <option value="<?=$show['comp_cos_id'];?>"><? echo $show['subject'];?></option>
        <? }?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
     
      <td class="text"><?php echo $j+1;?></td>
      <td colspan="3"><select name="opt_12_2" class="search_box1">
       <option selected="selected" id="">------</option> 
        <?php
      $query="select * from tbl_comp_course where grade='12' AND flag ='0'";
	  $result=mysql_query($query);
	  echo mysql_error();
	  while($show=mysql_fetch_array($result)){
	  ?>
     
        <option value="<?=$show['comp_cos_id'];?>"><? echo $show['subject'];?></option>
        <? }?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      
      <td class="text"><?php echo $j+2;?></td>
      <td colspan="3"><select name="opt_12_3" class="search_box1">
       	<option selected="selected">------</option> 
        <?php
      $query="select * from tbl_comp_course where grade='12' AND flag ='0'";
	  $result=mysql_query($query);
	  echo mysql_error();
	  while($show=mysql_fetch_array($result)){
	  ?>
     
              <option value="<?=$show['comp_cos_id'];?>"><? echo $show['subject'];?></option>
        <? }?>
      </select></td>
    </tr>
    <!--kjasdhfklasdhflksadjhfksadhfjda-->
    <tr> 
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" value="Submit" class="search_box1"></td>
    </tr>
  </table>
</form>