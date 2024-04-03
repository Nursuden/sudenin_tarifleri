<?php
include('baglantim.php');
include('function.php');

$icerik = json_decode(file_get_contents("php://input"));

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        ekle('tarif_gorselleri',$icerik);
        break;

    case 'PUT':
        update('tarif_gorselleri',$icerik->id,$icerik);
        break;
    
    case 'DELETE':
        sil('tarif_gorselleri',$icerik->id);
        break;
    
    case 'GET':
        if(isset($icerik->id)) listele_tek('tarif_gorselleri',$icerik->id);
        else if(isset($_GET['id'])) listele_tek('tarif_gorselleri',$_GET['id']);
        else listele('tarif_gorselleri');

        break;

    default:
        echo 'İşlem seçmediniz!!';
        break;
}





?>