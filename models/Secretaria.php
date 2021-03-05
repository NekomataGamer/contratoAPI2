<?php
class Secretaria extends Model{
    public function isLogged(){
        if(isset($_SESSION['secretaria']) && !empty($_SESSION['secretaria'])){
            return true;
        }else{
            return false;
        }
    }

    public function login($email, $pass){
        $sql = "SELECT id FROM admin WHERE email = :email AND pass = :pass";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':pass', md5($pass));
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $_SESSION['secretaria'] = $data['id'];
            return true;
        }else{
            return false;
        }
    }

    public function logout(){
        unset($_SESSION['master']);
        header('Location: '.BASE_URL.'secretaria');
    }
}