<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 13.11.2018
 * Time: 15:50
 */

session_start();
include 'function.php';

$host = 'localhost';
$db   = 'tacksod';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


if($_GET['action'] == 'logout'){
    unset($_SESSION['userType']);
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php">';
}
if($_GET['action'] == 'delete'){
    deleteData($pdo,$_GET[id]);
}
if(isset($_GET['sort'])){
    switch ($_GET['sort']){
        case 'authorName':
            $data = getData($pdo,'name',ASC);
            break;
        case 'authorEmail':
            $data = getData($pdo,'email',ASC);
            break;
        case 'authorDate':
            $data = getData($pdo,'date');
         break;
    }
}else{
    $data = getData($pdo,'date');
}

if($_POST){
    if($_POST['userName']){
        login($_POST);
    }elseif($_POST['name']){

        if($_FILES['image']['name']){
            move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$_FILES['image']['name']);
            $dataMass = array($_POST['name'],$_POST['email'], $_POST['text'],$_FILES['image']['name'],date('Y-m-d H:i:s'));
        }
        else{
            $dataMass = array($_POST['name'],$_POST['email'], $_POST['text'],'no-img.jpg',date('Y-m-d H:i:s'));
        }
        addData($pdo,$dataMass);
    }
}
