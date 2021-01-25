<?php

include_once '../lib/Session.php';



class Klant
{


    // Db Property
    private $db;

    // Db __construct Method
    public function __construct()
    {
        $this->db = new Database();
    }


    // Check Exist Email Address Method
    public function checkExistEmail($Klantemail)
    {
        $sql = "SELECT klantemail from  tbl_klant WHERE klantemail = :klantemail";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':klantemail', $Klantemail);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    // User Registration Method
    public function klantRegistration($data)
    {   $Klantnaam = $data['naam'];
        $KlantAchterNaam = $data['achternaam'];
        $Klantadres = $data['adres'];
        $Klantemail = $data['email'];
        $Klanttelefoonnummer = $data['telefoonnummer'];
        $Klantpostcode = $data['postcode'];
        $Klantplaats   = $data['plaats'];
        $roleid = $data['roleid'];

        $checkEmail = $this->checkExistEmail($Klantemail);

        if ($Klantnaam == "" || $KlantAchterNaam == "" || $Klantadres == "" || $Klantemail == "" || $Klanttelefoonnummer == "" || $Klantpostcode == "" || $Klantplaats == "") {
            return '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Input fields must not be Empty !</div>';
        } elseif (strlen($Klantnaam) < 1) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw volledige naam !</div>';
            return $msg;
        } elseif (strlen($KlantAchterNaam) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw volledige achternaam !</div>';
            return $msg;
        } elseif (strlen($Klantadres) < 5) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw volledige adres + huisnummer!</div>';
            return $msg;
        } elseif (filter_var($Klantemail, FILTER_VALIDATE_EMAIL === FALSE)) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Invalid email address !</div>';
            return $msg;
        } elseif ($checkEmail == TRUE) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Email already Exists, please try another Email... !</div>';
            return $msg;
        } elseif (filter_var($Klanttelefoonnummer, FILTER_SANITIZE_NUMBER_INT) == FALSE) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Gebruik alleen Nummers voor uw telefoon nummer!</div>';
            return $msg;
        } elseif (strlen($Klantpostcode) < 4) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw volledige Postcode!</div>';
            return $msg;
        } elseif (strlen($Klantplaats) < 4) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw Woonplaats</div>';
            return $msg;
        } else {

            $sql = 'INSERT INTO tbl_klant(Klantnaam, KlantAchterNaam, Klantadres, Klantemail,Klanttelefoonnummer, Klantpostcode, Klantplaats, roleid) 
                    VALUES(:klantnaam, :klantachternaam, :klantadres, :klantemail, :klanttelefoonnummer, :klantpostcode, :klantplaats, :roleid)';
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':klantnaam', $Klantnaam);
            $stmt->bindValue(':klantachternaam', $KlantAchterNaam);
            $stmt->bindValue(':klantadres', $Klantadres);
            $stmt->bindValue(':klantemail', $Klantemail);
            $stmt->bindValue(':klanttelefoonnummer', $Klanttelefoonnummer);
            $stmt->bindValue(':klantpostcode', $Klantpostcode);
            $stmt->bindValue(':klantplaats', $Klantplaats);
            $stmt->bindValue(':roleid', $roleid);
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

    // Add New User By Admin
    public function addNewKlantByAdmin($data)
    {   $Klantnaam = $data['Klantnaam'];
        $KlantAchterNaam = $data['KlantAchterNaam'];
        $Klantadres = $data['Klantadres'];
        $Klantemail = $data['Klantemail'];
        $Klanttelefoonnummer = $data['Klanttelefoonnummer'];
        $Klantpostcode = $data['Klantpostcode'];
        $Klantplaats   = $data['Klantplaats'];
        $roleid = $data['roleid'];

        $checkEmail = $this->checkExistEmail($Klantemail);

        if ($Klantnaam == "" || $KlantAchterNaam == "" || $Klantadres == "" || $Klantemail == "" || $Klanttelefoonnummer == "" || $Klantpostcode == "" || $Klantplaats == "") {
            return '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Input fields must not be Empty !</div>';
        } elseif (strlen($Klantnaam) < 1) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw volledige naam !</div>';
            return $msg;
        } elseif (strlen($KlantAchterNaam) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw volledige achternaam !</div>';
            return $msg;
        } elseif (strlen($Klantadres) < 5) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw volledige adres + huisnummer!</div>';
            return $msg;
        } elseif (filter_var($Klantemail, FILTER_VALIDATE_EMAIL === FALSE)) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Invalid email address !</div>';
            return $msg;
        } elseif ($checkEmail == TRUE) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Email already Exists, please try another Email... !</div>';
            return $msg;
        } elseif (filter_var($Klanttelefoonnummer, FILTER_SANITIZE_NUMBER_INT) == FALSE) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Gebruik alleen Nummers voor uw telefoon nummer!</div>';
            return $msg;
        } elseif (strlen($Klantpostcode) < 4) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw volledige Postcode!</div>';
            return $msg;
        } elseif (strlen($Klantplaats) < 4) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Schrijf uw Woonplaats</div>';
            return $msg;
        } else {

            $sql = 'INSERT INTO tbl_klant(Klantnaam, KlantAchterNaam, Klantadres, Klantemail,Klanttelefoonnummer, Klantpostcode, Klantplaats, roleid) 
                    VALUES(:klantnaam, :klantachternaam, :klantadres, :klantemail, :klanttelefoonnummer, :klantpostcode, :klantplaats, :roleid)';
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':klantnaam', $Klantnaam);
            $stmt->bindValue(':klantachternaam', $KlantAchterNaam);
            $stmt->bindValue(':klantadres', $Klantadres);
            $stmt->bindValue(':klantemail', $Klantemail);
            $stmt->bindValue(':klanttelefoonnummer', $Klanttelefoonnummer);
            $stmt->bindValue(':klantpostcode', $Klantpostcode);
            $stmt->bindValue(':klantplaats', $Klantplaats);
            $stmt->bindValue(':roleid', $roleid);
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
    public function selectAllKlantData()
    {
        $sql = "SELECT * FROM tbl_klant ORDER BY id DESC";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    // Check User Account Satatus
    public function CheckActiveKlant($email)
    {
        $sql = "SELECT * FROM tbl_klant WHERE email = :email and isActive = :isActive LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':isActive', 1);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    // Get Single User Information By Id Method
    public function getKlantInfoByKlantId($klantid){
        $sql = "SELECT * FROM tbl_klant WHERE id = :id LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':id', $klantid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        }else{
            return false;
        }


    }


    //
    public function updateKlantByKlantIdInfo($klantid, $data){
        $klantnaam = $data['klantnaam'];
        $klantachternaam =$data['klantachternaam'];
        $klantadres = $data['klantadres'];
        $klantemail = $data['klantemail'];
        $klanttelefoonnummer = $data['klanttelefoonnummer'];
        $klantpostcode  = $data['klantpostcode'];
        $klantplaats    = $data['klantplaats'];

        if ($klantnaam == "" ||$klantachternaam == "" || $klantadres == "" || $klantemail == "" || $klanttelefoonnummer == "" || $klantpostcode == "" || $klantplaats == "") {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul alles volledig in!</div>';
            return $msg;
        }elseif (strlen($klantnaam) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul de Voornaam in</div>';
            return $msg;
        }elseif (strlen($klantachternaam) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> vul de achternaam in</div>';
            return $msg;
        }elseif (strlen($klantadres) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> vul het Adres in</div>';
            return $msg;
        }elseif (strlen($klantemail) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul Het email adres in</div>';
            return $msg;
        }elseif (strlen($klanttelefoonnummer) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul het telefoonnummer in</div>';
            return $msg;
        }elseif (strlen($klantpostcode) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul de Postcode in</div>';
            return $msg;
        }elseif (strlen($klantplaats) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Vul de Woonplaats in</div>';
            return $msg;
        } else{
            $sql = 'UPDATE tbl_klant SET
                     klantnaam = :klantnaam,
                     klantachternaam = :klantachternaam,
                     klantadres = :klantadres,
                     klantemail = :klantemail,
                     klanttelefoonnummer = :klanttelefoonnummer,
                     klantpostcode = :klantpostcode,
                     klantplaats = :klantplaats
                     WHERE id = :id';
            $stmt= $this->db->pdo->prepare($sql);
            $stmt->bindValue(':klantnaam', $klantnaam);
            $stmt->bindValue(':klantachternaam', $klantachternaam);
            $stmt->bindValue(':klantadres', $klantadres);
            $stmt->bindValue(':klantemail', $klantemail);
            $stmt->bindValue(':klanttelefoonnummer', $klanttelefoonnummer);
            $stmt->bindValue(':klantpostcode', $klantpostcode);
            $stmt->bindValue(':klantplaats', $klantplaats);
            $stmt->bindValue(':id', $klantid);
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
    public function deleteKlantById($remove){
        $sql = "DELETE FROM tbl_klant WHERE id = :id ";
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
