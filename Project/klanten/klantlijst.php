<?php
include '../inc/header.php';
include '../inc/footer.php';
Session::CheckSession();

$logMsg = Session::get('logMsg');
if (isset($logMsg)) {
    echo $logMsg;
}
$msg = Session::get('msg');
if (isset($msg)) {
    echo $msg;
}
Session::set("msg", NULL);
Session::set("logMsg", NULL);
?>
<?php



if (isset($_GET['remove'])) {
    $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
    $removeKlant = $klant->deleteKlantById($remove);
}

if (isset($removeKlant)) {
    echo $removeKlant;
}
if (isset($_GET['deactive'])) {
    $deactive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['deactive']);
    $deactiveKlantid = $klant->KlantDeactiveByAdmin($deactive);
}

if (isset($deactiveKlantId)) {
    echo $deactiveKlantId;
}
if (isset($_GET['active'])) {
    $active = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['active']);
    $activeKlantid = $klant->KlantActiveByAdmin($active);
}

if (isset($activeKlantid)) {
    echo $activeKlantid;
}


?>
<div class="card ">
    <div class="card-header">
        <h3><i class="fas fa-users mr-2"></i>Klanten Lijst <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">
<?php
$KlantNaam = Session::get('Klantnaam');
if (isset($KlantNaam)) {
    echo $KlantNaam;
}

?></span>

          </strong></span></h3>
    </div>
    <div class="card-body pr-2 pl-2">

        <table id="example" class="table table-striped table-bordered" style="width:101%">

            <thead>
            <tr>
                <th  class="text-center">SL</th>
                <th  class="text-center">Name Customer</th>
                <th  width='10%' class="text-center">Lastname</th>
                <th  class="text-center">Adres</th>
                <th  class="text-center">Email-Adres</th>
                <th  class="text-center">Phone Number</th>
                <th  class="text-center">zip code</th>
                <th  class="text-center">residence</th>
                <th  width='25%' class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $allKlant = $klant->selectAllKlantData();

            if ($allKlant) {
                $i = 0;
                foreach ($allKlant as  $value) {
                    $i++;

                    ?>

                    <tr class="text-center"
                        <?php if (Session::get("id") == $value->id) {
                            echo " ";
                        } ?>
                    >

                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->klantnaam; ?>
                        <td><?php echo $value->klantachternaam; ?> <br></td>
                        <td><span class='text-black'><?php echo $value->klantadres; ?></span></td>

                        <td><span class='text-black'><?php echo $value->klantemail; ?></td>

                        <td><span class='text-black'><?php echo $value->klanttelefoonnummer; ?></td>

                        <td><span class=' text-black'><?php echo $value->klantpostcode; ?></span></td>

                        <td><span class='text-black'><?php echo $value->klantplaats; ?></span></td>

                        <td>
                            <?php if ( Session::get("roleid") == '1' ) {?>
                                <a class="btn btn-success btn-sm
                            " href="KlantData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm " href="KlantData.php?id=<?php echo $value->id;?>">Edit</a>
                                <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                    <?php if (Session::get("id") == $value->id) {
                                    echo "disabled";
                                } ?>
                             btn-sm " href="?remove=<?php echo $value->id;?>">Remove</a>




                            <?php  }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '2'){ ?>
                                <a class="btn btn-success btn-sm " href="KlantData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm " href="KlantData.php?id=<?php echo $value->id;?>">Edit</a>
                            <?php  }elseif( Session::get("roleid") == '2'){ ?>
                                <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                                    echo "disabled";
                                } ?>
                          " href="KlantData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm
                          <?php if ($value->roleid == '1') {
                                    echo "disabled";
                                } ?>
                          " href="KlantData.php?id=<?php echo $value->id;?>">Edit</a>
                            <?php }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '3'){ ?>
                                <a class="btn btn-success btn-sm " href="KlantData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm " href="KlantData.php?id=<?php echo $value->id;?>">Edit</a>
                            <?php }else{ ?>
                                <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                                    echo "disabled";
                                } ?>
                          " href="KlantData.php?id=<?php echo $value->id;?>">View</a>

                            <?php } ?>

                        </td>
                    </tr>
                <?php }}else{ ?>
                <tr class="text-center">
                    <td>Geen klanten Beschikbaar!</td>
                </tr>
            <?php } ?>

            </tbody>

        </table>









    </div>
</div>



<?php
include '../inc/footer.php';

?>
