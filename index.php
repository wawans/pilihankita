<?php
require_once 'statics/kop.php';
require_once 'system/functions.php';
if (isset($_GET['v']['desa'])) {
    
?>
<script> document.title = "Data Desa | Pilihan Kita"; </script>
<h2 class="lobster text-center">Data Desa</h2>
<article>
    <table class="table table-striped table-bordered dataTable" id="example" border="0" cellpadding="0" cellspacing="0">
  <thead>
		<tr>
		<th style="width: 5%;">#</th>
                <th style="width: 60%;">Nama Desa</th>
                </tr>
	</thead>
        <tbody id="rowDesa">
<?php
$op = optionList('desa', '');
$i = 0;
while ($row = mysql_fetch_array($op)) {
    $s = $row['nama'] ;
    $i++;
    

    echo '<tr id="trDesa"><td>'.$i.'</td><td>'.$s.'</td></tr>';
}
?>
        </tbody>
   </table>
</article>
<?php
}
 else {
?>
<script> document.title = "Pilihan Kita - Just another Wawans Lab's project"; </script>
<?php
$neo = mysql_fetch_array(optionList('tulisan', 'ORDER BY id DESC LIMIT 0,1'));
if (empty($neo)) {
    print '<code>!!!Uhh... Belum ada tulisan sama sekali.</code>';
    
} else {
?>
		<h1 class="lobster"><?php echo $neo['judul']; ?></h1>
		<article><?php echo $neo['isi']; ?></article>

<?php
    }
}
require_once 'statics/not.php';
?>
