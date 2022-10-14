<script>
// form fields description structure
var a_fields = {
	'username': {
		'l': 'Title',  // label
		'r': false,    // required
		'f': 'alpha',  // format (see below)
		't': 'username',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 2,       // minimum length
		'mx': 10       // maximum length
	},
	'username':{'l':'User Name','r':true,'f':'alpha','t':'t_user_name'},	
	'gender':{'l':'Gender','r':true,'t':'t_gender'},
	'email':{'l':'E-mail','r':true,'f':'email','t':'t_email'},
	//'dob':{'l':'Dob','r':true,'f':'dob','t':'t_dob'},
},

o_config = {
	'to_disable' : ['Submit', 'Reset'],
	'alert' : 1
}

// validator constructor call
var v = new validator('forgot_pwd', a_fields, o_config);

</script>
<form name="forgot_pwd" method="post" action="?pageID=ForgotPWD_ENF" onSubmit="return v.exec()">
  <table width="326" border="0" align="center" cellpadding="3" cellspacing="1" class="text">
    <tr valign="top"> 
      <td id="t_user_name" width="30%">Username</td>
      <td width="3%"><div align="center">:</div></td>
      <td width="67%"><input name="username" type="text" class="text_box" id="uname" size="35"></td>
    </tr>
    <tr valign="top"> 
      <td>Date of Birth</td>
      <td><div align="center">:</div></td>
      <td><input name="dob" type="text" class="text_box" id="dob" size="35"></td>
    </tr>
    <tr valign="top"> 
      <td id="t_email">E-mail</td>
      <td><div align="center">:</div></td>
      <td><input name="email" type="text" class="text_box" id="email" size="35"></td>
    </tr>
    <tr valign="top"> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" id="submit" value="Submit" class="text_box"></td>
    </tr>
  </table>
</form>