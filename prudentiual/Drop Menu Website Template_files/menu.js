<!-- Begin CSS Horizontal Menu - menu ver 3.15 2009

// NOTE: If you use a ' add a slash before it like this \'


var menuside		= "left"	// MENU SIDE | left | right | center
var fixwrap		= "no"		// MAKE yes ONLY IF MENUS ARE WRAPPING
var menuwidth		= "900"		// TOTAL MENU WIDTH TO FIX WRAP



document.write('<table cellpadding="0" cellspacing="0" border="0" class="menutable"><tr><td class="printhide" align="'+menuside+'">');
document.write('<table cellpadding="0" cellspacing="0" border="0"><tr><td>');

document.write('<ul id="menunav">');




// START MENU LINKS - EDIT BELOW THIS AREA





document.write('  <li style="width: 110px;"><a href="index.html">Mainsite</a>'); 
document.write('    <ul>');
document.write('      <li><a href="index.html">Home</a></li>');
document.write('      <li><a href="site_map.htm">Site Map</a></li>');
document.write('      <li><a href="about.htm">About Us</a></li>');
document.write('    </ul>');
document.write('  </li>');





document.write('  <li style="width: 110px;"><a href="services.htm">Services</a>'); 
document.write('    <ul>');
document.write('      <li><a href="services.htm">Our Services</a></li>');
document.write('      <li><a href="clients.htm">Client List</a></li>');
document.write('    </ul>');
document.write('  </li>');





document.write('  <li style="width: 110px;"><a href="gallery1.htm">Gallery</a>');
document.write('    <ul>');
document.write('      <li><a href="gallery1.htm">Gallery 1</a></li>');
document.write('      <li><a href="gallery2.htm">Gallery 2</a></li>');
document.write('      <li><a href="gallery3.htm">Gallery 3</a></li>');
document.write('      <li><a href="FORMgallery1.htm">Ordering 1</a></li>');
document.write('      <li><a href="FORMgallery2.htm">Ordering 2</a></li>');
document.write('      <li><a href="FORMgallery3.htm">Ordering 3</a></li>');
document.write('    </ul>');
document.write('  </li>');





document.write('  <li style="width: 110px;"><a href="news.htm">Resources</a>');
document.write('    <ul>');
document.write('      <li><a href="news.htm">Company News</a></li>');
document.write('      <li><a href="links.htm">Website Links</a></li>');
document.write('    </ul>');
document.write('  </li>');





document.write('  <li style="width: 140px;"><a href="site_map.htm">Help &amp; Support</a>');
document.write('    <ul>');
document.write('      <li><a href="site_map.htm">Site Map</a></li>');
document.write('      <li><a href="faq-home.htm">F.A.Q.</a></li>');
document.write('      <li><a href="contact.htm">Contact Us</a></li>');
document.write('      <li><a href="careers.htm">Careers</a></li>');
document.write('      <li><a href="PDFgallery.htm" target="_blank">PDF Downloads</a></li>');
document.write('    </ul>');
document.write('  </li>');





document.write('<li style="width: 110px;"><a href="contact.htm">Contact</a></li>');





// END LINKS //



document.write('</ul>');
document.write('</td></tr></table>');
   if (fixwrap == "yes") {
document.write('<img src="picts/spacer.gif" width="'+menuwidth+'" height="1"><br>');
}
document.write('</td></tr></table>');

// END -->