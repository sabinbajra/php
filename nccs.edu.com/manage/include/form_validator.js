<!-- 
function form_Validator(form)
{

  if (form.uname.value == "")
  {
    alert("Please enter Username.");
    form.uname.focus();
	return (false);
     }

  if (form.passwd.value == "")
  {
    alert("Please enter Password.");
    form.passwd.focus();
    return (false);
  }
  
  if (form.fname.value == "")
  {
    alert("Please enter Firstname.");
    form.fname.focus();
	return (false);
     }

  if (form.lname.value == "")
  {
    alert("Please enter Lastname.");
    form.lname.focus();
    return (false);
  }
   
  if (form.dob.value == "")
  {
    alert("Please enter Date of Birth.");
    form.dob.focus();
    return (false);
  }
  
  if (form.padd.value == "")
  {
    alert("Please enter Permanent Address.");
    form.padd.focus();
    return (false);
  }
  
  if (form.city.value == "")
  {
    alert("Please enter City.");
    form.city.focus();
    return (false);
  }
  
  if (form.country.value == "")
  {
    alert("Please enter Country.");
    form.country.focus();
    return (false);
  }
  return (true);
  }
  //-->