<?php
    require('connect.php');
    
    if(mysqli_ping( $dbc )) {
      echo 'Mysql server connected '.mysqli_get_host_info($dbc);
      var_dump($dbc);
	  }  
?>