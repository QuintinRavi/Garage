<?php
include '../inc/header.php';
Session::CheckSession();

?>

<?php

if (isset($_GET['id'])) {
    $afspraakid = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $updateAfspraak = $afspraken->updateAfspraakByAfspraakIdInfo($afspraakid, $_POST);

}
if (isset($updateAfspraak)) {
    echo $updateAfspraak;
}




?>

<div class="card ">
    <div class="card-header">
        <h3>Edit the appointment <span class="float-right"> <a href="../afspraken/AfspraakLijst.php" class="btn btn-primary">Back</a> </h3>
    </div>
    <div class="card-body">

        <?php
        $getAFinfo = $afspraken->getAfspraakInfoByAfspraakId($afspraakid);
        if ($getAFinfo) {


            ?>


            <script type="text/javascript">
                function showfield(name){
                    if(name=='Other')document.getElementById('div1').style.display="block";
                    else document.getElementById('div1').style.display="none";
                }

                function hidefield() {
                    document.getElementById('div1').style.display='none';
                }
            </script>

            <div style="width:600px; margin:0px auto">

                <form class="" action="" method="POST">
                    <div class="form-group">
                        <label for="fullname">Naam</label>
                        <input type="text" name="fullname" value="<?php echo $getAFinfo->fullname; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" name="email" value="<?php echo $getAFinfo->email; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" name="phone" value="<?php echo $getAFinfo->phone; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="reason">reason</label>
                        <select name="reason" id="reason"  value="<?php echo $getAFinfo->reason; ?>" class="form-control" onchange="showfield(this.options[this.selectedIndex].value)" required>
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
                            <option value="Spoed">Spoed Prijs op locate bepaald</option>
                        </select>
                    <div class="form-group">
                        <label for="date">date</label>
                        <input type="date" name="date" value="<?php echo $getAFinfo->date; ?>" class="form-control">
                    </div>
                    <?php if (Session::get("roleid") == '1') { ?>


                    <?php }else{?>
                        <input type="hidden" name="roleid" value="<?php echo $getAFinfo->roleid; ?>">
                    <?php } ?>

                    <?php if (Session::get("id") == $getAFinfo->id) {?>


                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <a class="btn btn-primary" href="../login/changepass.php?id=<?php echo $getAFinfo->id;?>">Password change</a>
                        </div>
                    <?php } elseif(Session::get("roleid") == '1') {?>



                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-success">Update</button>

                        </div>

                    <?php   }else{ ?>
                        <div class="form-group">

                            <a class="btn btn-primary" href="../afspraken/AfspraakLijst.php">Ok</a>
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
