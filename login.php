<?php

  //error_reporting(E_ALL);
  //ini_set('display_errors', 1);
  include("includes/auth.inc.php");
  session_start();
  //var_dump($_POST);
  if(isset($_POST['username']) && isset($_POST['password'])){
    if(login($_POST['username'],$_POST['password'])){
          $_SESSION['admin'] = $_POST['username'];
           header('Location: ./admin.php');
    }else{
          header('Location: ./index.php?login=failed');
    }

  }else{
    header('Location: ./index.php?login=empty');
  }

?>