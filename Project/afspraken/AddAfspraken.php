<?php
include '../inc/header.php';
Session::CheckSession();
$sId =  Session::get('roleid');
if ($sId === '1') { ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addafspraak'])) {

        $AfspraakAdd = $afspraken->addNewAfspraakByAdmin($_POST);
    }

    if (isset($AfspraakAdd)) {
        echo $AfspraakAdd;
    }


    ?>

    <div class="card ">
        <div class="card-header">
            <h3 class='text-center'>Nieuwe Afspraak maken</h3>
        </div>
        <div class="cad-body">

            <script type="text/javascript">
                function changeFunc() {
                    var selectBox = document.getElementById("selectBox");
                    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                    if (selectedValue == "not_listed") {
                        $('#textboxes').show();
                    } else {
                        alert("Error");
                        $('#textboxes').hide();
                    }
                }
            </script>

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
                        <select name="reason" id="reason"  class="form-control" onchange="showfield(this.options[this.selectedIndex].value)" required>
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
                        <button type="submit" name="addafspraak" class="btn btn-success">Register</button>
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