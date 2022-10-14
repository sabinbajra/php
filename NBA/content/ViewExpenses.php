<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: index.php");
	}	
?> 

<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td class="title"> 
      Expenses Entry
        <hr size="1"></hr>
      <br>    </td>
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
						echo "<a href=\"?AdminPageID=ExpensesEntry&Opt=Add\">New Expenditure</a>";
					}
				  ?>
                  </div></td>
                </tr>
              </table>
			  <br><br><br>
			  <table width="751" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
                <tr> 
                  <td width="407" ><p>View Expenditure by </p>
                    <p>| <a href="?AdminPageID=ViewExpenses&ViewExp=byDate">Datewise</a> | <a href="?AdminPageID=ViewExpenses&ViewExp=byMonth">Monthwise</a>  
				   | <a href="?AdminPageID=ViewExpenses&ViewExp=byHeading">Headingwise</a> | </p></td>
                  <td width="332"><div align="right">
				  
				  	</div></td>
                </tr>
              </table>
              <br> 
              <?
			  if($ViewExp == "byDate" || $ViewExp == "byMonth" || $ViewExp == "byMember" || $ViewExp == "byHeading" ){
			  
			  include  "dateExpenses.php";
			  }
			  
			  if($ViewExp == "byDateView"  || $ViewExp == "byDateViewMonth" || $ViewExp ==  "byHeadingView" ){
			  
			  include $ViewExp."Exp.php";
			  }
			  
			  
				?>
            </td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>