<?php
include '../inc/header.php';


if (isset($_GET['remove'])) {
    $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
    $removeAuto = $Auto->deleteAutoById($remove);
}

if (isset($removeAuto)) {
    echo $removeAuto;
}
if (isset($_GET['deactive'])) {
    $deactive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['deactive']);
    $deactiveId = $Auto->AutoDeactiveByAdmin($deactive);
}

if (isset($deactiveId)) {
    echo $deactiveId;
}
if (isset($_GET['active'])) {
    $active = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['active']);
    $activeId = $Auto->AutoActiveByAdmin($active);
}

if (isset($activeId)) {
    echo $activeId;
}


?>
<div class="card ">
    <div class="card-header">
        <h3><i class="fas fa-users mr-2"></i>Auto Lijst <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">
<?php
$eigenaar = Session::get('eigenaar');
if (isset($eigenaar)) {
    echo $eigenaar;
}

?></span>

          </strong></span></h3>
    </div>
    <div class="card-body pr-2 pl-2">

        <table id="example" class="table table-striped table-bordered" style="width:100%">

            <thead>
            <tr>
                <th  class="text-center">ID</th>
                <th  class="text-center">Eigenaar</th>
                <th  class="text-center">Auto Kenteken</th>
                <th  class="text-center">Auto Merk</th>
                <th  class="text-center">Auto Type</th>
                <th  class="text-center">Auto KmStand</th>
                <th  width='25%' class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $allAuto = $Auto->selectAllAutoData();

            if ($allAuto) {
                $i = 0;
                foreach ($allAuto as  $value) {
                    $i++;

                    ?>

                    <tr class="text-center"
                        <?php if (Session::get("id") == $value->id) {
                            echo "style='background:#d9edf7' ";
                        } ?>
                    >

                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->eigenaar; ?> <br>
                        <td><?php echo $value->autokenteken; ?> <br>
                        <td><?php echo $value->automerk; ?></td>
                        </td>
                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $value->autotype; ?></span></td>

                        <td><?php echo $value->autokmstand; ?></td>


                        <td>
                            <?php if ( Session::get("roleid") == '1' ) {?>
                                <a class="btn btn-success btn-sm
                            " href="AutoData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm " href="AutoData.php?id=<?php echo $value->id;?>">Edit</a>
                                <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                    <?php if (Session::get("id") == $value->id) {
                                    echo "disabled";
                                } ?>
                             btn-sm " href="?remove=<?php echo $value->id;?>">Remove</a>



                            <?php  }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '2'){ ?>
                                <a class="btn btn-success btn-sm " href="AutoData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm " href="AutoData.php?id=<?php echo $value->id;?>">Edit</a>
                            <?php  }elseif( Session::get("roleid") == '2'){ ?>
                                <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                                    echo "disabled";
                                } ?>
                          " href="AutoData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm
                          <?php if ($value->roleid == '1') {
                                    echo "disabled";
                                } ?>
                          " href="AutoData.php?id=<?php echo $value->id;?>">Edit</a>
                            <?php }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '3'){ ?>
                                <a class="btn btn-success btn-sm " href="AutoData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm " href="AutoData.php?id=<?php echo $value->id;?>">Edit</a>
                            <?php }else{ ?>
                                <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                                    echo "disabled";
                                } ?>
                          " href="../login/profile.php?id=<?php echo $value->id;?>">View</a>

                            <?php } ?>

                        </td>
                    </tr>
                <?php }}else{ ?>
                <tr class="text-center">
                    <td>Geen Auto's Beschikbaar!</td>
                </tr>
            <?php } ?>

            </tbody>

        </table>









    </div>
</div>



<?php
include '../inc/footer.php';

?>
