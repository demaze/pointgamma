<?php
class User {
    public $login;
    public $mdp;
    public $bar;
    public function setAttr($login, $mdp, $bar){
        $this->login = $login;
        $this->mdp = $mdp;
        $this->bar = $bar;
    }
    
    public function __toString() {
        return $this->login;
    }
    public static function getUser($dbh, $login) {
        $query = "SELECT login, mdp, bar FROM Users WHERE login='$login';";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $request_succeeded = $sth->execute();
        if ($request_succeeded) {
            $user = $sth->fetch();
            $sth->closeCursor();
            return $user;
        }
        return null;
    }
    public static function insertUser($dbh,$user) {
        if (User::getUser($dbh, $user->login) == null) {
            $sth = $dbh->prepare("INSERT INTO Users (`login`, `mdp`, `bar`) VALUES(?,SHA1(?),?);");
            $sth->execute(array($user->login, $user->mdp, $user->bar));
        }
    }
   
    public static function isValidUser($dbh, $login, $mdp) {
        $mdpCrypte = SHA1($mdp);
        $user = User::getUser($dbh, $login);
        if ($user!=null) {
            return ($mdpCrypte == $user->mdp);
        }
        return false;
    }
    public function isPresident($dbh){
        $query = "SELECT * FROM Bars WHERE president=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($this->login));
        while($courant = $sth->fetch()) {
            return true;
        }
        return false;
    }
}
?>