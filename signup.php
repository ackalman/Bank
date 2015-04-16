<?php
ob_start();
session_start();
require 'connection.php';

include 'INCLUDE/html_config_link.inc.php';
echo $headsetting;

echo'<body>';
include 'INCLUDE/html_config_navbar.inc.php';

        echo '
        <!-- Collection of nav links and other content for toggling -->
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="login.php"><p class="text-primary">LogIn</p></a></li>
                                <li class="alert-info"><a href="signup.php"><p class="text-primary">SignUp</p></a></li>
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

if(isset($_POST['username'])&&isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

     if(!empty($username)&&!empty($password))
	 {
          $query = mysql_query('SELECT accountnumber FROM accounts WHERE id=( SELECT max(id) FROM accounts )') 
           or die('Could not connect database' . mysql_error());
            
			$row = mysql_fetch_array($query);
			$new_acct_num = $row['accountnumber'] + 1; 

			$_SESSION['accountNum'] = $new_acct_num;

		 if($query)
		 {
			 echo 'ok';
			 header("Location:test1.php");
		 }
		 else if($query==0)
		    echo 'no account number available';
	 }
	 else
        echo 'You must supply a username and password';

 
}
?> 

<form action="signup.php" method="POST">
    <br>
    <input type="text" name="username" placeholder="Username" class="form-control"><br>
    <input type="password" name="password" placeholder="Password" class="form-control"><br>
    <input type="submit" value="S i g n U p" class="btn btn-info btn-block">
</form>


<?php
        echo '
                </p>
                </div>
                </div>
                </div>
                </div>
        ';

echo '</body>';
ob_end_flush();
?>