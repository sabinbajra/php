function setCheckboxes(the_form, do_check)
{
    var elts      = document.forms[the_form].elements;
    var elts_cnt  = elts.length;
	
    for (var i = 0; i < elts_cnt; i++) {
        elts[i].checked = do_check;
		if (the_form + "_submit" == elts[i].name) {
			elts[i].disabled = !do_check;
		}
    } // end for

    return true;
} // end of the 'setCheckboxes()' function