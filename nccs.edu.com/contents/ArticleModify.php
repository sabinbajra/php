<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	include "../include/db.php";
	
	// Get value on Fields
	$GET_Val = mysql_query("SELECT * FROM tbl_news_articles WHERE id='$_GET[id]'");
	$Val_Arr = mysql_fetch_array($GET_Val);
	
	// Get Full Name
	$GET_NAME = mysql_query("SELECT firstname, middlename, lastname from tbl_members WHERE id=$_SESSION[valid_id]");
	$GET_ARRAY = mysql_fetch_array($GET_NAME);
	if (empty($GET_ARRAY["middlename"])) {
		$PostName = $GET_ARRAY["firstname"] . " " . $GET_ARRAY["lastname"];
	}
	else {
		$PostName = $GET_ARRAY["firstname"] . " " . $GET_ARRAY["middlename"] . " " . $GET_ARRAY["lastname"];
	}
?>
<br>
<center>
  <form name="news_articles_form" method="post" action="?MemberPageID=ArticleENF&Db=EDIT">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>"/>
	<input type="hidden" name="PostName" value="<?=$PostName;?>"/>
	<input type="hidden" name="PostID" value="<?=$_SESSION["valid_id"];?>"/>
    <table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
      <tr>
        <td width="63" class="text"><strong>Headline</strong></td>
        <td width="256"><input name="headlines" type="text" class="text_box" value="<?=stripslashes($Val_Arr[headlines]);?>" size="65"></td>
      </tr>
      <tr>
        <td valign="top" class="text"><strong>News/Articles</strong></td>
        <td><strong>
          <textarea name="contents" cols="64" rows="10" class="text_box"><? echo str_replace("<BR>","\n",stripslashes($Val_Arr[contents]));?>
          </textarea>
        </strong></td>
      </tr>
      <tr>
        <td valign="top" class="text">&nbsp;</td>
        <td><input type="submit" name="Submit" value="Submit" class="text_box">
            <input type="button" name="Submit" value="List Posted News/Articles" onClick="window.location='?MemberPageID=ArticlePosted'" class="text_box">
        </td>
      </tr>
    </table>
  </form>
</center>