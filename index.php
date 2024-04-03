<?php 
include ('baglantim.php');
include('function.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php include('navbar.php');?>

    <div class="mx-auto" style="width: 700px;">
        <h1 id="baslik">Hoşgeldiniz</h1>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="container">
        <!-- Content here -->
        <img src="..." class="img-fluid" alt="...">

        
        <table class="table  table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">İşlem</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $tarifler = listele('tarifler');

      foreach ($tarifler as $key => $value) {
      
     ?> 
      
    <tr>
      <th scope="row"><?=$value['id']?></th>
      <td><?=$value['kullanici_id']?></td>
      <td><?=$value['tarifin_adi']?></td>
      <td><?=$value['tarif_kategori']?></td>
      <td><a  href="duzenle.php?id=<?=$value['id'] ?>" class="btn btn-primary">İncele</a></td>
    </tr>
   
  <?php } ?>
  </tbody>
</table>

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">
        $("#uyelikForm").submit(function(e) {

            console.log('Form Gönderiliyor');
        $.ajax({
               type: "POST",
               url: 'tarifler.php',
               data: $("#uyelikForm").serialize(), // formdaki tüm bilgileri gönder.
               dataType:'json',
               success: function(data)
               {
                   console.log(data); // Gelen Cevap
                //    alert(data.kullanici_id);
                $('#sonuc').show();

                Swal.fire({
                title: 'Başarılı',
                text: 'Do you want to continue',
                icon: 'success',
                confirmButtonText: 'Cool',
                timer: 1500
                })
                
               },

               error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
                Swal.fire({
                title: 'Hatalı İşlem',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: 'Cool',
                timer: 1500
                })
  }
             });
    
        e.preventDefault(); //Formun sayfa üzerinde gönderilmemesini sağlar
        
        })
        </script>

  </body>
</html>