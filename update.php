<?php
require 'core.php';
require 'connection.php';

include 'INCLUDE/html_config_link.inc.php';
echo $headsetting;



            $act_num=$_SESSION['actnum'];
            $result = mysql_query("SELECT * FROM accounts WHERE accountnumber = $act_num") or die(mysql_error());
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
                                <li><a href="withdraw.php"><p class="text-primary">WithDraw</p></a></li>
                                <li class="alert-info"><a href="update.php"><p class="text-primary">Setting</p></a></li>
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

     <form action="update.php" method="post">
         <input type="text" name="up_username" placeholder="Update Username" class="form-control"><br>
         <input type="password" name="up_password" placeholder="Update Password" class="form-control"><br>
         <input type="submit" name="update" value="U p d a t e" class="btn btn-info btn-block">
     </form>
     
       <?php
           if (isset($_POST["up_username"]) && isset($_POST["up_password"])){
			
                 $up_username=$_POST['up_username'];
                 $up_pwd=$_POST['up_password'];
                 $up_password=md5($up_pwd);

			     if(!empty($up_username) && !empty($up_pwd)){
				
                    $query = "UPDATE accounts SET username = '$up_username', password = '$up_password' WHERE accountnumber = '$act_num'";
                    mysql_query($query) or die(mysql_error());
					header("Location:balance_info.php");
				 }
				 else
				    echo 'you must supply a username or password';

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