<?php
 
 include('connection.php');
 
     $query = mysql_query('SELECT accountNum FROM accounts WHERE id=( SELECT max(id) FROM accounts )') 
       or die('Could not connect database' . mysql_error());
   
			$row = mysql_fetch_array($query);
			$new_acct_num = $row['accountNum'] + 1; 
   
   ?>
  