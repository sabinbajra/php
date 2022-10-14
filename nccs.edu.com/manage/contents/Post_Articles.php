<?php
$max_uploads=10;

$path='http://www.nihs.edu.np/contents/articles/';
$base_dir='../contents/articles';
?>
<br>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="f7f7f7" class="table">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
        <tr bgcolor="#FFFFFF" class="text"> 
          <td width="25%" bgcolor="fafafa">File Upload Path:</td>
          <td colspan="3" bgcolor="fafafa"><a href="articles" target="_blank"><?php echo $path; ?></a></td>
        </tr>
        <tr bgcolor="#FFFFFF" class="text"> 
          <td colspan="4"><strong>Note</strong>: Can upload <strong>.doc</strong>, 
            <strong>.pdf</strong>, <strong>.txt</strong>, <strong>.exe</strong>, 
            <strong>.zip</strong>, <strong>.gif</strong>, <strong>.jpg</strong> 
          </td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <td colspan="4"> 
            <?php

                if(isset($_POST['count'])){
	            	$count = $_POST['count'];

            	for($i = 1; $i < $count + 1; $i++){


							if(isset($HTTP_POST_FILES["upload".$i]) && $HTTP_POST_FILES["upload".$i]["name"] != "")
							{

                        	    echo "<span class=\"text\">File Upload Status...</span>";
                        	    $fname=$HTTP_POST_FILES["upload".$i]["name"];
	                            $tname=$HTTP_POST_FILES["upload".$i]["tmp_name"];
	                           // if($fname=="")continue;
                                	if(file_exists($base_dir."/".$fname)) {
										echo "<br><span class=\"text\"><font color=\"#FF0000\"><strong>".$fname."</strong></font> could not be uploaded. File already exists!!! </span><br>";
									}
									elseif(move_uploaded_file($tname, $base_dir."/".$fname))
	                                {
										include ("../include/db.php");
										$s_date= date("F j, Y");
		$query = "INSERT INTO articles (subject, headline, article, faculty, year, submitted_by, submitted_on) VALUES ('$subject', '$headline', '$fname', '$faculty', '$year', '$submitted_by', '$s_date')"; 
		$result = mysql_query($query);
	                                	echo "<br><span class=\"text\"><font color=\"#FF0000\"><strong>".$fname."</strong></font> was success fully uploaded !!! </span><br>";
	                                } else {
	                                	echo "<br><span class=\"text\"><font color=\"#FF0000\"><strong>".$fname."</strong></font> could not be uploaded !!! </span>";
	                                }

							} // end if (isset)

				} // end for
				} // end if
						?>
          </td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <td colspan="4"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr> 
                <td><center>
                    <strong> </strong> 
                    <form name="form1" enctype="multipart/form-data" method="post" action="<?phpPHP_SELF?>">
                      <table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
                        <tr> 
                          <td width="63" class="text"> <strong>Subject </strong> 
                          </td>
                          <td width="256"><input name="subject" type="text" class="search_box1" size="30"></td>
                        </tr>
                        <tr> 
                          <td class="text"><strong>Description</strong></td>
                          <td><input name="headline" type="text" class="search_box1" size="30"></td>
                        </tr>
                        <tr> 
                          <td class="text"><strong>Faculty</strong></td>
                          <td><select name="faculty" class="search_box1">
                              <option>          </option>
							  <option value="Certificate in General Medicine (HA)">Certificate 
                              in General Medicine (HA)</option>
                              <option value="PCL in Nurshing (staff nurse)">PCL 
                              in Nurshing (staff nurse)</option>
                              <option value="Diploma in Pharmacy">Diploma in Pharmacy</option>
                              <option value="Bachelor in PUblic health (BPH)">Bachelor 
                              in PUblic health (BPH)</option>
                              <option value="Post Basic Bachelor in Nurshing (PBN)">Post 
                              Basic Bachelor in Nurshing (PBN)</option>
                              <option value="BSc in Nurshing">BSc in Nurshing</option>
                              <option value="Masters in Nurshing (MN)">Masters 
                              in Nurshing (MN)</option>
                              <option value="Masters in Public Health">Masters 
                              in Public Health</option>
                            </select></td>
                        </tr>
                        <tr> 
                          <td class="text"><strong>Year</strong></td>
                          <td><select name="year" class="search_box1">
                              <option> </option>
                              <option value="First Year">First Year</option>
                              <option value="Second Year">Second Year</option>
                              <option value="Third Year">Third Year</option>
                              <option value="Fourth Year">Fourth Year</option>
                            </select></td>
                        </tr>
                        <tr> 
                          <td class="text"><strong>Submitted By</strong></td>
                          <td><input name="submitted_by" type="text" class="search_box1" size="30"></td>
                        </tr>
                        <tr>
                          <td class="text"><strong>Article</strong></td>
                          <td><strong>
                            <input name="upload1" type="file" class="search_box1" size="30">
                            </strong></td>
                        </tr>
                      </table>
                      <table border="0" cellspacing="1" cellpadding="2">
                        <tr> 
                          <td width="123"> <div align="center"><strong>
                              <input class="search_box1" type="button" name="Button" value="Back" onClick="window.location='admin.php?pageID=Result'">
                              &nbsp;&nbsp; 
                              <input type="submit" name="Submit" value="Upload" class="search_box1">
                              </strong></div></td>
                        </tr>
                        <input type="hidden" name="count" value="1">
                      </table>
                    </form>
                    <strong></strong> </center></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<br>