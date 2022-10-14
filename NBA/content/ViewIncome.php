<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: index.php");
	}	
?> 

<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td class="title"><img src="images/icons/#.gif" width="13" height="16" align="absmiddle"> 
      Income Entry
        <hr size="1"></hr>
      <br>
    </td>
  </tr>
  <tr> 
    <td> <div align="center">
        <table width="765" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr> 
            <td><table width="751" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
                <tr> 
                  <td width="372" > 
                  </td>
                  <td width="367"><div align="right">
				  <?
				  	if ($_SESSION["valid_user"] == "admin" ||  $_SESSION["valid_user"] == "ADMIN") {
						echo "<a href=\"?AdminPageID=IncomeEntry&Opt=Add\">New Income</a>";
					}
				  ?>
                  </div></td>
                </tr>
              </table>
			  <br><br><br>
			  <table width="751" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
                <tr> 
                  <td width="407" ><p>View Income </p>
                  <p>| <a href="?AdminPageID=ViewIncome&ViewInc=byDate">Datewise</a> | <a href="?AdminPageID=ViewIncome&ViewInc=byMonth">Monthwise</a> | 
				  <a href="?AdminPageID=ViewIncome&ViewInc=byMember">Frimwise/Memberwise</a> | <a href="?AdminPageID=ViewIncome&ViewInc=byHeading">Headingwise</a> | </p></td>
                  <td width="332"><div align="right">
				  
				  	</div></td>
                </tr>
              </table>
              <br> 
              <?
			  if($ViewInc == "byDate" || $ViewInc == "byMonth" || $ViewInc == "byMember" || $ViewInc == "byHeading" ){
			  
			  include  "dateIncome.php";
			  }
			  
			  if($ViewInc == "byDateView"  || $ViewInc == "byDateViewMonth" || $ViewInc ==  "byHeadingView" || $ViewInc ==  "byMemberView"){
			  
			  include $ViewInc.".php";
			  }
			   
				?>
            </td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>