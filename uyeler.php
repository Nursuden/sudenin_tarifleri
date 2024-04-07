<?php
include('baglantim.php');
include('function.php');
include('mail.php');

$icerik = json_decode(file_get_contents("php://input"));


//$_SERVER['REMOTE_ADDR'] // Bunu kullanabilirsiniz..




switch ($_SERVER['REQUEST_METHOD']){
    case 'POST':

        
        $uye = ekle('uyeler',(Object) $_POST); 
        mailGonder($email,$adi); 
       // mailGonder();

        echo json_encode(array('Idniz' => $uye,'İşlem' => 'Tamamlandı'));
        // şimdi ajax senden bir dönüş bekliyor çünkü oraya dedin ki sana json data döndüreceğim ama burada döndürmedin
        // sana json nasıl döner hani içine işlem başarılı yazıyorduk onu bul buraya ekle şimdi dene oldu
       // şimdi sen burada json olarak bekliyorsun ama datayı array olarak gönderiyorsun tariflerdeki gibi düzenle
       // şimdi sana modal göstereceğim vaktin var mı? her zaman


        // log için
        $ipAdresi = $_SERVER['REMOTE_ADDR'];
        //  echo "Ziyaretçinin IP Adresi: " . $ipAdresi;
        $tarayici = $_SERVER['HTTP_USER_AGENT'];
         // echo "Ziyaretçinin Tarayicisi: " . $tarayici; işlem tamam 
         //object niye var 
         // senin ekle fonksiyonun obje alıyor sonra o objeyi diziye çeviriyor 
         // senin postmandaen gönderdiğin de obje(nesne) anladım bn bunu yapamazmışım artık log için de bir çalışman var sayenizde bak izle 
         
         $veri = (Object) ['ipAdresi' => $ipAdresi,'Tarayici' =>$tarayici];

         ekle('log', $veri); // Pardon


        break;

    case 'PUT':
        update('uyeler',$icerik->id,$icerik);
        break;
    
    case 'DELETE':
        sil('uyeler',$icerik->id);
        break;
    
    case 'GET':
        $response;

        if(isset($icerik->id)) $response = listele_tek('uyeler',$icerik->id);
        else if(isset($_GET['id'])) $response = listele_tek('uyeler',$_GET['id']);
        else if(isset($_GET['siralama'])) $response = listeleBK('uyeler');
        else $response = listele('uyeler');
        
        
        echo json_encode($response);

        break;

    default:
        echo 'İşlem seçmediniz!!';
        break;
}





?>