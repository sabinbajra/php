function form_Validator(form)
{

  if (form.uname.value == "")
  {
    alert("You have forgot to enter Username.");
    form.uname.focus();
	return (false);
     }

  if (form.passwd.value == "")
  {
    alert("You have forgot to enter Password.");
    form.passwd.focus();
    return (false);
  }
  if (form.fname.value == "")
  {
    alert("You have forgot to enter Firstname.");
    form.fname.focus();
    return (false);
  }
  if (form.lname.value == "")
  {
    alert("You have forgot to enter Lastname.");
    form.lname.focus();
    return (false);
  }
  if (form.email.value == "")
  {
    alert("You have forgot to enter E-mail.");
    form.email.focus();
    return (false);
  }
  if (form.dob.value == "")
  {
    alert("You have forgot to enter Date of Birth.");
    form.dob.focus();
    return (false);
  }
  if (form.add.value == "")
  {
    alert("You have forgot to enter Address.");
    form.add.focus();
    return (false);
  }
  if (form.city.value == "")
  {
    alert("You have forgot to enter City.");
    form.city.focus();
    return (false);
  }
  if (form.country.value == "")
  {
    alert("You have forgot to enter Country.");
    form.country.focus();
    return (false);
  } 
  if (form.searchlyrics.value == "")
  {
    alert("No value in Lyrics Search Box.");
    form.searchlyrics.focus();
    return (false);
  }
  if (form.searchtabs.value == "")
  {
    alert("No value in Tabs Search Box.");
    form.searchtabs.focus();
    return (false);
  }            
  return (true);
  }
 