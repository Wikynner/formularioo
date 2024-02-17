<?php
require 'index.php';
$id = filter_input(INPUT_POST,'id');
$desc = filter_input(INPUT_POST,'dsc');
$ses = filter_input(INPUT_POST,'ses');
$dep = filter_input(INPUT_POST,'dep');

if($id && $desc && $ses && $dep){//verificando  os campos do formulario

       $sql = $pdo->prepare("SELECT * FROM  arquivo WHERE id = :id ");
       $sql->bindValue(':id',$id);
       $sql->execute();

    if($sql->rowCont() === 0){
       $sql = $pdo->prepare("INSERT INTO arquivo  (id,dsc,ses,dep) VALUES(:id, :dsc,:ses, :dep)" ); 
       $sql->bindValue(':id',$id);//pegandpo cada valor e substituindo pela variavel preenchida 
       $sql->bindValue(':desc',$desc);
       $sql->bindValue(':ses',$ses);
       $sql->bindValue(':dep',$dep);
       $sql->execute();

       header("location: index.php");
       exit;
    }else {
        header("location: Adicionar.php");
        exit;
    }
} else {
    header("location: Adicionar.php");
}