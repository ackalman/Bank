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
                                <li class=""><a href="login.php"><p class="text-primary">LogIn</p></a></li>
                                <li><a href="signup.php"><p class="text-primary">SignUp</p></a></li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                 </div>
        ';

?>


        <div class="container">
        <div class="row">
        <div class="col-sm-12">
        <div class="text-center">

            <p>
            <br><br>
            <a href="login.php" class="btn btn-info btn-block">l o g i n</a>
            <a href="signup.php" class="btn btn-info btn-block">s i g n U p</a>
            </p>

        </div>
        </div>
        </div>
        </div>

<?php
echo '</body>';
ob_end_flush();
?>