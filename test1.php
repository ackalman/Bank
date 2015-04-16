<?php
ob_end_clean();
ob_start();
session_start();

include 'INCLUDE/html_config_link.inc.php';
echo $headsetting;

$dbc = mysql_connect('localhost','root','') or  die("Cant connect :" . mysql_error());
mysql_select_db("bankaccount",$dbc)
or die("Cant connect :" . mysql_error()); 

$username=$_SESSION['username'];
$pwd=$_SESSION['password'];
$actnumber=$_SESSION['accountNum'];
$password=md5($pwd);
$balance=0;

echo '<body>';
include 'INCLUDE/html_config_navbar.inc.php';

        echo '
        <!-- Collection of nav links and other content for toggling -->
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">

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

echo '<B>Your</B><br><br>';
echo '<B>Username</B>:'.''.$username.'<BR>';
echo '<B>Password</B>:'.''.$pwd.'<BR>';
echo '<B>Account number</B>:'.''.$actnumber.'<BR>';
echo '<B>Balance</B>:'.''.$balance.'<BR><BR>';
//echo '<B>click OK to proceed</B>:';
?>
	 

     <form action="test1.php" method="post">
     <input type="submit" name="insert" value="A c k n o w l e d g e" class="btn btn-info btn-block">
     </form>
     
       <?php
           if (isset($_POST["insert"])) 
		     {
                  $query = mysql_query("INSERT INTO `bankaccount`.`accounts` (`id`, `username`, `password`, `accountnumber`, `balance`) VALUE (NULL, '$username', '$password', '$actnumber', '$balance');")
				           or die(mysql_error()); 
				  session_destroy();
				  header("Location:index.php");
			 }

       echo '
                </p>
                </div>
                </div>
                </div>
                </div>
        ';
       ?>



</body>


