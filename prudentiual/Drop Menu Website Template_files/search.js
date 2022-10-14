<!-- Begin

// NOTE: If you use a ' add a slash before it like this \'



var	showbrand	= "no"		// SHOW GOOGLE BRANDING (SWITCH TO YES IF YOU HAVE ANY PROBLEMS)
var	showsearch	= "yes"		// SHOW SEARCH BOX


var	yourdomain	= "allwebcodesign.com/templates/T27dChromeLightgreen"	// YOUR DOMAIN NAME OR PATH



// GOOGLE SITE SEARCH




// COPYRIGHT 2009 © Allwebco Design Corporation
// Unauthorized use or sale of this script is strictly prohibited by law




   if (showsearch == "yes") {

document.write('<form id="searchbox_003488088439636726711:dzunaemraqw" action="http://'+yourdomain+'/search_results.html" target="_top" class="formmargin">');

document.write('<input type="hidden" name="cx" value="003488088439636726711:dzunaemraqw" />');

document.write('<input type="hidden" name="cof" value="FORID:9" />');

document.write('<table cellpadding="0" cellspacing="0" border="0" class="sidebartext"><tr><td valign="top">');

document.write('<input name="q" type="text" size="15" class="searchsiteform">');

document.write('</td><td valign="top">');

document.write('<INPUT TYPE="image" SRC="picts/search-off.gif" name="sa" width="32" height="27" border="0" onmouseover="this.src=\'picts/search-on.gif\'" onmouseout="this.src=\'picts/search-off.gif\'" alt="Search"><br>')

document.write('</td></tr></TABLE>');

document.write('</form>');

}








// GOOGLE BRANDING
   if (showbrand == "yes") {
document.write('<scr' + 'ipt type="text\/javascript" src="http:\/\/google.com\/coop\/cse\/brand?form=searchbox_003488088439636726711%3Adzunaemraqw"><\/script>');
}





//  End -->