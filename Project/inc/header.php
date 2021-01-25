<?php
$filepath = realpath(dirname(__FILE__));
include $filepath."/../lib/Database.php";
include $filepath."/../lib/Session.php";
include $filepath."/../classes/Users.php";
include $filepath."/../classes/Klant.php";
include $filepath."/../classes/Auto.php";
include $filepath."/../classes/Afspraken.php";
Session::init();



spl_autoload_register(function($classes){

  include 'classes/'.$classes.".php";

});
$afspraken = new Afspraken();
$Auto  = new Auto();
$klant = new klant();
$users = new Users();

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/bootstrap.min.scss">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/dataTables.bootstrap4.min.scss">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  </head>
  <body>

<?php


if (isset($_GET['action']) && $_GET['action'] == 'logout') {
   Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Success !</strong> You are Logged Out Successfully !</div>');
  Session::destroy();
}



 ?>


    <div class="container">

      <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
        <a class="navbar-brand" href="../index.php"><i class="fas fa-home mr-2"></i>Home</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">



          <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('roleid') == '1') { ?>
              <li class="nav-item">
                  <a class="nav-link" href="../login/index.php"><i class="fas fa-users mr-2"></i>User lists </span></a>
              </li>
              <li class="nav-item

              <?php

                          $path = $_SERVER['SCRIPT_FILENAME'];
                          $current = basename($path, '.php');
                          if ($current == 'addUser') {
                            echo " active ";
                          }

                         ?>">

                <a class="nav-link" href="../login/addUser.php"><i class="fas fa-user-plus mr-2"></i>Add user </span></a>
              </li>

            <?php  } ?>
              <?php

              $path = $_SERVER['SCRIPT_FILENAME'];
              $current = basename($path, '.php');
              if ($current == 'addklant') {
                  echo " active ";
              }?>
              <div class="w3-container">
                  <div class="w3-dropdown-click">
                      <button onclick="Klant()" class="w3-button w3-black"><i class="fas fa-users mr-2"></i>Klant</span></button>
                      <div id="Klant" class="w3-dropdown-content w3-bar-block w3-border">
                          <a href="../klanten/klantlijst.php" class="w3-bar-item w3-button"><i class="fas fa-users mr-2"></i>Klant Lijst </span></a>
                          <a href="../klanten/addKlant.php" class="w3-bar-item w3-button"><i class="fas fa-user-plus mr-2"></i>Add Klant </span></a>
                      </div>
                      <button onclick="Auto()" class="w3-button w3-black"><i class="fas fa-users mr-2"></i>Auto</span></button>
                      <div id="Auto" class="w3-dropdown-content w3-bar-block w3-border">
                          <a href="../auto/autolijst.php" class="w3-bar-item w3-button"><i class="fas fa-users mr-2"></i>Auto Lijst </span></a>
                          <a href="../auto/addAuto.php" class="w3-bar-item w3-button"><i class="fas fa-user-plus mr-2"></i>Add Auto </span></a>
                      </div>
                      <button onclick="Afspraak()" class="w3-button w3-black"><i class="fas fa-users mr-2"></i>Afspraken</span></button>
                      <div id="Afspraak" class="w3-dropdown-content w3-bar-block w3-border">
                          <a href="../afspraken/AfspraakLijst.php" class="w3-bar-item w3-button"><i class="fas fa-users mr-2"></i>Afspraken Lijst </span></a>
                          <a href="../afspraken/AddAfspraken.php" class="w3-bar-item w3-button"><i class="fas fa-user-plus mr-2"></i>Add Afspraak </span></a>
                      </div>
                  </div>
              </div>

              <script>
                  function Klant() {
                      var x = document.getElementById("Klant");
                      if (x.className.indexOf("w3-show") == -1) {
                          x.className += " w3-show";
                      } else {
                          x.className = x.className.replace(" w3-show", "");
                      }
                  }
              </script>
              <script>
                  function Auto() {
                      var x = document.getElementById("Auto");
                      if (x.className.indexOf("w3-show") == -1) {
                          x.className += " w3-show";
                      } else {
                          x.className = x.className.replace(" w3-show", "");
                      }
                  }
              </script>
              <script>
                  function Afspraak() {
                      var x = document.getElementById("Afspraak");
                      if (x.className.indexOf("w3-show") == -1) {
                          x.className += " w3-show";
                      } else {
                          x.className = x.className.replace(" w3-show", "");
                      }
                  }
              </script>
              <li class="nav-item
            <?php

              $path = $_SERVER['SCRIPT_FILENAME'];
              $current = basename($path, '.php');
              if ($current == 'profile') {
                  echo "active ";
              }

              ?>

            ">

                  <a class="nav-link" href="../login/profile.php?id=<?php echo Session::get("id"); ?>"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </li>

          <?php }else{ ?>

              <li class="nav-item

              <?php

                          $path = $_SERVER['SCRIPT_FILENAME'];
                          $current = basename($path, '.php');
                          if ($current == 'register') {
                            echo " active ";
                          }

                         ?>">
                <a class="nav-link" href="../login/register.php"><i class="fas fa-user-plus mr-2"></i>Register</a>
              </li>
              <li class="nav-item
                <?php

                    				$path = $_SERVER['SCRIPT_FILENAME'];
                    				$current = basename($path, '.php');
                    				if ($current == 'login') {
                    					echo " active ";
                    				}

                    			 ?>">
                <a class="nav-link" href="../login/login.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
              </li>

          <?php } ?>


          </ul>

        </div>
      </nav>
