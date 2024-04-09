<?php

function seflink($text){
	$find = array("/Ğ/","/Ü/","/Ş/","/İ/","/Ö/","/Ç/","/ğ/","/ü/","/ş/","/ı/","/ö/","/ç/");
	$degis = array("G","U","S","I","O","C","g","u","s","i","o","c");
	$text = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/"," ",$text);
	$text = preg_replace($find,$degis,$text);
	$text = preg_replace("/ +/"," ",$text);
	$text = preg_replace("/ /","-",$text);
	$text = preg_replace("/\s/","",$text);
	$text = strtolower($text);
	$text = preg_replace("/^-/","",$text);
	$text = preg_replace("/-$/","",$text);
	return $text;
}
echo seflink("şimdi buradaki tüm türkçe ve özel karakterleri düzelt.");
echo seflink("bulgur pilavı.");

function ekle($table,$gelenveri){ // bu verinin gelmesi lazım artık parametre olarak

    global $Connection;
  
    $array = get_object_vars($gelenveri);

    $sql = sprintf("INSERT INTO %s (%s) VALUES(%s)",$table,implode(", ", array_keys($array)),":" . implode(",:", array_keys($array)));
    $query = $Connection->prepare($sql);
    $query->execute($array); 
    $last_id = $Connection->lastInsertId();

    return $last_id;
    // echo json_encode($last_id); // şimdi bu veriyi gönderelim diyer sayfalardan

    }


function sil($table,$id){
    global $Connection;


    $sql = 'DELETE FROM ' . $table . ' WHERE id=' . $id;
    $query = $Connection->prepare($sql);
    $query->execute(); 

    echo json_encode($id); 
    
}


function listele($table){
    global $Connection;

    $sql = 'SELECT * FROM ' . $table;
    $query = $Connection->prepare($sql);
    $query->execute();

    $Response = $query->fetchAll(PDO::FETCH_ASSOC);

    return $Response;
    // echo json_encode($Response);

}

function listele_tek($table,$id){
    global $Connection;

    $sql = 'SELECT * FROM ' . $table . ' WHERE id= :id'; 
    $query = $Connection->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();

    $Response = $query->fetchAll(PDO::FETCH_ASSOC);

   return $Response;

}




function update($table, $id, $gelenveri) {
    global $Connection;

    $array = get_object_vars($gelenveri);
	
    $columns = array_keys($array);
    $values = array_values($array);
    $sqlString = "";
    for($i=0;$i<count($columns);$i++){
        if($i==count($columns)-1){
            $sqlString .= $columns[$i]." = '".$values[$i]."' ";
        }else{
            $sqlString .= $columns[$i]." = '".$values[$i]."', ";
        }
    }
    $sql = "UPDATE ".$table." SET ".$sqlString." WHERE id=" . $id;
    $query = $Connection->prepare($sql);
    $update = $query->execute();
    
    if ($update) {
        return true;
    } else {
        return false;
    }

}


function listeleBK($table){
    global $Connection;

    $sql = 'SELECT * FROM ' . $table. ' ORDER BY id DESC';
    $query = $Connection->prepare($sql);
    $query->execute();

    $Response = $query->fetchAll(PDO::FETCH_ASSOC);

    return $Response;
    // echo json_encode($Response);

}

