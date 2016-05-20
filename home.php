<h1>Welcome back, <?php echo $_SESSION['nama'];?></h1>
<hr>
<div class="" style="max-width:500px;margin: 0 auto;">
<?php
$s = $koneksi->prepare("SELECT 
						logo 
						FROM 
						sekolah");
$s->execute();
$data = $s->fetchAll();
foreach ($data as $key){
	?>
  <img class="mySlides" src="assets/foto/<?php echo $key['logo'];?>" 
  	style="height:400px;">
  <?php } ?>
</div>

<hr>
<h1>News</h1>
<?php
$s = $koneksi->prepare("SELECT 
						berita.*,user.nama 
						FROM 
						berita 
						LEFT JOIN user 
						ON user.id=berita.id_penulis 
						ORDER BY id DESC");
$s->execute();
$data = $s->fetchAll();
foreach ($data as $key){
?>
<div style="display: block;
			clear:both;border:1px solid orange;padding: 10px;">
	<div style="display: block;
		clear:both;"><?php echo $key['judul'];?>
			<div style="float:right;"><?php echo $key['tanggal'];?></div>
		</div>

	<hr>
	<div style="display: block;
		clear:both"><?php echo $key['isi'];?></div>

	<br>
	Posted by <?php echo $key['nama'];?>
</div>
<hr>
<?php } ?>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>