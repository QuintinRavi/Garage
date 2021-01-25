<?php
include '../inc/header.php';
Session::CheckSession();
$sId =  Session::get('roleid');
if ($sId === '1') { ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addAuto'])) {

        $autoAdd = $Auto->addNewAutoByAdmin($_POST);
    }

    if (isset($autoAdd)) {
        echo $autoAdd;
    }


    ?>




    <div class="card ">
        <div class="card-header">
            <h3 class='text-center'>voeg nieuwe Auto toe</h3>
        </div>
        <div class="cad-body">



            <div style="width:600px; margin:0px auto">

                <form class="" action="" method="post">
                    <div class="form-group pt-3">
                        <label for="eigenaar">eigenaar id</label>
                        <input type="text" name="eigenaar"  class="form-control">
                    </div>
                    <div class="form-group pt-3">
                        <label for="autokenteken">autokenteken</label>
                        <input type="text" name="autokenteken"  class="form-control">
                    </div>
                    <div class="form-group pt-3">
                        <label for="automerk">automerk </label>
                        <input type="text" name="automerk"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="autotype">autotype</label>
                        <input type="text" name="autotype"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="autokmstand">autokmstand</label>
                        <input type="text" name="autokmstand"  class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addAuto" class="btn btn-success">Register</button>
                    </div>


                </form>
            </div>


        </div>
    </div>

    <?php
}else{

    header('Location:../login/AfspraakLijst.php');



}
?>

<?php
include '../inc/footer.php';

?>