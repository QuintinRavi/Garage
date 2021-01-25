<?php

include_once '../lib/Session.php';



class Auto{


    // Db Property
    private $db;

    // Db __construct Method
    public function __construct(){
        $this->db = new Database();
    }


    public function addNewAutoByAdmin($data)
    {   $eigenaar      = $data['eigenaar'];
        $autokenteken  = $data['autokenteken'];
        $automerk      = $data['automerk'];
        $autotype      = $data['autotype'];
        $autokmstand   = $data['autokmstand'];

        if ($eigenaar == "" ||$autokenteken == "" || $automerk == "" || $autotype == "" || $autokmstand == "") {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Please, Car Registration field must not be Empty !</div>';
            return $msg;
        }elseif (strlen($eigenaar) < 1) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Voer  de eigenaar van de auto in</div>';
            return $msg;
        }elseif (strlen($autokenteken) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> vul  de autokenteken in</div>';
            return $msg;
        }elseif (strlen($automerk) < 1) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> vul  het auto merk in</div>';
            return $msg;
        }elseif(strlen($autotype) < 2) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong>vul het auto type in </div>';
            return $msg;
        }elseif(strlen($autokmstand) < 2) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> vul de auto kilometer stand in</div>';
            return $msg;
        } else {

            $sql = 'INSERT INTO tbl_auto(eigenaar, autokenteken, automerk, autotype, autokmstand) 
                           VALUES(:eigenaar, :autokenteken, :automerk, :autotype, :autokmstand)';
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':eigenaar', $eigenaar);
            $stmt->bindValue(':autokenteken', $autokenteken);
            $stmt->bindValue(':automerk', $automerk);
            $stmt->bindValue(':autotype', $autotype);
            $stmt->bindValue(':autokmstand', $autokmstand);
            $result = $stmt->execute();
            if ($result) {
                $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success !</strong> Wow, you have Registered Successfully !</div>';
                return $msg;
            } else {
                $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Something went Wrong !</div>';
                return $msg;
            }


        }


    }


    // Select All User Method
    public function selectAllAutoData(){
        $sql = "SELECT * FROM tbl_auto ORDER BY id DESC";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    // Get Single User Information By Id Method
    public function getAutoInfoByAutoid($Autoid){
        $sql = "SELECT * FROM tbl_auto WHERE id = :id LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':id', $Autoid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        }else{
            return false;
        }
    }

    //
    //   Get Single User Information By Id Method
    public function updateAutoByAutoIdInfo($Autoid, $data){
        $eigenaar      = $data['eigenaar'];
        $autokenteken  = $data['autokenteken'];
        $automerk      = $data['automerk'];
        $autotype      = $data['autotype'];
        $autokmstand   = $data['autokmstand'];

        if ($eigenaar == "" ||$autokenteken == "" || $automerk == "" || $autotype == "" || $autokmstand == "") {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Please, Car Registration field must not be Empty !</div>';
            return $msg;
        }elseif (strlen($eigenaar) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Voer  de eigenaar van de auto in</div>';
            return $msg;
        }elseif (strlen($autokenteken) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> vul  de autokenteken in</div>';
            return $msg;
        }elseif (strlen($automerk) < 1) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> vul  het auto merk in</div>';
            return $msg;
        }elseif(strlen($autotype) < 2) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong>vul het auto type in </div>';
            return $msg;
        }elseif(strlen($autokmstand) < 2) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> vul de auto kilometer stand in</div>';
            return $msg;
        } else{
            $sql = "UPDATE tbl_auto SET
            eigenaar   = :eigenaar,
          autokenteken = :autokenteken,
          automerk = :automerk,
          autotype = :autotype,
          autokmstand = :autokmstand
            WHERE id = :id";
            $stmt= $this->db->pdo->prepare($sql);
            $stmt->bindValue(':eigenaar', $eigenaar);
            $stmt->bindValue(':autokenteken', $autokenteken);
            $stmt->bindValue(':automerk', $automerk);
            $stmt->bindValue(':autotype', $autotype);
            $stmt->bindValue(':autokmstand', $autokmstand);
            $stmt->bindValue(':id', $Autoid);
            $result =   $stmt->execute();

            if ($result) {
                echo "<script>location.href='autolijst.php';</script>";
                Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> Wow, Your Information updated Successfully !</div>');



            }else{
                echo "<script>location.href='autolijst.php';</script>";
                Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> Data not inserted !</div>');


            }


        }


    }
    // Delete User by Id Method
    public function deleteAutoById($remove){
        $sql = "DELETE FROM tbl_auto WHERE id = :id ";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':id', $remove);
        $result =$stmt->execute();
        if ($result) {
            $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Auto Succesvol verwijderdt !</div>';
            return $msg;
        }else{
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> Data not Deleted !</div>';
            return $msg;
        }
    }





}
