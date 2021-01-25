<?php
include '../inc/header.php';
Session::CheckSession();

?>

<?php

if (isset($_GET['id'])) {
    $klantid = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $updateKlant = $klant->updateKlantByKlantIdInfo($klantid, $_POST);

}
if (isset($updateKlant)) {
    echo $updateKlant;
}




?>

<div class="card ">
    <div class="card-header">
        <h3>Customer Profile <span class="float-right"> <a href="klantlijst.php" class="btn btn-primary">Back</a> </h3>
    </div>
    <div class="card-body">

        <?php
        $getKinfo = $klant->getKlantInfoByKlantid($klantid);
        if ($getKinfo) {


            ?>


            <div style="width:600px; margin:0px auto">

                <form class="" action="" method="POST">
                    <div class="form-group">
                        <label for="klantnaam">Naam</label>
                        <input type="text" name="klantnaam" value="<?php echo $getKinfo->klantnaam; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="klantachternaam">achternaam</label>
                        <input type="text" name="klantachternaam" value="<?php echo $getKinfo->klantachternaam; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="klantadres">Adres</label>
                        <input type="text" name="klantadres" value="<?php echo $getKinfo->klantadres; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="klantemail">Email</label>
                        <input type="text" name="klantemail" value="<?php echo $getKinfo->klantemail; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="klanttelefoonnummer">Phone Number</label>
                        <input type="text" name="klanttelefoonnummer" value="<?php echo $getKinfo->klanttelefoonnummer; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="klantpostcode">zip Code</label>
                        <input type="text" name="klantpostcode" value="<?php echo $getKinfo->klantpostcode; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="klantplaats">residence</label>
                        <input type="text" name="klantplaats" value="<?php echo $getKinfo->klantplaats; ?>" class="form-control">
                    </div>
                    <?php if (Session::get("roleid") == '1') { ?>


                    <?php }else{?>
                        <input type="hidden" name="roleid" value="<?php echo $getKinfo->roleid; ?>">
                    <?php } ?>

                    <?php if (Session::get("id") == $getKinfo->id) {?>


                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <a class="btn btn-primary" href="../login/changepass.php?id=<?php echo $getKinfo->id;?>">Password change</a>
                        </div>
                    <?php } elseif(Session::get("roleid") == '1') {?>



                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-success">Update</button>

                        </div>

                    <?php   }else{ ?>
                        <div class="form-group">

                            <a class="btn btn-primary" href="klantlijst.php">Ok</a>
                        </div>
                    <?php } ?>


                </form>
            </div>

        <?php }else{

            header('Location:AfspraakLijst.php');
        } ?>



    </div>
</div>


<?php
include '../inc/footer.php';

?>
