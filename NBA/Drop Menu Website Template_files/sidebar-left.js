<!-- Begin Left Sidebar

// CHANGE VARIABLES TO "no" OR "yes" - ONLY USE lowercase FOR ALL OPTIONS




var spacing		= "1"		// NUDGE SIDEBAR DOWN
var showscroller	= "yes"		// SHOW SIDEBAR SCROLLER





// COPYRIGHT 2009 © Allwebco Design Corporation
// Unauthorized use or sale of this script is strictly prohibited by law

// YOU DO NOT NEED TO EDIT BELOW THIS LINE



// NUDGE SPACER
document.write('<img src="picts/spacer.gif" height="'+spacing+'" width="10"><br>');







   if (showscroller == "yes") {
if (navigator.userAgent.indexOf('Safari') != -1)     
{
document.write(' ');
}
else {
document.write('<table cellpadding="0" cellspacing="0" border="0" class="sideborder"><tr><td align="center">');
Tscroll_init (0)
document.write('</td></tr></table>');
document.write('<br>');
}
}




// -- END -->