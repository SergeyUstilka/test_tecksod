<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 14.11.2018
 * Time: 11:20
 */

function getData($pdo, $orderBy= 'date', $orderType='DESC'){
    $stmt =$pdo->query('SELECT * from review ORDER BY '.$orderBy.' '.$orderType);
    $data = $stmt->fetchAll();
    return $data;
}

function addData($pdo, $data){
    $stmt = $pdo->prepare("INSERT INTO review  (`name`, `email`, `text`, `img`,`date`) VALUES (?,?,?,?,?)");
    $stmt->execute($data);
    return $stmt;
}


function login($data){
    if($data['userName'] == 'admin' && $data['userPassword'] == '123'){
        $_SESSION['userType'] = 1;
    }
}

function deleteData($pdo,$id){
    $stmt = $pdo->prepare('DELETE  FROM review WHERE id = ?');
    $stmt->execute(array($id));
}