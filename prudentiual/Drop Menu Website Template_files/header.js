<!-- Begin HEADER OPTIONS CODE

// ONLY USE lowercase FOR ALL OPTIONS

// CHANGE ANY OF THESE VARIABLES TO "no" OR "yes" TO TURN AN OPTION OFF OR ON




var color		= "666666"	// HEADER BACKGROUND COLOR (EDIT IN THE css FILE)
var flashheight		= "50"		// HEIGHT OF THE FLASH (IN PIXELS)
var flashwidth		= "750"		// WIDTH OF THE FLASH (IN PIXELS)

var showdate		= "yes"		// SHOW THE DATE ON THE PAGE
var stripes	 	= "yes"		// SHOW STRIPE UNDER THE FLASH





// COPYRIGHT 2009 © Allwebco Design Corporation
// Unauthorized use or sale of this script is strictly prohibited by law

// YOU DO NOT NEED TO EDIT BELOW THIS LINE



document.write('<TABLE cellpadding="0" cellspacing="0" border="0" width="100%" BGCOLOR="#'+color+'"><tr><td align="left" class="headercolor">');
document.write('<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="'+flashwidth+'" HEIGHT="'+flashheight+'" id="logo">');
document.write('<PARAM NAME="movie" VALUE="logo.swf">');
document.write('<PARAM NAME="quality" VALUE="high">');
document.write('<PARAM NAME="wmode" VALUE="transparent">');
document.write('<PARAM NAME="bgcolor" VALUE="#'+color+'">');
document.write('<EMBED src="logo.swf" quality="high" wmode="transparent" bgcolor="#'+color+'" WIDTH="'+flashwidth+'" HEIGHT="'+flashheight+'" NAME="logo" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED></OBJECT><br>');


   if (stripes == "yes") {
document.write('</td></tr><tr class="printhide"><td class="pagebars">');
document.write('<img src="picts/spacer.gif" width="10" height="1"><br>');
}

document.write('</td></tr></table>');



// START DATE SCRIPT
   if (showdate == "yes") {

document.write('<div id="date-location" class="printhide">');
var d=new Date()
var weekday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
document.write("<span class=\"date-font\"><nobr>" + weekday[d.getDay()] + " ")
document.write(monthname[d.getMonth()] + " ")
document.write(d.getDate() + ". ")
document.write(d.getFullYear())
document.write("</nobr><br></span>")
document.write('</div>');

}


//  End -->