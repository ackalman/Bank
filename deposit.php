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
                                <li><a href="balance_info.php"><p class="text-primary">Balance</p></a></li>
                                <li class="alert-info"><a href="deposit.php"><p class="text-primary">Deposit</p></a></li>
                                <li><a href="withdraw.php"><p class="text-primary">WithDraw</p></a></li>
                                <li><a href="update.php"><p class="text-primary">Setting</p></a></li>
                                <li><a href="logout.php"><p class="text-primary"><strong>LogOut</strong></p></a></li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                 </div>
        ';


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

?>
	 

     <form action="deposit.php" method="post">
         <input type="integer" name="deposit" placeholder="Amount to Deposit" class="form-control"><br>
         <input type="submit" name="insert" value="D e p o s i t" class="btn btn-info btn-block">
     </form>

        <?php
            if (isset($_POST["insert"])){
		        $deposit=$_POST['deposit'];

			 //ob_start();
                 if(!empty($deposit)){
                     $balance=$data['balance'];
                     $deposit=$_POST['deposit'];
                     $new_balance=$balance+$deposit;

                     $query = mysql_query("UPDATE `accounts` SET `balance`=$new_balance WHERE `accountnumber`=$act_num")
                             or die(mysql_error());
                     echo 'Deposited';
                     header("Location: balance_info.php");
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

