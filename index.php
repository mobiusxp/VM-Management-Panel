<?php
    $title = "Login - Thorium VM Management";
    $curLocation = "login";
    $stylesheets = ["login"];
    include("./includes/header.php");
    /*
    if(isset($_SESSION['admin'])){
        header("Location: admin.php");
    }  
    */

?>

<!--
<head>
	<meta charset="utf-8">
	<title>Index</title>

</head>
<body>
-->
   <div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php 
          if(isset($_GET["login"])){
              echo "<div class=\"alert alert-danger\">";
              if($_GET["login"] == "failed"){
                echo "Invalid credentials";
              }else if($_GET["login"]){
                echo "Dude it's empty";
              }
              echo "</div>";
          }
        ?>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
<!--
</body>
-->
<?php
  include("./includes/footer.php");
?>