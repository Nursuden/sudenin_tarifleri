<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <?php include('navbar.php') ?>

    <div class="mx-auto" style="width: 700px;">
        <h1>Tarif Ekleme Formu</h1>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="container">
        <!-- Content here -->
   

    <form id="uyelikForm">
        <div class="form-group">
          <label for="exampleFormControlInput1">Üye Id</label>
          <input type="number" name="kullanici_id" class="form-control" id="exampleFormControlInput1" placeholder="Id yazınız">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tarifin Adı</label>
            <input type="text" name="tarifin_adi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tarif adı">
            <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kategori Seçiniz</label>
          <select class="form-control" name="tarif_kategori" id="exampleFormControlSelect1">
            <option>Tatlılar</option>
            <option>Çorbalar</option>
            <option>Tuzlular</option>
            <option>Pilavlar</option>
            <option>Kekler</option>
          </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kişi Sayısı</label>
            <select class="form-control" name="kisi_sayisi" id="exampleFormControlSelect1">
              <option>1-4</option>
              <option>5-8</option>
              <option>8-10</option>
              <option>10 dan fazla</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Süresi</label>
            <input type="text" class="form-control" name="tarif_suresi" id="exampleFormControlInput1" placeholder="Süre yazınız">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Malzemeleri yazınız</label>
            <textarea class="form-control" name="malzemeler" id="exampleFormControlTextarea1" rows="7"></textarea>
          </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Tarifinizi yazınız</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Kaydet</button>
      </form>

      <div id="sonuc" style="display: none;">KAYIT BAŞARILI</div>

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