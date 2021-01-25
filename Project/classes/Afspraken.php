<?php

include_once '../lib/Session.php';



class Afspraken
{


    // Db Property
    private $db;

    // Db __construct Method
    public function __construct()
    {
        $this->db = new Database();
    }


    // Check Exist Email Address Method
    public function checkExistEmail($email)
    {
        $sql = "SELECT email from  tbl_afspraken WHERE email = :email";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    // User Registration Method
    public function AfspraakRegistration($data)
    {   $fullname = $data['fullname'];
        $email =$data['email'];
        $phone = $data['phone'];
        $reason = $data['reason'];
        $date = $data['date'];


        if ($fullname == "" ||$email == "" || $phone == "" || $reason == "" || $date == "") {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul alles volledig in!</div>';
            return $msg;
        }elseif (strlen($fullname) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul Uw volledige Naam in</div>';
            return $msg;
        }elseif (strlen($email) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul uw Email in</div>';
            return $msg;
        }elseif (strlen($phone) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul uw email adres in</div>';
            return $msg;
        }elseif (strlen($reason) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> De reden</div>';
            return $msg;
        }elseif (strlen($date) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> De Datum</div>';
            return $msg;
        } else {

            $sql = 'INSERT INTO tbl_afspraken(fullname, email, phone, reason, date) 
                    VALUES(:fullname, :email, :phone, :reason, :date)';
            $stmt= $this->db->pdo->prepare($sql);
            $stmt->bindValue(':fullname', $fullname);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':reason', $reason);
            $stmt->bindValue(':date', $date);
            $result =   $stmt->execute();
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

    // Add New User By Admin
    public function addNewAfspraakByAdmin($data)
    {   $fullname = $data['fullname'];
        $email =$data['email'];
        $phone = $data['phone'];
        $reason = $data['reason'];
        $date = $data['date'];


        if ($fullname == "" ||$email == "" || $phone == "" || $reason == "" || $date == "") {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul alles volledig in!</div>';
            return $msg;
        }elseif (strlen($fullname) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul Uw volledige Naam in</div>';
            return $msg;
        }elseif (strlen($email) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul uw Email in</div>';
            return $msg;
        }elseif (strlen($phone) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul uw email adres in</div>';
            return $msg;
        }elseif (strlen($reason) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> De reden</div>';
            return $msg;
        }elseif (strlen($date) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> De Datum</div>';
            return $msg;
        } else {

            $sql = 'INSERT INTO tbl_afspraken(fullname, email, phone, reason, date) 
                    VALUES(:fullname, :email, :phone, :reason, :date)';
            $stmt= $this->db->pdo->prepare($sql);
            $stmt->bindValue(':fullname', $fullname);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':reason', $reason);
            $stmt->bindValue(':date', $date);
            $result =   $stmt->execute();
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
    public function selectAllAfspraakData()
    {
        $sql = "SELECT * FROM tbl_afspraken ORDER BY id DESC";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    // Get Single User Information By Id Method
    public function getAfspraakInfoByAfspraakId($afspraakid){
        $sql = "SELECT * FROM tbl_afspraken WHERE id = :id LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':id', $afspraakid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        }else{
            return false;
        }


    }


    //
    public function updateAfspraakByAfspraakIdInfo($afspraakid, $data){
        $fullname = $data['fullname'];
        $email =$data['email'];
        $phone = $data['phone'];
        $reason = $data['reason'];
        $date = $data['date'];


        if ($fullname == "" ||$email == "" || $phone == "" || $reason == "" || $date == "") {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul alles volledig in!</div>';
            return $msg;
        }elseif (strlen($fullname) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul Uw volledige Naam in</div>';
            return $msg;
        }elseif (strlen($email) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul uw Email in</div>';
            return $msg;
        }elseif (strlen($phone) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul uw email adres in</div>';
            return $msg;
        }elseif (strlen($reason) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> De reden</div>';
            return $msg;
        }elseif (strlen($date) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> De Datum</div>';
            return $msg;
        } else{
            $sql = 'UPDATE tbl_afspraken SET
                     fullname = :fullname,
                     email = :email,
                     phone = :phone,
                     reason = :reason,
                     date = :date
                     WHERE id = :id';
            $stmt= $this->db->pdo->prepare($sql);
            $stmt->bindValue(':fullname', $fullname);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':reason', $reason);
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':id', $afspraakid);
            $result =   $stmt->execute();

            if ($result) {
                echo "<script>location.href='AfspraakLijst.php';</script>";
                Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> Wow, Your Information updated Successfully !</div>');



            }else{
                echo "<script>location.href='AfspraakLijst.php';</script>";
                Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> Data not inserted !</div>');


            }


        }


    }




    // Delete User by Id Method
    public function deleteAfspraakById($remove){
        $sql = "DELETE FROM tbl_afspraken WHERE id = :id ";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':id', $remove);
        $result =$stmt->execute();
        if ($result) {
            $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> User account Deleted Successfully !</div>';
            return $msg;
        }else{
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> Data not Deleted !</div>';
            return $msg;
        }
    }








}
