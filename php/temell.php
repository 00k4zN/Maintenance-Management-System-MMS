<?php require_once 'baglan.php'; ?>
<?php
$dataPoints1 = array();
try{
$link = new \PDO( "mysql:host=localhost;dbname=bakimyonetim;charset=utf8",'root','',
array(
\PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $link->prepare('SELECT makine.makAd AS x, COUNT(hataliurun.urunID) AS y
FROM makine, hataliurun, urun
WHERE makine.makID=urun.makID AND urun.urunID=hataliurun.urunID
GROUP BY x');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
foreach($result as $row){
array_push($dataPoints1, array("y"=> $row->y, "label"=> $row->x));
}
$link = null;
}
catch(\PDOException $ex){
print($ex->getMessage());
}

$dataPoints2 = array();
try{
$link = new \PDO( "mysql:host=localhost;dbname=bakimyonetim;charset=utf8",'root','',
array(
\PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $link->prepare('SELECT makine.makAd AS x, COUNT(urun.urunID) AS y
FROM makine,urun
WHERE makine.makID=urun.makID
GROUP BY x');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
foreach($result as $row){
array_push($dataPoints2, array("y"=> $row->y, "label"=> $row->x));
}
$link = null;
}
catch(\PDOException $ex){
print($ex->getMessage());
}

$dataPoints3 = array();
try{
$link = new \PDO( "mysql:host=localhost;dbname=bakimyonetim;charset=utf8",'root','',
array(
\PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $link->prepare('SELECT  yedekparca.parcaAd AS x ,yedekparca.parcaSayisi AS y
FROM makine,yedekparca
WHERE makine.parcaID=yedekparca.parcaID
GROUP BY x');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
foreach($result as $row){
array_push($dataPoints3, array("y"=> $row->y, "label"=> $row->x));
}
$link = null;
}
catch(\PDOException $ex){
print($ex->getMessage());
}

$dataPoints4 = array();
try{
$link = new \PDO( "mysql:host=localhost;dbname=bakimyonetim;charset=utf8",'root','',
array(
\PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $link->prepare('SELECT departman.departmanAd AS x, COUNT(bakimpersonel.sicilNo) AS y
FROM departman, bakimpersonel
WHERE departman.departmanID=bakimpersonel.departmanID
group by x');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
foreach($result as $row){
array_push($dataPoints4, array("y"=> $row->y, "label"=> $row->x));
}
$link = null;
}
catch(\PDOException $ex){
print($ex->getMessage());
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Anasayfa</title>
    <style type="text/css">
      #chartContainer2{
      width: 350px;
      height: 300px; 

      }
      #chartContainer3{
        width: 350px;
        height: 300px; 

      }

      #chartContainer{
          width: 350px;
          height: 300px; 

      }
      #chartContainer4{
        width: 350px;
        height: 300px; 

      }
      #table{
        width: 550px;
        height: 300px; 
        margin-top:50px;
       

      }

    </style>
    



    <script>
      window.onload = function () {
            
            var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "dark1", // "light1", "light2", "dark1", "dark2"
            title:{
            text: "Makinelerdeki Hatalı Ürünler "
            },
            data: [{
            type: "bar", //change type to bar, line, area, pie, etc
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }]
            });
            chart.render(); 

            var chart = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "dark1", // "light1", "light2", "dark1", "dark2"
            title:{
            text: "Makine Ölçek"
            },
            data: [{
            type: "column", //change type to bar, line, area, pie, etc
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
            });
            chart.render();   

            
            var chart = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "dark1", // "light1", "light2", "dark1", "dark2"
            title:{
            text: "Makine Yedek Parça Dağılımı"
            },
            data: [{
            type: "pie", //change type to bar, line, area, pie, etc
            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
            }]
            });
            chart.render(); 

             var chart = new CanvasJS.Chart("chartContainer4", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "dark1", // "light1", "light2", "dark1", "dark2"
            title:{
            text: "Departmanlardaki Personel Dağılımı"
            },
            data: [{
            type: "area", //change type to bar, line, area, pie, etc
            dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
            }]
            });
            chart.render();   
      }
  
             
      </script>
      
      
    




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
        <div class="row">

          <div class="col-md-4  mt-5 ">
            <div class="card ">
             <div class="">
                 <div id="chartContainer"></div>
              </div>
  
            </div>

            <div class="card mt-5 ">
             <div class="">
                 <div id="chartContainer4"></div>
              </div>
  
            </div>
            
          
             
          </div>
          
          <div class="col-md-4 mt-5 ">
           
            <div class="card " >
              <div id="chartContainer2">  </div>
            </div>


           
                 <div id="table"  >
                   <table style=" background-color:silver;">
                     
                     <th>Bakım ID</th>
                     <th>Bakım Yapılan Makine</th>
                     <th>Bakım Personeli</th>
                     <th>Tarih</th>
                     <th>Durum</th>

                     <tr>
                     <?php
                            $bilgiSor=$db->prepare("SELECT * from bakim");
                            $bilgiSor->execute();

                            
                            while($bilgiCek=$bilgiSor->fetch(PDO::FETCH_ASSOC)) {  ?>

                            <tr style="color:black; ; border-width: 2px;">
                                
                                <td ><?php echo $bilgiCek['bakimID'] ?></td>
                                <td ><?php echo $bilgiCek['makID'] ?></td>
                                <td ><?php echo $bilgiCek['sicilNo'] ?></td>
                                <td ><?php echo $bilgiCek['bakimTarih'] ?></td>
                                <td ><?php echo $bilgiCek['bakimDurum'] ?></td>
                            </tr>

                            <?php } ?>
                     </tr>
                   </table>
              
  
            </div>

          </div>

          <div class="col-md-4 mt-5 ">
           
            <div class="card " >
              <div id="chartContainer3">  </div>
            </div>

          </div>

          
        </div>




      </div>




    </main>
    <!--Footer(alt kısım)-->
    <!-- <footer class="  text-center   text-light page-footer ">
      <div class="  fixed-bottom  bg-dark  ">
        <h4 class="text-white">Telif Hakları Saklıdır.</h4>
      </div>
    </footer> -->






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