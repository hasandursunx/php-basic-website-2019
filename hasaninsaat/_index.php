<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hasan İnşaat</title>
<meta name="viewport" content="device-width,initial-scale=1" />	
<link href="bs4/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="bs4/jquery.min.js"></script>
<script src="bs4/bootstrap.min.js"></script> 
<style>
	.bosluk{margin:15px; margin-right:60px;}
	.boslukustalt{ padding-top:50px; padding-bottom:50px;}
	.boslukbuyutec{margin-left:150px;}	
	.boslukalt{ padding-bottom:30px;}
	
	
td, th {
  border: 4px solid #dddddd;
  text-align: left;
}
</style>
</head>
<body>
<div class="container-fluid">
	<div class="container" >
    	<div class="row">
        	<div class="col-md-1">
              <img src="images/logolar/1.png" />
            </div>
            <div class="col-md-5 align-self-center text-right" >
               <img src="images/logolar/2.png" width="25" />
            		<a class="text-dark">
                 	  Kıbrıs cad. Plaza sk. No:12/3 Adapazarı/Sakarya
               		 </a>
            </div>
            <div class="col-md-3 align-self-center text-right" >
            <img src="images/logolar/telefon.png" width="32" height="28" />
            	<a class="text-dark" >
                 (0542)-512-22-12
                </a>
            </div>
            <div class="col-md-3 align-self-center" >
            	 <ul class=" nav justify-content-end" >
                 	<li class="nav-item">
                        <a href="#" class="nav-link">
                            <img class="rounded" src="images/logolar/facebook.png" height="20" />
                        </a>
                        </li>
                        <li class="nav-item">
                        	<a href="#" class="nav-link">
                           		<img class="rounded" src="images/logolar/twitter.png" height="20" />
                        	</a>
                        </li>
                        <li class="nav-item">
                        	<a href="#" class="nav-link">
                            	<img class="rounded" src="images/logolar/mail.png" height="20" />
                        	</a>
                        </li>
               		 </ul>
           	  </div>
         </div>
    </div>
</div>
<div class="container-fluid bg-dark ">
	<div class="container ">
       <div class="container ">
        	<div class="row"> 	
                <div class="col-md-12" >
               		<div class="btn-group">
               		 <a href="#" class="btn btn-dark bosluk">ANASAYFA</a>
               		 <a href="#" class="btn btn-dark bosluk">PROJELERİMİZ</a>
                     <a href="#" class="btn btn-dark bosluk">SPONSORLARIMIZ</a>
               		 <a href="#" class="btn btn-dark bosluk">HAKKIMIZDA</a>
               		 <a href="#" class="btn btn-dark bosluk">İLETİŞİM</a>
                     <img class="rounded align-self-center boslukbuyutec" src="images/logolar/büyüteç.png" height="30" />
              	  </div>	
                </div>
            </div>
        </div>
    </div>
</div>    
     <div class="container-fluid bg-dark text-center boslukalt ">
        	<div class="row">
                <div class="col-md-12">
               		<div id="demo" class="carousel slide" data-ride="carousel">
                    	<ul class="carousel-indicators">
                        	<li class="active" data-target="#demo" data-slide-to="0"></li>
                            <li  data-target="#demo" data-slide-to="1"></li>
                            <li  data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        <div class="carousel-inner">
                        	
                            	<?	
                         		include "baglanti.php";
								 $sorgu=$db->query("select * from sliderlar",PDO::FETCH_ASSOC);
								 if($sorgu->rowCount())
						 		{
						 			foreach($sorgu as $satir)
								{
								if($satir['sliderid'] == 1) $aktif="active"; else $aktif=""; 
								?>
                                
                        	<div class="carousel-item  <?=$aktif?>">
                            <img src="sliderresimleri/<?=$satir['sliderid']?>.jpg"width="1192" height="350" 
                            class="img-thumbnail"/>
                            	<div class="carousel-caption">
                                	<h1 ><?=$satir['baslik']?></h1>
                                    <a href="#" class="btn btn-warning text-white"><?=$satir['butonadi']?></a>
                                </div>
                            </div>
                            
                           		 <?
									} 
								 	}
									?>
                            <div class="carousel-item active">
                            <img src="images/slider/2.png"  width="1192" height="350" class="img-thumbnail"/>
                            	<div class="carousel-caption">
                                	<h1>“Kaliteyi müşteri tanımlar.”</h1>
                                    <a href="#" class="btn btn-warning text-white"> Tanımlarmısınız ?</a>
                                    
                                </div>
                            </div>
                            
                       </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        	<span class="carousel-control-prev-icon">
                        	</span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                        	<span class="carousel-control-next-icon">
                        	</span>
                        </a>	
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
    	<div class="container boslukustalt">
        	<div class="row boslukustalt ">
            	<div class="col-md-4 text-center">
                <img src="images/logolar/a1.png" width="100" height="100" />
                <h4 class="text-dark"> Personel </h4>
                <h6 class="text-dark"> Uzman kadromuz ile yola kesintisiz devam ediyoruz. </h6>
                </div>
                <div class="col-md-4 text-center">
                <img src="images/logolar/a2.png" width="100" height="100" />
                <h4 class="text-dark"> Tasarım </h4>
                <h6 class="text-dark"> Tasarım harikası projelerimizi gurur ile sizlere sunuyoruz.</h6>
                </div>
                <div class="col-md-4 text-center">
                <img src="images/logolar/a3.png" width="100" height="100" />
                <h4 class="text-dark"> İnşaat </h4>
                 <h6 class="text-dark"> Yapacağımzla değil yaptığımızla övünürüz. Hiçbir zaman "Kalite" tesadüfi değildir.</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" >
    	<div class="container boslukustalt">
        	<div class="row">
            	<div class="col-md-6">
                	<h3> <b> Hakkımızda </b> </h3>
                    <h6 class="text-dark"> <i> 1996 yılında 1 kişi ile  maceraya başlayan "Hasan İnşaat"  23 sene sonra 78 kişi ile yolunda devam                              ediyor. Sizlerin sayesinde bu yıllara kadar işimizi bırakmadık.Kendimizi günden güne geliştirmeye söz                             veriyoruz. </i> </h6><br /><br />
                    <h6 class="text-dark">  İLK 3 KURALIMIZ :  </h6>   <br />
                 		<ul>
                  			<li> <h5 class="text-secondary" > Profesyonel Personel </h5> </li> <br />
                    		<li> <h5 class="text-secondary" > Düzenli Çalışma </h5> </li> <br />
                   			<li> <h5 class="text-secondary"> Kaliteli Malzeme </h5> </li> <br />
                        </ul>    
                </div>
                <div class="col-md-6">
                	<video width="500" height="350" controls muted autoplay src="images/video.mp4" class="img-thumbnail ">
                 	</video>
                </div>
            </div>
    </div>
</div>
<div class="container-fluid bg-dark">
	<div class="container boslukustalt" >
    	<div class="row">
        	<div class="col-md-12">	
            	<h2 class="text-white text-center boslukalt"> • PROJELERİMİZ • </h2>
            </div>
        </div> 
        <TABLE>
       			 <?
				 include "baglanti.php";
				 $sorgu = $db->query("select * from projeler",PDO::FETCH_ASSOC);
				 	
					foreach($sorgu as $satir)
						{
                ?>
       		 <TR>
        		<TD width="1982">
       			   <div class="row ">  
        	 		   <div class="col-md-3">	 	
           					 <img src="projeresimleri/<?=$satir['projeid']?>.jpg" height="200" width="250" />
    				   </div>			  
       				   <div class="col-md-6 text-light align-self-center">     
        					 <h4 class="text-center"> <?=$satir['baslik']?> </h4>
               				 <hr color="#FFFFFF" width="300" />
                			 <h6 style="text-align:center"> <?=$satir['aciklama']?> </h6>
        	 		    </div>
      	    			<div class="col-md-3 text-right">	 	
           					 <img src="projeresimleri/0<?=$satir['projeid']?>.jpg" height="200" width="250" />
    		 			</div>	                     
        			</div>
        		</TD>
        	 <TR>
             	<?
						}
				?>
        </TABLE>
    </div>
</div>
<div class="container-fluid">
	 <div class="container boslukustalt">
     	<div class="row">
        	<div class="col-md-4 text-center align-self-center">
            	<h3 class="text-dark "> İLETİŞİM </h3>
                <hr />
                <h5 class="text-dark"> Telefon 1 : 0210-911-12-24  </h5> <hr />
                <h5 class="text-dark"> Telefon 2 : 0542-512-22-12  </h5> <hr />
                <h5 class="text-dark"> Fax : 0210-913-12-26  </h5> <hr />
                <h5 class="text-dark"> Mail : info@hasaninsaat.com.tr  </h5> <hr />
                <h5 class="text-dark"> Adres : Kıbrıs cad. Plaza sk. No:12/3 Adapazarı/Sakarya </h5> 
            </div>
            <div class="col-md-8">
            	<img src="images/logolar/konum.png" class="img-thumbnail color" />
            </div>
        </div>
     </div>    
</div>
<div class="container-fluid bg-dark text-center">
	 <h6 class="text-white"><i>Bu site Hasan Dursun tarafından tasarlanmıştır. HER HAKKI SAKLIDIR (c) 2019. </i></h6>     
</div>
</body>
</html>
