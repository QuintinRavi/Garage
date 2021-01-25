<?php
include '../inc/header.php';
Session::CheckSession();
$sId =  Session::get('roleid');
if ($sId === '1') { ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addKlant'])) {

        $klantAdd = $klant->addNewklantByAdmin($_POST);
    }

    if (isset($klantAdd)) {
        echo $klantAdd;
    }


    ?>




    <div class="card ">
        <div class="card-header">
            <h3 class='text-center'>voeg nieuwe klant toe</h3>
        </div>
        <div class="cad-body">



            <div style="width:600px; margin:0px auto">

                <form class="" action="" method="post">
                    <div class="form-group pt-3">
                        <label for="Klantnaam">Naam</label>
                        <input type="text" name="Klantnaam"  class="form-control">
                    </div>
                    <div class="form-group pt-3">
                        <label for="KlantAchterNaam">AchterNaam</label>
                        <input type="text" name="KlantAchterNaam"  class="form-control">
                    </div>
                    <div class="form-group pt-3">
                        <label for="Klantadres">Adres </label>
                        <input type="text" name="Klantadres"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Klantemail">Email address</label>
                        <input type="email" name="Klantemail"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Klanttelefoonnummer">Mobile Number</label>
                        <input type="text" name="Klanttelefoonnummer"  class="form-control">
                    </div>
                    <div class="form-group pt-3">
                        <label for="Klantpostcode">Postcode</label>
                        <input type="text" name="Klantpostcode"  class="form-control">
                    </div>
                    <div class="form-group pt-3">
                        <label for="Klantplaats">Woonplaats</label>
                        <input type="text" name="Klantplaats"  class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="sel1">Select user Role</label>
                            <select class="form-control" name="roleid" id="roleid">
                                <option value="3">Klant</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addKlant" class="btn btn-success">Register</button>
                    </div>


                </form>
            </div>


        </div>
    </div>

    <?php
}else{

    header('Location:AfspraakLijst.php');



}
?>

<?php
include '../inc/footer.php';

?>