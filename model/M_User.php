<?php

include('../model/connect.php');
include('../model/M_User.php');

class M_User{
    private $dbh;  //databasehost

    function __construct()
    {
        $this->dbh = Database::getConnetion();
    }

    //fonction comportant Requete qui affichage de tous les users dans la db //READ
    public function getAllUsers()
    {
        $sth = $this->dbh->prepare("SELECT * FROM user");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_CLASS, 'name');
        return $result;
    }

    //fonction comportant Requete qui affichera chaque user selon son id
    public function getUserById($id)
    {
        $sth = $this->dbh->prepare("SELECT * FROM user WHERE id = :id");
        $sth->execute(array(':id' => $id));
        $sth->setFetchMode(PDO::FETCH_CLASS, 'name');
        $result = $sth->fetch();
        return $result;
    }

    //fonction comportant Requete qui permettra de creer un champ user  //CREATE
    public function createUser($name, $firstname, $age, $tel, $email, $country, $comment, $job, $url)
    {
        $sth = $this->dbh->prepare("INSERT INTO user (name,firstname,age,tel, email, country,comment, job,url) values(:name, :firstname, :age, :tel, :email, :country, :comment, :job, :url)");
        $sth->execute();
        $sth->bindParam(":username", $name);
        $sth->bindParam(":firstname", $firstname);
        $sth->bindParam(":age", $age);
        $sth->bindParam(":tel", $tel);
        $sth->bindParam(":email", $email);
        $sth->bindParam(":country", $country);
        $sth->bindParam(":comment", $comment);
        $sth->bindParam(":job", $job,);
        $sth->bindParam(":url", $url);
        $result = $sth->execute();
        header("Location: ../index.php");
        return $result;
    }

     //fonction comportant Requete qui permettra de mettre a jour un user // UPDATE
    public function updateUser(){
        include('C_update.php');

    // on vérifie nos champs 
    $valid = true;


    }

    //fonction comportant Requete qui permettra de supprimer un user // DELETE
    public function deleteUser(){
        include('C_delete.php');
    }



}


?>