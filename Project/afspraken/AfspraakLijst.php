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
    $removeAfspraak = $afspraken->deleteAfspraakById($remove);
}

if (isset($removeafspraak)) {
    echo $removeafspraak;
}


?>
<div class="card ">
    <div class="card-header">
        <h3><i class="fas fa-users mr-2"></i>Afspraken Lijst <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">
<?php
$AfspraakNaam = Session::get('fullname');
if (isset($AfspraakNaam)) {
    echo $AfspraakNaam;
}

?></span>

          </strong></span></h3>
    </div>
    <div class="card-body pr-2 pl-2">

        <table id="example" class="table table-striped table-bordered" style="width:101%">

            <thead>
            <tr>
                <th  class="text-center">id</th>
                <th  class="text-center">FullName</th>
                <th  width='10%' class="text-center">Email</th>
                <th  class="text-center">Phone</th>
                <th  class="text-center">Reason</th>
                <th  class="text-center">Date of Appointment</th>
                <th  width='25%' class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $allAfspraak = $afspraken->selectAllAfspraakData();

            if ($allAfspraak) {
                $i = 0;
                foreach ($allAfspraak as  $value) {
                    $i++;

                    ?>

                    <tr class="text-center"
                        <?php if (Session::get("id") == $value->id) {
                            echo " ";
                        } ?>
                    >

                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->fullname; ?> <br></td>
                        <td><span class='text-black'><?php echo $value->email; ?></span></td>

                        <td><span class='text-black'><?php echo $value->phone; ?></td>

                        <td><span class='text-black'><?php echo $value->reason; ?></td>

                        <td><span class=' text-black'><?php echo $value->date; ?></span></td>


                        <td>
                            <?php if ( Session::get("roleid") == '1' ) {?>
                                <a class="btn btn-success btn-sm
                            " href="AfspraakData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm " href="AfspraakData.php?id=<?php echo $value->id;?>">Edit</a>
                                <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                    <?php if (Session::get("id") == $value->id) {
                                    echo "disabled";
                                } ?>
                             btn-sm " href="?remove=<?php echo $value->id;?>">Remove</a>




                            <?php  }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '2'){ ?>
                                <a class="btn btn-success btn-sm " href="AfspraakData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm " href="AfspraakData.php?id=<?php echo $value->id;?>">Edit</a>
                            <?php  }elseif( Session::get("roleid") == '2'){ ?>
                                <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                                    echo "disabled";
                                } ?>
                          " href="AfspraakData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm
                          <?php if ($value->roleid == '1') {
                                    echo "disabled";
                                } ?>
                          " href="AfspraakData.php?id=<?php echo $value->id;?>">Edit</a>
                            <?php }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '3'){ ?>
                                <a class="btn btn-success btn-sm " href="AfspraakData.php?id=<?php echo $value->id;?>">View</a>
                                <a class="btn btn-info btn-sm " href="AfspraakData.php?id=<?php echo $value->id;?>">Edit</a>
                            <?php }else{ ?>
                                <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                                    echo "disabled";
                                } ?>
                          " href="AfspraakData.php?id=<?php echo $value->id;?>">View</a>

                            <?php } ?>

                        </td>
                    </tr>
                <?php }}else{ ?>
                <tr class="text-center">
                    <td>Geen Afspraaken Beschikbaar!</td>
                </tr>
            <?php } ?>

            </tbody>

        </table>









    </div>
</div>



<?php
include '../inc/footer.php';

?>
