<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proje Yönetim Paneli</title>

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
		$sorgu=$db->prepare("update projeler SET baslik=?,aciklama=? where projeid=?");
		$sorgu->execute(array($_POST['baslik'],$_POST['aciklama'],$_GET['prid']));
		if($_FILES['resim'] && $_FILES['resim2'] )
		{
			$resim_yolu="../projeresimleri/".$_GET['prid'].".jpg";
			move_uploaded_file($_FILES['resim']['tmp_name'],$resim_yolu);
			$resim_yolu2="../projeresimleri/0".$_GET['prid'].".jpg";
			move_uploaded_file($_FILES['resim2']['tmp_name'],$resim_yolu2);
		}
	
	}
	
	//---------------------------------------------------------------------------------
	
	if($_GET['islem']=="sil")
	{
		$sorgu=$db->prepare("Delete from projeler where projeid=?");
		$sil=$sorgu->execute(array($_GET['prid']));
		if($sil)
		{
			$resim_yolu="../projeresimleri/".$_GET['prid'].".jpg";
			unlink($resim_yolu);
			$resim_yolu2="../projeresimleri/0".$_GET['prid'].".jpg";
			unlink($resim_yolu2);
		}
	}
	
	//-------------------------------------------------------------------------------

	if($_GET['islem']=="ekle2")
	{
		$sorgu=$db->prepare("Insert into projeler (baslik,aciklama) values(?,?)");
		$ekle=$sorgu->execute(array($_POST['baslik'],$_POST['aciklama']));
		if($ekle)
		{
			$son_id=$db->lastInsertId(); 
			$resim_yolu="../projeresimleri/".$son_id.".jpg";
			$resim_yolu2="../projeresimleri/0".$son_id.".jpg";
			if(move_uploaded_file($_FILES['resim']['tmp_name'],$resim_yolu))
			{
				print("<p> 1. Resim Başarıyla Yüklendi.");
				print ("<p>Dosya Tipi:".$_FILES['resim']['type']);
				print ("<p>Dosya İsmi:".$_FILES['resim']['name']);
				print ("<p>Dosya Boyutu:".$_FILES['resim']['size']);
			}
			else
			{
				print ("<p> 1 . Resim Yüklenemedi...</p>");
			}
			
			if(move_uploaded_file($_FILES['resim2']['tmp_name'],$resim_yolu2))
			{
				print("<p> 2 . Resim Başarıyla Yüklendi.");
				print ("<p>Dosya Tipi:".$_FILES['resim2']['type']);
				print ("<p>Dosya İsmi:".$_FILES['resim2']['name']);
				print ("<p>Dosya Boyutu:".$_FILES['resim2']['size']);
			}
			else
			{
				print ("<p> 2 . Resim Yüklenemedi...</p>");
			}
			
			
		}
		else 
		{
			print ("<p> Proje veritabanına eklenemedi... </p>");
		}	
	}
	
    //---------------------------------------------------------------------------------------
?>
	
 
<body>
<div class="container-fluid text-center"> 
	<div class="container">
    	<div class="row text-center">
        	<div class="col-md-12">
    			<h1 class="text-danger"> Hasan İnşaat </h1>
        		<h6 class="text-success"> Proje Yönetim Sayfası </h6>
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
                	<th>Resim 1</th>
                    <th>Resim 2</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                </thead>
                <?
					$sorgu=$db->query("Select * from projeler",PDO::FETCH_ASSOC);
					if($sorgu->rowCount())
					{
						foreach($sorgu as $satir)
						{
						
				?>
                <tbody>
                	<tr>
                    	<td><img  width="100" src="../projeresimleri/<?=$satir['projeid']?>.jpg" /></td>
                        <td><img  width="100" src="../projeresimleri/0<?=$satir['projeid']?>.jpg" /></td>
                        <td><?=$satir['baslik']?></td>
                        <td><?=$satir['aciklama']?></td>
                        <td> 
                        	<a href="?islem=guncelle1&prid=<?=$satir['projeid']?>" class="btn btn-link">Güncelle</a>
                            <a href="?islem=sil&prid=<?=$satir['projeid']?>" class="btn btn-link" onclick="return 								(window.confirm('Bu kaydı silmek istiyor musunuz?') ? 1 : 0);">Sil</a>
	                        </td>
                    </tr>
                </tbody>
                <?
						} 
					}  
				?>
                </table>
            </div>
            
        	<a href="?islem=ekle1" class="btn btn-link">Proje Ekle</a>
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
            
            <label>Açıklama</label>
           <textarea  name="aciklama" class="form-control ckeditor"></textarea>
			</div>
            <div class="form-group">
            
       
            
            <div class="form-group">
            <label>Proje Resmi 1 :</label>
            <input type="file" name="resim" />
            </div>
            
            <div class="form-group">
            <label>Proje Resmi 2 :</label>
            <input type="file" name="resim2" />
            </div>
            
            <button class="btn btn-light" type="submit">Gönder</button>
            </form>
        </div>        
    </div>
</div>
</div>
<? } ?>

<?
	if($_GET['islem']=="guncelle1")
	{
		$sorgu=$db->prepare("Select * from projeler where projeid=?");
		$sorgu->execute(array($_GET['prid']));
		if($data=$sorgu->fetch(PDO::FETCH_ASSOC))
		{
			$bas=$data['baslik'];
			$met=$data['aciklama'];

		}

?>

<div class="container bosluk">
	<div class="row">
    	<div class="col-md-8 bosluk bg-primary" >
        	<form action="?islem=guncelle2&prid=<?=$_GET['prid']?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label>Başlık Güncelle</label>
            <input type="text" name="baslik" value="<?=$bas?>" class="form-control"/>
			</div>
            <div class="form-group">
            
            <label>Açıklama</label>
            <textarea  name="aciklama" class="form-control ckeditor" ><?=$met?></textarea>
			</div>
          
            <div class="form-group">
            <label>Proje Resmi 1 :</label>
            <input type="file" name="resim" />
            </div>
            
            <div class="form-group">
            <label>Proje Resmi 2 :</label>
            <input type="file" name="resim2" />
            </div>
            
            <button class="btn btn-light" type="submit">Güncelle</button>
            </form>
        </div>        
    </div>
</div>
<? } ?>
</body>
</html>





