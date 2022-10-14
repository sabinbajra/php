<script type="text/javascript" src="../autoComplete/jquery-1.2.1.pack.js"></script>
<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("../autoComplete/rpc.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
	
	//MemID
		function Mlookup(MinputString) {
		if(MinputString.length == 0) {
			// Hide the suggestion box.
			$('#Msuggestions').hide();
		} else {
			$.post("../autoComplete/AutoMemID.php", {MqueryString: ""+MinputString+""}, function(data){
				if(data.length >0) {
					$('#Msuggestions').show();
					$('#MautoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function Mfill(thisValue) {
		$('#MinputString').val(thisValue);
		setTimeout("$('#Msuggestions').hide();", 200);
	}
</script>

<style type="text/css">
/*	body {
		font-family: Helvetica;
		font-size: 11px;
		color: #000;
	}
	
	h3 {
		margin: 0px;
		padding: 0px;	
	}
	*/

	.suggestionsBox {
		font-family: Helvetica;
		font-size: 11px;
		color: #624a7e;
		
		position: relative;
		left: 0px;
		margin: 10px 0px 0px 0px;
		width: 510px;
		background-color: #d8d6e7;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 1px solid #a59fc6; /*B2B2B2*/	
	}
	
	.suggestionList {
		margin: -14px 0px 1px 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 1px 1px;
		padding: 0px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>
<br />
<form name="BookAdd" method="post" action="?MemberPageID=Book_ENF&Book=Issue">
<table width="324" border="0" cellpadding="3" cellspacing="1" class="text">
  <tr valign="top"> 
    <td width="112">Book Code No </td>
    <td width="6"><div align="center">:</div></td>
    <td width="184"><input name="cd_no" type="text" class="text_box" size="20" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" /></td>
  </tr>
  <tr valign="top"> 
    <td>Member ID </td>
    <td><div align="center">:</div></td>
    <td><input name="mem_user" type="text" class="text_box" size="20" value="" id="MinputString" onkeyup="Mlookup(this.value);" onblur="Mfill();" /></td>
  </tr>
  <tr valign="top"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="submit" type="submit" id="submit" value="Submit" class="text_box"></td>
  </tr>
</table>
<div class="suggestionsBox" id="suggestions" style="display: none;">
  <img src="../autoComplete/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
  <div class="suggestionList" id="autoSuggestionsList">
	&nbsp;
  </div>
</div>
			
<div class="suggestionsBox" id="Msuggestions" style="display: none;">
  <img src="../autoComplete/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
  <div class="suggestionList" id="MautoSuggestionsList">
  &nbsp;
  </div>
</div>
</form>