<?php 
session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Bukittinggi Object Tourism</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <!--  Slide -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
    </style>

    <script src="assets/js/chart-master/Chart.js"></script>

  <script src="../config_public.js"></script>
    <script src="_map.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgpfxdQ0Ep_nieNjV64u4yXWeSFHAT4BE"></script>
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script>
    AIzaSyAkZzXiMrpqp8ivDZzEEAGR7boIbiF1me8 -->

      <!--LOADER-->
    <style>

    .html5gallery img {
      width:490px !important;
      left: 0px !important;
    }
    .html5gallery-car-0 {
      margin-top:-20px;
      width : 490px !important;
    }
    #loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 40px;
      margin: 5px;
      height: 40px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    </style>
  
  </head>

  <body onload="init();data_tourism_1_info('<?php echo $_GET["idgallery"] ?>');">

   <section id="container" >
      <header class="header black-bg" style="background: black;">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
            <!--logo start-->
        <a href="index.php" class="logo"><b>WebGIS Object Tourism</b> 03-1711521006 Annisa Wistia Rizalmi</a>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><div id="loader" style="display:none"></div></li>
            <li id="loader_text" style="margin-top:13px;display:none"><b>Loading</b></li>
          </ul>
        </div>
      </header>

      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <!--p class="centered"><a href="profile.html"><img src="assets/img/masjid.png" class="img-circle" width="90"></a></p-->
          
                  <li class="sub-menu">
                      <a href="index.php">
                          <i class="fa fa-arrow-left"></i>
                          <span>Back To Home</span>
                      </a>
                  </li> 

        </ul>
          </div>
      </aside>

      <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row">
          <div class="col-lg-12 main-chart"> 
           <div class="col-sm-12">
              <div class="col-sm-6"> <!-- information -->
                  <section class="panel">
                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize;"><b>Detail Information</b></h2>
                    </header>

                    <div class="panel-body">
                      <table id="table_tengah_info" class="table">
                        <tbody  style='vertical-align:top;'>
                          
                        </tbody>          
                      </table>

                      
                    </div>
                  </section>
                  <section class="panel">
                    <header class="panel-heading">
                      <h4 class="box-title" style="text-transform:capitalize;"><b>Info</b></h4>
                    </header>
                    <?php 
                     require '../connect.php';
                      $id = $_GET["idgallery"];
                     // echo "ini $id";

                      if(strpos($id,"H") !== false){
                        $sqlreview = "SELECT * from information_admin where id_hotel = '$id'";
                      }elseif (strpos($id,"RM") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_kuliner = '$id'";
                      }elseif (strpos($id, "SO") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_souvenir = '$id'";
                      }elseif (strpos($id,"IK") !== false) {
                         $sqlreview = "SELECT * from information_admin where id_ik = '$id'";
                      }elseif (strpos($id,"tw")!== false) {
                         $sqlreview = "SELECT * from information_admin where id_ow = '$id'";
                      }
                        
                      $result = pg_query($sqlreview);
                    ?>
                    <table class="table">
                      <thead><th>Date</th><th class="centered">Info</th></thead>
                    <?php  
                      while ($rows = pg_fetch_array($result)) 
                        {
                          $tgl = $rows['tanggal'];
                          $info = $rows['informasi'];
                          $id_info =$rows['id_informasi'];
                          echo "<tr><td>$tgl</td><td>$info</td></tr>";
                        }
                    

                       ?>               
                    
                   </table>

                    <div class="panel-body">
                      <table id="" class="table">
                        <tbody  style='vertical-align:top;'>

                          
                        </tbody>          
                      </table>

                  <!--<section class="panel">
                    <header class="panel-heading">
                      <h4 class="box-title" style="text-transform:capitalize;"><b> Visitor's Reviews</b></h4> -->
                    </header>
                    
                    <div class="panel-body">
                      <table class="table">             
                      <?php
                      $id = $_GET["idgallery"];
                      if(strpos($id,"H") !== false){
                        $sqlreview = "SELECT * from review where id_hotel = '$id'";
                      }elseif (strpos($id,"RM") !== false) {
                        $sqlreview = "SELECT * from review where id_kuliner = '$id'";
                      }elseif (strpos($id, "SO") !== false) {
                        $sqlreview = "SELECT * from review where id_souvenir = '$id'";
                      }elseif (strpos($id,"IK") !== false) {
                         $sqlreview = "SELECT * from review where id_ik = '$id'";
                      }elseif (strpos($id,"tw")!== false) {
                         $sqlreview = "SELECT * from review where id_ow = '$id'";
                      } 
                      $result = pg_query($sqlreview);
                      $bisa = true;
                      while ($rows = pg_fetch_array($result)) 
                      {
                        $nama = $rows['name'];
                        if($_SESSION['username']==$nama){
                          $bisa = false;
                        }
                        $komen = $rows['comment'];
                        echo "<tr><td>Name</td><td>:</td><td>$nama</td></tr><tr><td>Comment</td><td>:</td><td>$komen</td></tr>";
                      }
                      ?>
                    </table>
                    <form method="POST" action="_add_comment.php">
                    
                    <input type="hidden" name="id" value="<?php echo $_GET['idgallery']?>" >
                      <table id="" class="table">
                        <tbody  style='vertical-align:top;'>
                          <?php 
                
                    if($_SESSION['C'] == true && $bisa == true)
                      {
                        echo($_SESSION['username']);
                          echo "<tr>
                              <td>Name</td>
                              <td>:</td>
                              <td><select name='review'>
                              <option value='1'>1</option>
                              <option value='2'>2</option>
                              <option value='3'>3</option>
                              <option value='4'>4</option>
                              <option value='5'>5</option>
                            </select>  </td>
                            </tr>
                            <tr>
                              <td>Comment</td>
                              <td>:</td>
                              <td><textarea cols='30' rows='5' name='comment'></textarea></td>
                            </tr>
                            <tr>
                              <td><input type='submit' name='' value='send'></td>
                            </tr>";
                      }
                     ?>     
                     
                          
                        </tbody>          
                      </table>
                      </form>

                  <tr colspan></tr>

                  </section>
            
              </div>

              <div class="col-sm-6">
                <div class="row" >
                  <div class="col-sm-12"> <!-- gallery -->
                    <section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-compose"  style="background-color:black;border-colom: 1px solid black">Gallery</a>
                            <div class="content"  style= "margin-top:-30px" style="text-align:center;" >
                            <div style="overflow-y: hidden; overflow-x:hidden; margin:15px; display:flex; justify-content:center">
                              <div class="html5gallery" style="max-height:700px; overflow:hidden; display:block;" data-skin="horizontal" data-width="400" data-height="350" data-resizemode="fit" data-autoslide="true" data-responsive="true">
                           <!-- <a class="btn btn-compose" style="background: black;">Gallery</a>
                            <div class="content" style="text-align:center;">
                              <div style="height:550px; overflow-y: scroll;">
                                <div class="html5gallery" 
                                data-autoslide="true"
                                data-responsive="true"
                                data-width="272" data-height="250"
                                data-responsive="true"
                                >  -->
                                  <?php
                                
                                  if (strpos($id,"H") !== false) {  //Hotel

                                  $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                                  $hasil=pg_query($querysearch);
                                  while($baris = pg_fetch_assoc($hasil)){
                                    if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']=='')){
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_tourism']."'><img src='../_foto/".$baris['gallery_tourism']."'></a>";
                                    }
                                  }
                        
                                } elseif (strpos($id,"tw") !== false) {  //Tourism

                                  $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                                  $hasil=pg_query($querysearch);
                                  while($baris = pg_fetch_assoc($hasil)){
                                    if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']=='')){
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_tourism']."'><img src='../_foto/".$baris['gallery_tourism']."'></a>";
                                    }
                                  }

                                } elseif (strpos($id,"SO") !== false) {  //Souvenir

                                  $querysearch  ="SELECT a.id, b.gallery_souvenir FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' ";       
                                  $hasil=pg_query($querysearch);
                                  while($baris = pg_fetch_assoc($hasil)){
                                    if(($baris['gallery_souvenir']=='-')||($baris['gallery_souvenir']=='')){
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_souvenir']."'><img src='../_foto/".$baris['gallery_souvenir']."'></a>";
                                    }
                                  }

                                } elseif (strpos($id,"RM") !== false) {  //Kuliner

                                  $querysearch  ="SELECT a.id, b.gallery_culinary FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";       
                                  $hasil=pg_query($querysearch);
                                  while($baris = pg_fetch_assoc($hasil)){
                                    if(($baris['gallery_culinary']=='-')||($baris['gallery_culinary']=='')){
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_culinary']."'><img src='../_foto/".$baris['gallery_culinary']."'></a>";
                                    }
                                  }

                                } elseif (strpos($id,"M") !== false) {  //Worship

                                  $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
                                  $hasil=pg_query($querysearch);
                                  while($baris = pg_fetch_assoc($hasil)){
                                    if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']=='')){
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_worship_place']."'><img src='../_foto/".$baris['gallery_worship_place']."'></a>";
                                    }
                                  }

                                } elseif (strpos($id,"IK") !== false) {  //Industry

                                  $querysearch  ="SELECT a.id, b.gallery_industry FROM small_industry as a left join industry_gallery as b on a.id=b.id where a.id='$id' ";       
                                  $hasil=pg_query($querysearch);
                                  while($baris = pg_fetch_assoc($hasil)){
                                    if(($baris['gallery_industry']=='-')||($baris['gallery_industry']=='')){
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_industry']."'><img src='../_foto/".$baris['gallery_industry']."'></a>";
                                    }
                                  }

                                } elseif (strpos($id,"R") !== false) {  //Restoran

                                  $querysearch  ="SELECT a.id, b.gallery_restaurant FROM restaurant as a left join restaurant_gallery as b on a.id=b.id where a.id='$id' ";       
                                  $hasil=pg_query($querysearch);
                                  while($baris = pg_fetch_assoc($hasil)){
                                    if(($baris['gallery_restaurant']=='-')||($baris['gallery_restaurant']=='')){
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_restaurant']."'><img src='../_foto/".$baris['gallery_restaurant']."'></a>";
                                    }
                                  }

                                } else {  //Angkot

                                  $querysearch  ="SELECT a.id, b.gallery_angkot FROM angkot as a left join angkot_gallery as b on a.id=b.id where a.id='$id' ";  
                                  //echo "$querysearch";     
                                  echo "<script language='javascript'>alert('$querysearch');</script>";   
                                  $hasil=pg_query($querysearch);
                                  while($baris = pg_fetch_assoc($hasil)){
                                    if(($baris['gallery_angkot']=='-')||($baris['gallery_angkot']=='')){
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_angkot']."'><img src='../_foto/".$baris['gallery_angkot']."'></a>";
                                    }
                                  }

                                }
                            ?>
                                          
                                </div>
                              </div>  
                            </div>
                        </div>
                    </section>
                    
                  </div>
                  <div class="col-sm-12"> <!-- peta -->
                    <div class="white-panel pns">

                              <header class="panel-heading" style="float:left">
                                <label style="color: black; margin-right:20px">Google Map with Location List</label>
                                <a class="btn btn-success" role="button" data-toggle="collapse" onclick="lokasimanual()" title=" Manual Position" ><i class="fa fa-location-arrow" style="color:white;"></i></a>
                                <a class="btn btn-success" role="button" data-toggle="collapse" onclick="posisisekarang()" title="Current Position"><i class="fa fa-map-marker" style="color:white;"></i></a>
                                 <label id="tombol">
                                <a type="button"  onclick="legenda()" id="showlegenda" class="btn btn-success" data-toggle="tooltip" title="Legenda"><i class="fa fa-eye" style="color:white;"></i></a>
                                </label>
                              </header>
                              <div class="row">
                                 <div class="col-sm-6 col-xs-6"></div>
                               </div>                        
                               <div id="map" class="centered" style="height:260px">
                               </div>
                            </div>
                    
                    
                  </div>
                  
                </div>
                
              </div>
          
            </div>
          </div>
        </div>

        </section>
      
      </section>

      <!-- <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row mt">
            <div class="col-sm-6">
                        <div class="white-panel pns">

                          <header class="panel-heading" style="float:left">
                            <label style="color: black; margin-right:20px">Google Map with Location List</label>
                            <a class="btn btn-default" role="button" data-toggle="collapse" onclick="lokasimanual()" title=" Manual Position" ><i class="fa fa-location-arrow" style="color:black;"></i></a>
                            <a class="btn btn-default" role="button" data-toggle="collapse" onclick="posisisekarang()" title="Current Position" style="margin-right:10px"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                          </header>
                          <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>                        
                           <div id="map" class="centered" style="height:260px">
                           </div>
                        </div>
            </div>


              <div class="col-sm-6" id="result">

                <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Gallery</a>
                        <div class="content" style="text-align:center;">
                        <div class="html5gallery" style="max-height:700px;overflow:auto;" data-skin="horizontal" data-width="500" data-height="400" data-resizemode="fit">  
                          <?php
                        require '../connect.php';

                        $id = $_GET["idgallery"];
                        if (strpos($id,"H") !== false) {  //Hotel

                          $querysearch  ="SELECT a.id, b.gallery_tourism FROM hotel as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_tourism']."'><img src='../_foto/".$baris['gallery_tourism']."'></a>";
                            }
                          }
                
                        } elseif (strpos($id,"tw") !== false) {  //Tourism

                          $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_tourism']."'><img src='../_foto/".$baris['gallery_tourism']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"SO") !== false) {  //Souvenir

                          $querysearch  ="SELECT a.id, b.gallery_souvenir FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_souvenir']=='-')||($baris['gallery_souvenir']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_souvenir']."'><img src='../_foto/".$baris['gallery_souvenir']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"RM") !== false) {  //Kuliner

                          $querysearch  ="SELECT a.id, b.gallery_culinary FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_culinary']=='-')||($baris['gallery_culinary']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_culinary']."'><img src='../_foto/".$baris['gallery_culinary']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"M") !== false) {  //Worship

                          $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_worship_place']."'><img src='../_foto/".$baris['gallery_worship_place']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"IK") !== false) {  //Industry

                          $querysearch  ="SELECT a.id, b.gallery_industry FROM small_industry as a left join industry_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_industry']=='-')||($baris['gallery_industry']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_industry']."'><img src='../_foto/".$baris['gallery_industry']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"R") !== false) {  //Restoran

                          $querysearch  ="SELECT a.id, b.gallery_restaurant FROM restaurant as a left join restaurant_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_restaurant']=='-')||($baris['gallery_restaurant']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_restaurant']."'><img src='../_foto/".$baris['gallery_restaurant']."'></a>";
                            }
                          }

                        } else {  //Angkot

                          $querysearch  ="SELECT a.id, b.gallery_angkot FROM angkot as a left join angkot_gallery as b on a.id=b.id where a.id='$id' ";  
                          //echo "$querysearch";     
                          echo "<script language='javascript'>alert('$querysearch');</script>";   
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_angkot']=='-')||($baris['gallery_angkot']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_angkot']."'><img src='../_foto/".$baris['gallery_angkot']."'></a>";
                            }
                          }

                        }
                    ?>
                                  
                        </div>
                        </div>
                    </div>
                </section>
              </div>
                      
          </div>
        </section>
         
      </section> -->

      <footer class="site-footer">
          <div class="text-center">
              1311522013 - Ikhwan
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
  </section>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="_map.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  <script src="assets/js/advanced-form-components.js"></script>      
    <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  <script>
var slideIndex = 1;
//showDivs(slideIndex);

function legenda(n)
{
  $('#tombol').empty();
  $('#tombol').append('<a type="button" id="hidelegenda" onclick="hideLegenda()" class="btn btn-default " data-toggle="tooltip" title="Sembunyikan Legenda" style="margin-right: 7px;"><i class="fa fa-eye-slash"></i></a> ');
  
  var layer = new google.maps.FusionTablesLayer(
    {
          query: {
            select: 'Location',
            from: 'AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE'
          },
          map: map
        });
    var legend = document.createElement('div');
        legend.id = 'legend';
        var content = [];
        content.push('<h4>Legenda</h4>');
        content.push('<p><div class="color l"></div>Culinary</p>');
        content.push('<p><div class="color f"></div>Small Industry</p>');
        content.push('<p><div class="color g"></div>Souvenir</p>');
        content.push('<p><div class="color h"></div>Hotel</p>');
        content.push('<p><div class="color i"></div>Restaurant</p>');
        content.push('<p><div class="color j"></div>WorshipPlace</p>');
        content.push('<p><div class="color k"></div>Tourism</p>');
        content.push('<p><div class="color e"></div>Angkot</p>');
        content.push('<p><div class="color d"></div>District of Mandiangin Koto Selayan</p>');
        content.push('<p><div class="color c"></div>District of Guguk Panjang</p>');
        content.push('<p><div class="color b"></div>District of Aur Birugo Tigo Baleh</p>');
        
        legend.innerHTML = content.join('');
        legend.index = 1;
        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);

        
}

function hideLegenda() {
  $('#legend').remove();
  $('#tombol').empty();
  console.log("hy jackkky");
  $('#tombol').append('<a type="button" id="showlegenda" onclick="legenda()" class="btn btn-primary btn-sm " data-toggle="tooltip" title="Legenda" style="margin-right: 7px;"><i class="fa fa-eye" style="color:white;"> </i></a>');
}

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>


<style type="text/css">
  /*legenda*/
#legend {
        background:white;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
        color: white;
        font-family: Arial, sans-serif;
      }
      
    .color {
        border: 1px solid;
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
    }

    legenda 
    .a {
        background: #f75d5d;
      }
    .b {
        background: #ff3300;
      }
    .c {
        background: #ffd777;
      }
    .d {
        background: #ec87ec;
      }
    .e {
        background: #e2e231 ;
      }
    .f {
        background: #000000 ;
      }
    .g {
        background: #ff07d5;
      }
    .h {
        background: #9ad7f9;
      }
    .i {
        background: #f92a2a;
      }
    .j {
        background: #6df73b;
      }
    .k {
        background: #1796c4;
      }
       .l {
        background: #f75d5d;
      }
</style>



  </body>
</html>
