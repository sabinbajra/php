<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr> 
    <td><center>
        <form name="news_articles_form" method="post" action="?AdminPageID=Contents&Added=Add_enf&Db=<?=$AddDB;?>">
          <table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
            <tr> 
              <td width="97" class="text"><strong>Grade</strong></td>
              <td colspan="3"><select name="sem" id="sem" class="search_box1">
                <option selected="selected" value="11">Class 11</option>
                <option value="12">Class 12</option>
              
              </select></td>
            </tr>
			<tr> 
              <td class="text"><strong>Subject Type</strong></td>
              <td colspan="3"><label>
                <select name="type" id="type">
                 <option selected="selected" value="1">Compulsary</option>
                <option value="">Optional</option>
                </select>
              </label></td>
			</tr>
			<tr> 
              <td class="text"><strong>Course Name</strong></td>
              <td colspan="3"><input name="cos_name" type="text" class="search_box1" size="100"></td>
            </tr>
            <tr> 
              <td valign="top" class="text"><strong>Description</strong></td>
              <td colspan="3"><strong> 
                <textarea name="cos_desc" cols="100" rows="8" class="search_box1" id="contents"></textarea>
                </strong></td>
            </tr>
            <tr>
              <td valign="top" class="text"><div align="right">
                <strong>
                <label>                </label>
                </strong>
                <label><div align="left"></div>
                </label>
                <div align="left"><strong>
                  <input type="radio" name="radio" id="radio2" value="0" />
                  Full Marks</strong></div>
              </div></td>
              <td><input type="text" name="fm" id="fm" class="search_box1" /></td>
              <td><div align="right"><span class="text"><strong>Pass Marks</strong></span></div></td>
              <td><input type="text" name="pm" id="pm"  class="search_box1"/></td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><label>
                <input type="radio" name="radio" id="radio" value="1" />
              </label></td>
              <td width="151"><label></label></td>
              <td width="89">&nbsp;</td>
              <td width="369">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><strong>Theory</strong></td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><div align="right"><strong>F.M</strong></div></td>
              <td><input type="text" name="t_fm" id="t_fm"  class="search_box1"/></td>
              <td><div align="right"><span class="text"><strong> P.M</strong></span></div></td>
              <td><input type="text" name="t_pm" id="t_pm" class="search_box1"/></td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><strong>Practical</strong></td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><div align="right"><strong> F.M</strong></div></td>
              <td><input type="text" name="p_fm" id="p_fm" class="search_box1"/></td>
              <td><div align="right"><span class="text"><strong>P.M</strong></span></div></td>
              <td><input type="text" name="p_pm" id="p_pm" class="search_box1"/></td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td colspan="3"><input type="submit" name="Submit" value="Submit" class="search_box1">
			  <input type="button" name="Submit" value="List Courses" onClick="window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Courses'" class="search_box1">			  </td>
            </tr>
          </table>
        </form>
      </center></td>
  </tr>
</table>
