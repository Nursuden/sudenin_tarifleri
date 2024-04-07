<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head> 
  <body>
   
    <?php 
    include('baglantim.php');
    include('function.php');
    include('navbar.php');
    include('mail.php');

    
    ?>
    <div class="mx-auto" style="width: 700px;">
        <h1>Üyelik Formu</h1>
      </div>

    <div class="container">
        
        <div id="sonuc" class="alert alert-success" role="alert" style="display:none">
        This is a success alert—check it out!
        </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ekle</button>
    <button type="button" class="btn btn-primary" id="deneme" onclick="tiklandi()">Deneme</button>
    <button type="button" class="btn btn-primary" id="deneme2" >Deneme 2 </button>
    <button type="button" class="btn btn-primary" id="deneme3" onclick="dataGetir(29)">29 getir </button>
    <table class="table  table-hover" id="datatable" >
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Adı</th>
          <th scope="col">Soyadı</th>
          <th scope="col">email</th>
          <th scope="col">cep_telefonu</th>
          <th scope="col">şifre</th>
         <th scope="col">İşlem</th>
        </tr>
      </thead>
      <tbody id="tablo_govde">
       

         
      </tbody>
  </table>
    </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="uyelikForm">
        <div class="form-row">
          <div class="col">
            <label for="name">İsim</label>
            <input type="text" name="adi" id="adi" class="form-control" placeholder="İsim">
          </div>
          <div class="col">
            <label for="name">Soyisim</label>
            <input type="text" name="soyadi" id="soyadi" class="form-control" placeholder="Soyisim">
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" name="email" id="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="tel">Cep Telefonu</label>
          <input type="tel" name="cep_telefonu" id="cep_telefonu" class="form-control" id="tel" placeholder="Cep Telefonu">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Sifre</label>
          <input type="password" name="sifre" id="sifre" class="form-control" id="inputPassword4" placeholder="Sifre">
        </div>
      </div><br>
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Üye Ol</button>

      </div>
      </form>
    </div>
  </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
   
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    

    <script type="text/javascript"> 

    // Burası çalışmıyor şu anda 
 

    // bak bu # işareti buraya özgü bir şey yani yukarıdaki idyi alabilmek için o sebepten yukarı sadece adını ver dopry  burası tarifekle ismiyle aynı sorun olur mu olm
        $("#uyelikForm").submit(function(e) {

            console.log('Form Gönderiliyor');
        $.ajax({
               type: "POST",
               url: 'uyeler.php',
               data: $("#uyelikForm").serialize(), // formdaki tüm bilgileri gönder.
               dataType:'json',
               success: function(data)
               {
                   console.log(data); // Gelen Cevap
                //    alert(data.kullanici_id);
                //$("#exampleModal").modal().hide();
                // $('#exampleModal').modal('hide');
                $("#exampleModal .close").click();
                $('#sonuc').show();


                Swal.fire({
                title: 'Başarılı',
                text: 'Do you want to continue',
                icon: 'success',
                confirmButtonText: 'Cool',
                timer: 1500
                })

                // location.reload();
                uyeGetir()
               
                
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
        
        });

// deneme olna
    function tiklandi(){
      alert('Tıklandı');
    }

//deneme2 için olan

// $("#deneme2").click(function(){
//   alert("The paragraph was clicked.");
// });

//let deneme2 = document.getElementById('deneme2')


document.addEventListener("DOMContentLoaded", function(event) { 
  uyeGetir()
  uye_adi.innerText = 'Hoşgeldiniz Suden Hanım'

  
});


deneme2.addEventListener('click',uyeGetir)

//   deneme2.addEventListener('click',function(){
//     axios
//     .get("uyeler.php")
//     .then((response) => {
//       const users = response.data;


//     users.forEach(function(value, index, array) {
//         console.log(value.adi);
//         tablo_govde.innerHTML +=`<tr>
//                                 <td>${value.id}</td>    
//                                 <td>${value.adi}</td>    
//                                 <td>3</td>    
//                                 <td>4</td>    
//                                 <td>5</td>    
//                                 <td>6</td>    
//                                 <td>7</td>    
//                                 </tr>`
//     // index ve array kullanmak opsiyoneldir
//     })

//       console.log(`GET users`, users);
 
//     })
//     .catch((error) => console.error(error))
//   })

  function uyeGetir(){
    axios
    .get("uyeler.php?siralama=BK")
    .then((response) => {
        console.log(response.data);
      const users = response.data;
      tablo_govde.innerHTML = ''; 
      users.forEach(function(value, index, array) {
        console.log(value.adi);
        
        tablo_govde.innerHTML +=`<tr>
                                <td>${value.id}</td>    
                                <td>${value.adi}</td>    
                                <td>${value.soyadi}</td>    
                                <td>${value.email}</td>    
                                <td>${value.cep_telefonu}</td>    
                                <td>${value.sifre}</td>    
                                <td><button type="button" onclick="dataGetir(${value.id})" class="btn btn-primary" id="${value.id}" >İncele</button></td>    
                                <td><button type="button" onclick="dataSil(${value.id})" class="btn btn-primary" id="${value.id}" >Sil</button></td> 
                                </tr>`
    // index ve array kullanmak opsiyoneldir
    })

      console.log(`GET users`, users);
      setTimeout(() => {
        $('#sonuc').fadeOut();
        }, 3000);

 
    })
    .catch((error) => console.error(error))

  }

  function dataGetir(id){
  //  alert(id);
    axios
    .get("uyeler.php?id=" +id)
    .then((response) => {
        console.log(response.data);
      const users = response.data;
      
     uye_adi.innerText=response.data[0].adi;
     adi.value = response.data[0].adi;
     soyadi.value = response.data[0].soyadi;
     email.value = response.data[0].email;
     cep_telefonu.value = response.data[0].cep_telefonu;
     sifre.value = response.data[0].sifre;

     $('#exampleModal').modal("show");
  

 
    })
    .catch((error) => console.error(error))
  }


  
  function dataSil(id){

    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    axios
    .delete("uyeler.php",{data: {id}})
        //res.data.json; // { answer: 42 }
    .then((response) => {
        console.log(response.data);
      const users = response.data;
      uyeGetir()
      Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
    })
    .catch((error) => console.error(error))



   
  }
});



  //  alert(id);
 
  }






        </script>

  </body>
</html>