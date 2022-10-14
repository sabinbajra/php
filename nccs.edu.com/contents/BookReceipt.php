<script type="text/javascript" src="../autoComplete/jquery-1.2.1.pack.js"></script>
<script type="text/javascript">
	function Bklookup(BkinputString) {
		if(BkinputString.length == 0) {
			// Hide the suggestion box.
			$('#Bksuggestions').hide();
		} else {
			$.post("../autoComplete/AutoBkReceipt.php", {queryString: ""+BkinputString+""}, function(data){
				if(data.length >0) {
					$('#Bksuggestions').show();
					$('#BkautoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function Bkfill(thisValue) {
		$('#BkinputString').val(thisValue);
		setTimeout("$('#Bksuggestions').hide();", 200);
	}
	
	//MemID
		function Memlookup(MeminputString) {
		if(MeminputString.length == 0) {
			// Hide the suggestion box.
			$('#Memsuggestions').hide();
		} else {
			$.post("../autoComplete/ReceiptAutoMemID.php", {MemqueryString: ""+MeminputString+""}, function(data){
				if(data.length >0) {
					$('#Memsuggestions').show();
					$('#MemautoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function Memfill(thisValue) {
		$('#MeminputString').val(thisValue);
		setTimeout("$('#Memsuggestions').hide();", 200);
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
		margin: 0px 0px 1px 1px;
		padding: 0px;
		cursor: pointer;
		background-color: #B2B2B2;
	}
</style>
<br />
<form name="BookAdd" method="post" action="?MemberPageID=Book_ENF&Book=Receipt">
<table width="310" border="0" cellpadding="3" cellspacing="1" class="text">
  <tr valign="top"> 
    <td width="114">Book Code No </td>
    <td width="6"><div align="center">:</div></td>
    <td width="171"><input name="cd_no" type="text" class="text_box" size="20" value="" id="BkinputString" onkeyup="Bklookup(this.value);" onblur="Bkfill();" /></td>
  </tr>
  <tr valign="top"> 
    <td>Member ID </td>
    <td><div align="center">:</div></td>
    <td><input name="mem_user" type="text" class="text_box" size="20" value="" id="MeminputString" onkeyup="Memlookup(this.value);" onblur="Memfill();" /></td>
  </tr>
  <tr valign="top"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="submit" type="submit" id="submit" value="Submit" class="text_box"></td>
  </tr>
</table>
<div class="suggestionsBox" id="Bksuggestions" style="display: none;">
  <img src="../autoComplete/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
  <div class="suggestionList" id="BkautoSuggestionsList">
	&nbsp;
  </div>
</div>
			
<div class="suggestionsBox" id="Memsuggestions" style="display: none;">
  <img src="../autoComplete/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
  <div class="suggestionList" id="MemautoSuggestionsList">
  &nbsp;
  </div>
</div>
</form>