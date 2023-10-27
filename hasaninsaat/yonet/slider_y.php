<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Slider Yönetim Paneli</title>

</head>
<script type="text/javascript" src="../bs4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../bs4/bootstrap.min.css"/>
<script type="text/javascript" src="../bs4/bootstrap.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<style>
	.bosluk
	{
		padding:20px;	
	}
</style>
<head>
</head>
<?
	include "../baglanti.php";
	if($_GET['islem']=="guncelle2")
	{
		$sorgu=$db->prepare("update sliderlar SET baslik=?,butonadi=?,gosterilsinmi=? where sliderid=?");
		$sorgu->execute(array($_POST['baslik'],$_POST['butonadi'],$_POST['goster'],$_GET['sid']));
		if($_FILES['resim'])
		{
			$resim_yolu="../sliderresimleri/".$_GET['sid'].".jpg";
			move_uploaded_file($_FILES['resim']['tmp_name'],$resim_yolu);
		
		}
	
	}
	
	//---------------------------------------------------------------------------------
	
	if($_GET['islem']=="sil")
	{
		$sorgu=$db->prepare("Delete from sliderlar where sliderid=?");
		$sil=$sorgu->execute(array($_GET['sid']));
		if($sil)
		{
			$resim_yolu="../sliderresimleri/".$_GET['sid'].".jpg";
			unlink($resim_yolu);
			
		}
	}
	
	//-------------------------------------------------------------------------------

	if($_GET['islem']=="ekle2")
	{
		$sorgu=$db->prepare("Insert into sliderlar (baslik,butonadi,gosterilsinmi) values(?,?,?)");
		$ekle=$sorgu->execute(array($_POST['baslik'],$_POST['butonadi'],$_POST['goster']));
		if($ekle)
		{
			$son_id=$db->lastInsertId(); 
			$resim_yolu="../sliderresimleri/".$son_id.".jpg";
			if(move_uploaded_file($_FILES['resim']['tmp_name'],$resim_yolu))
			{
				print("<p> Resim Başarıyla Yüklendi.");
				print ("<p>Dosya Tipi:".$_FILES['resim']['type']);
				print ("<p>Dosya İsmi:".$_FILES['resim']['name']);
				print ("<p>Dosya Boyutu:".$_FILES['resim']['size']);
			}
			else
			{
				print ("<p>  Resim Yüklenemedi...</p>");
			}
	
		}
		else 
		{
			print ("<p> Slider veritabanına eklenemedi... </p>");
		}	
	}
	
    //---------------------------------------------------------------------------------------
?>
	
 
<body>
<div class="container-fluid text-center"> 
	<div class="container">
    	<div class="row text-center">
        	<div class="col-md-12">
    			<h1 class="text-warning"> Hasan İnşaat </h1>
        		<h6 class="text-primary"> Slider Yönetim Sayfası </h6>
            </div>
       </div>
    </div>
</div>
<div class="container bosluk">    
    <div class="row">
    	<div class="col-md-12 text-center">
        	<hr class="bg-secondary" width="650" />
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12 text-center">
            <a href="slider_y.php" class="btn btn-link">Slider</a>
            <a href="proje_y.php" class="btn btn-link">Projeler</a>
        </div>
    </div>    
</div>
<div class="container bosluk">
	<div class="row">
    	<div class="col-md-12">
        	<div class="table-responsive">
            	<table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                	<th>Resim</th>
                    <th>Başlık</th>
                    <th>Buton Adı</th>
                </thead>
                <?
					$sorgu=$db->query("Select * from sliderlar",PDO::FETCH_ASSOC);
					if($sorgu->rowCount())
					{
						foreach($sorgu as $satir)
						{
						
				?>
                <tbody>
                	<tr>
                    	<td><img  width="100" src="../sliderresimleri/<?=$satir['sliderid']?>.jpg" /></td>
                        <td><?=$satir['baslik']?></td>
                        <td><?=$satir['butonadi']?></td>
                        <td> 
                        	<a href="?islem=guncelle1&sid=<?=$satir['sliderid']?>" class="btn btn-link">Güncelle</a>
                            <a href="?islem=sil&sid=<?=$satir['sliderid']?>" class="btn btn-link" onclick="return 								(window.confirm('Bu kaydı silmek istiyor musunuz?') ? 1 : 0);">Sil</a>
	                        </td>
                    </tr>
                </tbody>
                <?
						} 
					}  
				?>
                </table>
            </div>
        	<a href="?islem=ekle1" class="btn btn-link">Slider Ekle</a>
   	    </div>    
</div>
</div>
<?

	if($_GET['islem']=="ekle1")
	{
	
?>

<div class="container bosluk">
		<div class="row">
    	<div class="col-md-8 bosluk bg-primary" >
        	<form action="?islem=ekle2" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label>Başlık</label>
            <input type="text" name="baslik" class="form-control"/>
			</div>
            <div class="form-group">
            
            <label>Buton Adı</label>
           <input type="text" name="butonadi" class="form-control"/>
			</div>
            <div class="form-group">
            
            </div>
            
             <div class="form-group">
            <label>Gösterilsin Mi?</label>
            
            <select class="form-control" name="goster">
            <option value="E">Evet</option>
            <option value="H">Hayır</option>
            </select>
            </div> 
            
       
            <div class="form-group">
            <label>Slider Resmi:</label>
            <input type="file" name="resim" />
            </div>
   
            
            <button class="btn btn-light" type="submit">  Gönder </button>
            </form>
        </div>        
    </div>
</div>
</div>
<? } ?>

<?
	if($_GET['islem']=="guncelle1")
	{
		$sorgu=$db->prepare("Select * from sliderlar where sliderid=?");
		$sorgu->execute(array($_GET['sid']));
		if($data=$sorgu->fetch(PDO::FETCH_ASSOC))
		{
			$bas=$data['baslik'];
			$but=$data['butonadi'];
			$gos=$data['gosterilsinmi'];
			if($gos=="E") $cevap="Evet"; else $cevap="Hayır";

		}

?>

<div class="container bosluk">
	<div class="row">
    	<div class="col-md-8 bosluk bg-primary" >
        	<form action="?islem=guncelle2&sid=<?=$_GET['sid']?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label>Başlık Güncelle</label>
            <input type="text" name="baslik" value="<?=$bas?>" class="form-control"/>
			</div>
            <div class="form-group">
            
            <label>Buton Adı</label>
          	<input type="text" name="butonadi" value="<?=$but?>" class="form-control" />
			</div>
            
             <div class="form-group">
            <label>Gösterilsin Mi?</label>
            
            <select class="form-control" name="goster">
            <option value="<?=$gos?>"><?=$cevap?></option>
            <option value="E">Evet</option>
            <option value="H">Hayır</option>
            </select>
            </div> 
          
            <div class="form-group">
            <label>Slider Resmi :</label>
            <input type="file" name="resim" />
            </div>
            
            <button class="btn btn-light" type="submit">Güncelle</button>
            </form>
        </div>        
    </div>
</div>
<? } ?>
</body>
</html>





