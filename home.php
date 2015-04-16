<?php
require 'core.php';
require 'connection.php';

include 'INCLUDE/html_config_link.inc.php';
echo $headsetting;
echo '<body>';
include 'INCLUDE/html_config_navbar.inc.php';

        echo '
        <!-- Collection of nav links and other content for toggling -->
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="alert-info"><a href="balance_info.php"><p class="text-primary">Balance</p></a></li>
                                <li><a href="deposit.php"><p class="text-primary">Deposit</p></a></li>
                                <li><a href="withdraw.php"><p class="text-primary">WithDraw</p></a></li>
                                <li><a href="update.php"><p class="text-primary">Setting</p></a></li>
                                <li><a href="logout.php"><p class="text-primary"><strong>LogOut</strong></p></a></li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                 </div>
        ';


	 if(loggedin())
	 {  
	 $act_num=$_SESSION['actnum'];
	 $result = mysql_query("SELECT * FROM accounts WHERE accountnumber = $act_num")
			 or die(mysql_error());  
             
			 $data = mysql_fetch_array($result);  
             $username=$data['username'];


        echo'
                <div class="container">
                <div class="row">
                <div class="col-sm-12">
                <div class=""><p>
	    ';

				    echo 'Welcome! '.   $username;
					echo '<br><br>';

        echo '
                </p>
                </div>
                </div>
                </div>
                </div>
        ';
	 }
	 else
	    include "login.php";

echo '</body>';
?>

<?php
ob_end_flush();
?>