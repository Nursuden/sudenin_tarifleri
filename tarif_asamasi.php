<?php
include('baglantim.php');
include('function.php');

$icerik = json_decode(file_get_contents("php://input"));

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        ekle('tarif_asamasi',$icerik);
        break;

    case 'PUT':
        update('tarif_asamasi',$icerik->id,$icerik);
        break;
    
    case 'DELETE':
        sil('tarif_asamasi',$icerik->id);
        break;
    
    case 'GET':
        if(isset($icerik->id)) listele_tek('tarif_asamasi',$icerik->id);
        else if(isset($_GET['id'])) listele_tek('tarif_asamasi',$_GET['id']);
        else listele('tarif_asamasi');

        break;

    default:
        echo 'İşlem seçmediniz!!';
        break;
}





?>