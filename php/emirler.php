<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Anasayfa</title>
    <style>
      .tus a:active {
        color: black;
      }

    </style>
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
<!-- içerik -->
    <main class=" ">
      <div class="container mt-5 ">
        <div class="row ">
          
          <div class="col-md-2  mt-5 ">

            <div class="vertical-menu ">
                <a href="gidenemir.php" >Verilen Emirler</a>
                <a href="emirler.php">Gelen Emirler</a>
            </div>


             
          </div>
          <div class="col-md-10 ">
            <div class="card mt-5">
              


              <div class="card-body">
                  <form id="gelen">
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Emiri Veren: </label>
                        <div class="col-5">
                            <input type="text"  >
                        </div>
                    
                    
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">Gelen Emir: </label>
                        <div class="col-5">
                            <input type="text"  >
                        </div>
                    
                    
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">Açıklama: </label>
                        <div class="col-5">
                            <textarea name="aciklama" id="aciklama" cols="70" rows="5"></textarea>
                        </div>
                    
                    
                    </div>



                  </form>


                  
               
              </div>
              
            </div>
            
          </div>

          
        </div>




      </div>




    </main>
    <footer class="  text-center   text-light  page-footer">
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