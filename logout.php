<?php
 session_start();
 unset($_SESSION['user_session']);
 
 if(session_destroy())
 {
  header("Location: login.php");
 }
?>