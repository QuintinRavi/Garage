<?php
include '../inc/header.php';
Session::CheckLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

    $register = $klant->klantRegistration($_POST);
}

if (isset($register)) {
    echo $register;
}


?>


<div class="card ">
    <div class="card-header">
        <h3 class='text-center'>Klant Registration</h3>
    </div>
    <div class="cad-body">



        <div style="width:600px; margin:0 auto">


            <form class="" action="" method="post">
                <div class="form-group pt-3">
                    <label for="naam">Naam</label>
                    <input type="text" name="naam"  class="form-control">
                </div>
                <div class="form-group pt-3">
                    <label for="achternaam">AchterNaam</label>
                    <input type="text" name="achternaam"  class="form-control">
                </div>
                <div class="form-group pt-3">
                    <label for="adres">Adres </label>
                    <input type="text" name="adres"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefoonnummer">Mobile Number</label>
                    <input type="text" name="telefoonnummer"  class="form-control">
                </div>
                <div class="form-group pt-3">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode"  class="form-control">
                </div>
                <div class="form-group pt-3">
                    <label for="plaats">Woonplaats</label>
                    <input type="text" name="plaats"  class="form-control">
                    <input type="hidden" name="roleid" value="3" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" id="register" name="register" class="btn btn-success">Register</button>
                </div>


            </form>
        </div>


    </div>
</div>



<?php
include '../inc/footer.php';

?>
