<?php
require 'core.php';
require 'connection.php';

include 'INCLUDE/html_config_link.inc.php';
echo $headsetting;

     $act_num=$_SESSION['actnum'];
	 $result = mysql_query("SELECT * FROM accounts WHERE accountnumber = $act_num")
	  or die(mysql_error());  
             
	        $data = mysql_fetch_array($result);
            $username=$data['username'];
echo '<body>';

include 'INCLUDE/html_config_navbar.inc.php';

        echo '
        <!-- Collection of nav links and other content for toggling -->
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="balance_info.php"><p class="text-primary">Balance</p></a></li>
                                <li><a href="deposit.php"><p class="text-primary">Deposit</p></a></li>
                                <li class="alert-info"><a href="withdraw.php"><p class="text-primary">WithDraw</p></a></li>
                                <li><a href="update.php"><p class="text-primary">Setting</p></a></li>
                                <li><a href="logout.php"><p class="text-primary"><strong>LogOut</strong></p></a></li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                 </div>
        ';




        echo'
                <div class="container">
                <div class="row">
                <div class="col-sm-12">
                <div class=""><p>
	    ';


            echo 'Welcome! '.   $username;
            echo '<br><br>';


?>

     <form action="withdraw.php" method="post">
         <input type="integer" name="withdraw" placeholder="Amount to Withdraw" class="form-control"><br>
         <input type="submit" name="del" value="W i t h d r a w" class="btn btn-info btn-block">
     </form>

       <?php
           if (isset($_POST["withdraw"])){
                     $withdraw=$_POST["withdraw"];
                 	 if (!empty($withdraw)){
					 $balance=$data['balance'];
			     
                         if($balance>=$withdraw){						 
                             $new_balance=$balance-$withdraw;

                             $query = mysql_query("UPDATE `accounts` SET `balance`=$new_balance WHERE `accountnumber`=$act_num")
                             or die(mysql_error());
                             header("Location:balance_info.php");
                         }
						 else if($balance<$withdraw){
						    echo 'no sufficient balance';
						 }
                     }
					 else
					    echo 'no amount entered';
           }


        echo '
                </p>
                </div>
                </div>
                </div>
                </div>
        ';


echo '</body>';
?>

<?php
ob_end_flush();
?>