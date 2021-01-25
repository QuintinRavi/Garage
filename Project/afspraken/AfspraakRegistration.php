<?php
$filepath = realpath(dirname(__FILE__));
include $filepath."/../lib/Database.php";
include $filepath."/../lib/Session.php";
include $filepath."/../classes/Users.php";
include $filepath."/../classes/Klant.php";
include $filepath."/../classes/Auto.php";
include $filepath."/../classes/Afspraken.php";
$afspraken = new Afspraken();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerAfspraak'])) {

    $register = $afspraken->AfspraakRegistration($_POST);
}

if (isset($register)) {
    echo $register;
}


?>



<link rel="stylesheet" href="../assets/bootstrap.min.scss">
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/dataTables.bootstrap4.min.scss">
<link rel="stylesheet" href="../main/css%20en%20java/styling.scss">

<div class="topnav">
    <a class="active" href="../index.php">Home</a>
    <a href="../main/info.php">info</a>
    <a href="../main/contact.php">contact</a>
    <a href="../login/index.php">login</a>
    <a href="../afspraken/AfspraakRegistration.php"><strong>Afspraken</strong></a>
</div
<div class="card ">
    <div class="card-header">
        <h3 class='text-center'>Nieuwe Afspraak maken</h3>
    </div>
    <div class="cad-body">

        <div style="width:600px; margin:0px auto">

            <form class="" action="" method="post">
                <div class="form-group pt-3">
                    <label for="fullname">Naam</label>
                    <input type="text" name="fullname"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email"  class="form-control">
                </div>
                <div class="form-group pt-3">
                    <label for="phone">Phone Number </label>
                    <input type="text" name="phone"  class="form-control">
                </div>
                <label for="reason">Reason: </label>
                <br>
                <select name="reason" id="reason"  class="form-control" required>
                    <option value="keuze">Maak Keuze</option>
                    <option value="APKKeuring">APK-keuring $50	</option>
                    <option value="GroteBeurt">Grote beurt €375</option>
                    <option value="KleineBeurt ">Kleine beurt €120</option>
                    <option value="Motorschade">Motorschade repareren €1000 – €1500</option>
                    <option value="Airco">Airco bij laten vullen €75</option>
                    <option value="Remschijven">Remschijven vervangen	 €300 – €400</option>
                    <option value="Remblokken ">Remblokken vervangen	€175 – €250</option>
                    <option value="Uitlaat">Uitlaat vervangen	€250 per segment</option>
                    <option value="Waterpomp ">Waterpomp vervangen	€250 – €300</option>
                    <option value="Distributieriem">Distributieriem vervangen	€300 – €400</option>
                    <option value="Other">Other Sources, Please Specify</option>
                </select>
                <br>

                <div class="form-group pt-3">
                    <label for="date">Kies Datum</label>
                    <input type="date" name="date"   class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="registerAfspraak" class="btn btn-success">Register</button>
                </div>


            </form>
        </div>


    </div>
</div>


