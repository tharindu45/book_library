<?php
   $connection=mysqli_connect('localhost','root','','book_detail');
   
   if(mysqli_connect_error())
   {
	   die('database connection failed'.mysqli_connect_error());
   }else{
	  // echo 'connection is successful';
   }
 ?>