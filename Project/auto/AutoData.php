<?php
include '../inc/header.php';
Session::CheckSession();

?>

<?php

if (isset($_GET['id'])) {
    $autoid = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $updateAuto = $Auto->updateAutoByAutoIdInfo($autoid, $_POST);

}
if (isset($updateAuto)) {
    echo $updateAuto;
}




?>

<div class="card ">
    <div class="card-header">
        <h3>Car Profile <span class="float-right"> <a href="autolijst.php" class="btn btn-primary">Back</a> </h3>
    </div>
    <div class="card-body">

        <?php
        $getAinfo = $Auto->getAutoInfoByAutoid($autoid);
        if ($getAinfo) {


            ?>


            <div style="width:600px; margin:0px auto">

                <form class="" action="" method="POST">
                    <div class="form-group">
                        <label for="eigenaar">Eigenaar ID</label>
                        <input type="text" name="eigenaarid" value="<?php echo $getAinfo->eigenaar; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="autokenteken">auto kenteken</label>
                        <input type="text" name="autokenteken" value="<?php echo $getAinfo->autokenteken; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="automerk">Auto Merk</label>
                        <input type="text" name="automerk" value="<?php echo $getAinfo->automerk; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="autotype">Type auto</label>
                        <input type="text" name="autotype" value="<?php echo $getAinfo->autotype; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="autokmstand">Km Stand</label>
                        <input type="text" name="autokmstand" value="<?php echo $getAinfo->autokmstand; ?>" class="form-control">
                    </div>
                    <?php if (Session::get("roleid") == '1') { ?>


                    <?php }else{?>
                        <input type="hidden" name="roleid" value="<?php echo $getAinfo->roleid; ?>">
                    <?php } ?>

                    <?php if (Session::get("id") == $getAinfo->id) {?>


                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <a class="btn btn-primary" href="../login/changepass.php?id=<?php echo $getAinfo->id;?>">Password change</a>
                        </div>
                    <?php } elseif(Session::get("roleid") == '1') {?>



                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-success">Update</button>

                        </div>

                    <?php   }else{ ?>
                        <div class="form-group">

                            <a class="btn btn-primary" href="autolijst.php">Ok</a>
                        </div>
                    <?php } ?>


                </form>
            </div>

        <?php }else{

            header('Location:autolijst.php');
        } ?>



    </div>
</div>


<?php
include '../inc/footer.php';

?>
