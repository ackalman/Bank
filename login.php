<?php
include 'INCLUDE/html_config_link.inc.php';
echo $headsetting;
?>
<body>


<?php
include 'INCLUDE/html_config_navbar.inc.php';


        echo '
        <!-- Collection of nav links and other content for toggling -->
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="alert-info"><a href="login.php"><p class="text-primary">LogIn</p></a></li>
                                <li><a href="signup.php"><p class="text-primary">SignUp</p></a></li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                 </div>
        ';



        if(isset($_POST['password'])&&isset($_POST['accountnumber']))
        {
        $pwd = $_POST['password'];
        $accountnumber = $_POST['accountnumber'];
        $password=md5($pwd);

        //$_SESSION['pwd'] = $pwd;

             if(!empty($pwd)&&!empty($accountnumber))
             {
                 $query = mysql_query("SELECT * FROM accounts WHERE password ='$password'
                 AND accountnumber ='$accountnumber'")
                 or die(mysql_error());

                 //$data = mysql_fetch_array($query);
                 $query_run=$query;
                 $query_num_rows = mysql_num_rows($query_run);

                 if($query_num_rows==0)
                 {
                 echo 'Invadid information.';
                 }
                 else if($query_num_rows==1)
                 {
                 $data = mysql_fetch_array($query);
                 $test=$data['accountnumber'];
                 $_SESSION['actnum'] = $test;
                 header("Location:home.php");
                 }
             }
             else
             {
             echo 'You must supply a accountnumber and password';
             }
 
        }
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <div class="text-center">


                <form action="home.php" method="POST">
                    <p><br><br>
                    <input type="integer" name="accountnumber" placeholder="Account Number" class="form-control"><br>
                    <input type="password" name="password" placeholder="Password" class="form-control"><br>
                    <input type="submit" value="L o g i n" class="btn btn-info btn-block">
                    </p>
                </form>
        </div>
        </div>
    </div>
</div>
</body>