<?php
include('baglantim.php');
include('function.php');

$icerik = json_decode(file_get_contents("php://input"));

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
      // print_r($_POST);

      
      //exit;
      $tarif = array(
        'kullanici_id' => $_POST['kullanici_id'],
        'tarifin_adi' => $_POST['tarifin_adi'],
        'tarif_kategori' => $_POST['tarif_kategori'],
        'kisi_sayisi' => $_POST['kisi_sayisi'],
        'tarif_suresi' => $_POST['tarif_suresi'] ); 
      
       $tarif = ekle('tarifler',(Object) $tarif);
       $malzeme = (Object) array('malzemeler' => $_POST['malzemeler'],'tarif_id' => $tarif);
       
       ekle('tarif_malzemeleri',$malzeme);

        echo json_encode(array('Idniz' => $tarif,'İşlem' => 'Tamamlandı')); // bunu geri gönder

        break;

    case 'PUT':
        update('tarifler',$icerik->id,$icerik);
        break;
    
    case 'DELETE':
        sil('tarifler',$icerik->id);
        break;
    
    case 'GET':
        if(isset($icerik->id)) listele_tek('tarifler',$icerik->id);
        else if(isset($_GET['id'])) listele_tek('tarifler',$_GET['id']);
        else listele('tarifler');

        break;

    default:
        echo 'İşlem seçmediniz!!';
        break;
}





?>