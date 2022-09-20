<?php require_once 'baglan.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="marka.css">
    <title>Anasayfa</title>
  </head>
  <body>
  <nav class=" navbar bg-dark navbar-dark navbar-expand-sm fixed-top">
      <div class="container ">
        <h1  style="color: white;" >Marka</h1>

      <div class="collapse navbar-collapse justify-content-end ">
      

        <ul class="navbar-nav"> 
          <li class="nav-item">
            <a href="anasayfa.php" class="nav-link active"> Anasayfa</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="list-style: none; color: white;">
              Bakım Yönetim
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="yedekparca.php"> Yedek Parça Yönetimi</a></li>
              <li><a class="dropdown-item" href="envanter.php">Envanter Yönetimi</a></li>
             
            </ul>
          </li>
        </ul>
        
        <ul class="navbar-nav"> 
          <li class="nav-item">
            <a href="ozellikler.php" class="nav-link active"> Özellikler</a>
          </li>
        </ul>

        
        <ul class="navbar-nav"> 
          <li class="nav-item">
            <a href="destek.php" class="nav-link active">Destek </a>
          </li>
        </ul>

        
        <ul class="navbar-nav "> 
          <li class="nav-item">
            <a href="kimiz.php" class="nav-link active">Biz Kimiz?</a>
          </li>
        </ul>

        
      </div>


        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Kullanıcı
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="temell.php">Yönetim</a></li>
            <li><a class="dropdown-item" href="kul_bilgi.php">Bilgiler</a></li>
            <li><a class="dropdown-item" href="gidenemir.php">Emir</a></li>
            <li><a class="dropdown-item" href="#">Çıkış</a></li>
          </ul>
        </div>

      </div>


    </nav>
    <div class=" mt-5" style="padding: 10px;">
                <?php 
                  
                  error_reporting(0); 
                      
                          if ($_GET['durum']=="ok") {?>
                              
                          <b style="color:green; margin-left:600px; top:200px;"></b>

                          <?php } elseif ($_GET['durum']=="no") {?>

                          <b style="color:red;  margin-left:600px; margin-top:200px;"></b>

                          <?php }
                          ?>
                  <form action="islem1.php" method="POST">
                  <?php 
                  
                  error_reporting(0); 
                      
                          if ($_GET['durum']=="ok") {?>
                              
                          <b style="color:green; margin-left:600px; top:200px;">İŞLEM BAŞARILI</b>

                          <?php } elseif ($_GET['durum']=="no") {?>

                          <b style="color:red;  margin-left:600px; margin-top:200px;">İŞLEM BAŞARISIZ</b>

                          <?php }
                          ?>
                      <table border="1" id="" style="width:40%px; margin-left: 450px; margin-top:50px; background-color:silver;">
                      <tr><td>Parça ID:<td><input style="width:254px; text-align:center;" type="number" name="parcaID" placeholder="Parça ID Giriniz..">
                      </td></tr>
                      <tr><td>Parça Adı:<td>  <input  type="string" style="width:254px; text-align:center;" name="parcaAd" placeholder="Parça Adını Giriniz..">
                      </td></tr>
                      <tr><td>Parça Sayisi:<td><input style="width:250px; text-align:center;" type="number" required="" name="parcaSayisi" placeholder="Parça Sayısını Giriniz..."></td></tr>
                      <tr>
                      <td></td>
                      <td><button type="submit" name="ekle" style=" width: 70px;
                                                                              height: 30px;
                                                                              margin-left:54px;
                                                                              background-color:white;
                                                                              border-style: solid;
                                                                              border-color: black;
                                                                              border-radius: 2px;" >Kaydet</button> 
                                                                              <button style=" width: 70px;
                                                                                              height: 30px;
                                                                                              
                                                                                              background-color:white;
                                                                                              border-style: solid;
                                                                                              border-color: black;
                                                                                              border-radius: 2px;" type="reset">Temizle</button></td>
                      </tr>
                      </table>

                    </form>
          <table border="2" id="" style="width:60%; margin-top:15px; margin-left:250px; background-color:silver; ">
                            <tr> 
                                <th>Sıra No</th>
                                <th>Parca ID</th>
                                <th>Parça Adı</th>
                                <th>Parça Sayısı</th>
                                <th>İşlemler</th>

                                
                            </tr> 
                            <!-- verileri tabloya listeleme -->
                            <?php
                            $bilgiSor=$db->prepare("SELECT * from yedekparca");
                            $bilgiSor->execute();

                            $say=0;
                            while($bilgiCek=$bilgiSor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>

                            <tr style="color:black; font-size:15px; border-width: 2px;">
                                <td ><?php echo $say; ?></td>
                                <td ><?php echo $bilgiCek['parcaID'] ?></td>
                                <td ><?php echo $bilgiCek['parcaAd'] ?></td>
                                <td ><?php echo $bilgiCek['parcaSayisi'] ?></td>
                                <td ><a href="duzenle.php?parcaID=<?php echo $bilgiCek['parcaID'] ?>"><button>Düzenle</button></td></a>
                            </tr>

                            <?php } ?>
                        
                    </table>
          </tbody>
    </div>







    <footer class="  text-center   text-light ">
      <div class="fixed-bottom bg-dark  ">
        <h4 class="text-white">Telif Hakları Saklıdır.</h4>
      </div>
    </footer>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>