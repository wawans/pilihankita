<?php

/* 03 Agu 13 , 2:16:52
 * 
 * Project  : 
 * File     : data-input.php
 * Author   : Wawan Setyawan <wawans.setyawan @ gmail.com>
 * 
 */
/*
 * Daftar data input :
 * 1. Tps
 * 2. Desa
 * 3. Pokok
 * 4. Wajib
 */

if (!isset($_GET['d'])) {
    die('404 Not found!');
    exit;
}
 else {
    require_once 'statics/kop.php';
    require_once 'system/functions.php';
    userCek();
    
$d = sanitizeString($_GET['d']);
if ($d == uniqueID('wajib')) {
?>
<script> document.title = "Data Wajib - <? echo $isUser->nama; ?> | Pilihan Kita"; </script>
<div style="min-height: 30px;"></div>
<article>
    <blockquote>Data wajib digunakan untuk menghitung data hasil akhir.
    <cite>Administrator</cite>
    </blockquote>
    <div class="padding-10">
  <a class="btn" href="#tambah" id="tambah_wajib">+ Tambah</a>
    </div>
    <table class="table table-striped table-bordered dataTable" id="example" border="0" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
		<th style="width: 5%;">#</th>
                <th style="width: 30%;">Nama</th>
                <th style="width: 30%;">Desa</th>
                <th style="width: 15%;">TPS</th>
                <th style="width: 20%;">Hasil</th>
                </tr>
	</thead>
        <tbody id="rowWajib">
<?php
$op = optionList('rapor', '');
$i = 0;
while ($row = mysql_fetch_array($op)) {
    $n = $row['pengguna'] ;
    $s = $row['desa'] ;
    $t = $row['tps'] ;
    $p = $row['hasil'] ;
    $i++;
    

    echo '<tr id="trPokok"><td>'.$i.'</td><td>'.$n.'</td><td>'.$s.'</td><td>'.$t.'</td><td>'.$p.'</td></tr>';
}
?>
        </tbody>
   </table>
</article>
<!-- Modal elemen -->
<div id="modalWajib" class="none">
    <form action="javascript:addWajib();" >
         <div id="msg"></div>
    <div class="row-fluid">
       
<div class="span4">Nama</div>
<div class="span8"><input class="input" type="text" value="<? echo $isUser->nama; ?>" id="wPengguna" readonly required></div>
<div class="clear"></div>
    </div>
        <div class="row-fluid">
<div class="span4">Desa</div>
<div class="span8">
    <select id="wDesa">
        <option value="0">Pilih-Desa</option>
        <?php
$que1 = optionList('desa', '');
while ($row = mysql_fetch_array($que1)) {
    $id1 = $row['id'] ;
    $na1 = $row['nama'] ;

    echo '<option value="'.$na1.'">'.$na1.'</option>';
}
?>
    </select>
</div>
<div class="clear"></div>
    </div>
        <div class="row-fluid">
<div class="span4">TPS</div>
<div class="span8">
    <select id="wTps">
         <option value="0">Pilih-TPS</option>
        <?php
$que11 = optionList('tps', '');
while ($row = mysql_fetch_array($que11)) {
    $id11 = $row['id'] ;
    $na11 = $row['nama'] ;

    echo '<option value="'.$id11.'">'.$na11.'</option>';
}
?>
    </select>
</div>
<div class="clear"></div>
    </div>
        <div class="row-fluid">
<div class="span4">Hasil </div>
<div class="span8">
    <input class="input" type="text" id="wHasil" maxlength="8" required>
</div>
<div class="clear"></div>
    </div>
        <hr class="hr">
    <input class="btn" type="submit" value="Tambahkan">
    </form>
   
</div>
<script type="text/javascript" language="javascript" src="javascript/data-wajib.js"></script>  
<?php
}
elseif ($d == uniqueID('pokok')) {
?>
<script> document.title = "Data Pokok - <? echo $isUser->nama; ?> | Pilihan Kita"; </script>
<div style="min-height: 30px;"></div>
<article>
    <blockquote>Data pokok digunakan untuk menghitung data pemilih pendukung pemilu yang telah terdaftar.
    <cite>Administrator</cite>
    </blockquote>
    <div class="padding-10">
	<a class="btn" href="#tambah" id="tambah_pokok">+ Tambah</a>
    </div>
   <table class="table table-striped table-bordered dataTable" id="example" border="0" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
		<th style="width: 5%;">#</th>
                <th style="width: 30%;">Nama</th>
                <th style="width: 30%;">Desa</th>
                <th style="width: 5%;">TPS</th>
                <th style="width: 30%;">Pendata</th>
                </tr>
	</thead>
        <tbody id="rowPokok">
<?php
$op = optionList('pokok', '');
$i = 0;
while ($row = mysql_fetch_array($op)) {
    $n = $row['pemilih'] ;
    $s = $row['desa'] ;
    $t = $row['tps'] ;
    $p = $row['pendata'] ;
    $i++;
    

    echo '<tr id="trPokok"><td>'.$i.'</td><td>'.$n.'</td><td>'.$s.'</td><td>'.$t.'</td><td>'.$p.'</td></tr>';
}
?>
        </tbody>
   </table>
</article>
<!-- Modal elemen -->
<div id="modal" class="none">
    <form action="javascript:void(0)" >
        <label>
    <strong>A. Data Pendata</strong></label>
    <input class="input" type="text" maxlength="35" id="pendata" required>
    <hr class="hr">
    <label><strong>B. Data Pemilih</strong></label>
    <table class="table table-striped" id="tModalPokok">
    <tr id="dPokok_1">
    <td>Nama :<br />
    <input class="input" type="text" maxlength="35" id="namaPemilih_1" required>
    </td>
    <td>Desa : <br />
        <select id="desaPemilih_1">
        <option value="0">Pilih-Desa</option>
        <?php
$que1 = optionList('desa', '');
while ($row = mysql_fetch_array($que1)) {
    $na1 = $row['nama'] ;

    echo '<option value="'.$na1.'">'.$na1.'</option>';
}
?>
    </select>
    <!input class="input" type="text" maxlength="35" id="desaPemilih_1" required>
    </td>
    <td>TPS : <br />
        <select id="tpsPemilih_1">
         <option value="0">Pilih-TPS</option>
        <?php
$que11 = optionList('tps', '');
while ($row = mysql_fetch_array($que11)) {
    $na11 = $row['nama'] ;

    echo '<option value="'.$na11.'">'.$na11.'</option>';
}
?>
    </select>
    <!input class="input" type="text" maxlength="2" id="tpsPemilih_1" required>
    </td>
    <td><a class="btn" onclick="simpanPokok('1');">Simpan</a> <br /> <a class="btn" onclick="hapusPokok('1');"> Hapus_</a></td>
    </tr>
    </table>
           
    
    <hr class="hr">
    <a class="btn" onclick="tPemilih();">Tambah Pemilih</a>
    </form>
</div>
<script type="text/javascript" language="javascript" src="javascript/data-pokok.js"></script>             
<?php
}
elseif ($d == uniqueID('desa')) {
?>
<script> document.title = "Data Desa - <? echo $isUser->nama; ?> | Pilihan Kita"; </script>
<div style="min-height: 30px;"></div>
<article>
    <blockquote>Gunakan dengan Teliti! Mengoreksi dan/atau menghapus data Desa dan/atau TPS.
    <cite>Administrator</cite>
    </blockquote>
    <div class="padding-10">
	<a class="btn" href="#tambah" id="tambah_desa">+ Tambah</a>
    </div>
    <table class="table table-striped table-bordered dataTable" id="example" border="0" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
		<th style="width: 5%;">#</th>
                <th style="width: 10%;">ID</th>
                <th style="width: 60%;">Nama Desa</th>
                <th style="width: 25%;">Pengaturan</th>
                </tr>
	</thead>
        <tbody id="rowDesa">
<?php
$op = optionList('desa', '');
$i = 0;
while ($row = mysql_fetch_array($op)) {
    $n = $row['id'] ;
    $s = $row['nama'] ;
    $i++;
    

    echo '<tr id="trDesa"><td>'.$i.'</td><td>'.$n.'</td><td>'.$s.'</td><td><button onclick="editDesa(\''.$n.'\')" class="btn">Koreksi</button> <button onclick="dropDesa(\''.$n.'\')" class="btn">Hapus</button></td></tr>';
}
?>
        </tbody>
   </table>
</article>
<!-- Modal elemen -->
<div id="modalDesa" class="none">
    <table class="table" id="tModalDesa">
    <tr id="dDesa_1">
    <td style="width: 15%;">Nama Desa :</td>
    <td><input class="input-large" type="text" maxlength="45" id="desa_1" required>
    </td>
    <td style="width: 15%;"><button onclick="addDesa('1');" class="btn">Simpan</button> </td>
    </tr>
    </table>
    <hr class="hr" />
    <button class="btn" onclick="addrowModalDesa();">+ Tambah</button>
</div>
<script type="text/javascript" language="javascript" src="javascript/desa.js"></script>
<?php
}
elseif ($d == uniqueID('tps')) {
?>
<script> document.title = "Data TPS - <? echo $isUser->nama; ?> | Pilihan Kita"; </script>
<div style="min-height: 30px;"></div>
<article>
    <blockquote>Gunakan dengan Teliti! Mengoreksi dan/atau menghapus data Desa dan/atau TPS.
    <cite>Administrator</cite>
    </blockquote>
    <div class="padding-10">
	<a class="btn" href="#tambah" id="tambah_tps">+ Tambah</a>
    </div>
    <table class="table table-striped table-bordered dataTable" id="example" border="0" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
		<th style="width: 5%;">#</th>
                <th style="width: 10%;">ID</th>
                <th style="width: 60%;">Nama TPS</th>
                <th style="width: 25%;">Pengaturan</th>
                </tr>
	</thead>
        <tbody id="rowTps">
<?php
$op = optionList('tps', '');
$i = 0;
while ($row = mysql_fetch_array($op)) {
    $n = $row['id'] ;
    $s = $row['nama'] ;
    $i++;
    

    echo '<tr id="trTps"><td>'.$i.'</td><td>'.$n.'</td><td>'.$s.'</td><td><button onclick="editTps(\''.$n.'\')" class="btn">Koreksi</button> <button onclick="dropTps(\''.$n.'\')" class="btn">Hapus</button></td></tr>';
}
?>
        </tbody>
   </table>
</article>
<!-- Modal elemen -->
<div id="modalTps" class="none">
    <table class="table" id="tModalTps">
    <tr id="dTps_1">
    <td style="width: 15%;">No TPS :</td>
    <td><input class="input-large" type="text" maxlength="45" id="tps_1" required>
    </td>
    <td style="width: 15%;"><button onclick="addTps('1');" class="btn">Simpan</button> </td>
    </tr>
    </table>
    <hr class="hr" />
    <button class="btn" onclick="addrowModalTps();">+ Tambah</button>
</div>
<script type="text/javascript" language="javascript" src="javascript/tps.js"></script>
<?php
}

}
?>
<link rel="stylesheet" type="text/css" href="style/css/DT_bootstrap.css">
<script type="text/javascript" charset="utf-8" language="javascript" src="style/js/jquery.dataTable.1.9.4.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="style/js/DT_bootstrap.js"></script>
<script type="text/javascript" language="javascript" >
$("#container nav").html('<ul class="pull-left">'+
			'<li><a href="data-input.php?d=<?php echo uniqueID('wajib'); ?>">Data Wajib</a></li>'+
                        '<li class="divider">|</li>'+
			'<li><a href="data-input.php?d=<?php echo uniqueID('pokok'); ?>">Data Pokok</a></li>'+
			'<li class="divider">|</li>'+
                        '<li><a href="data-input.php?d=<?php echo uniqueID('desa'); ?>">Data Desa</a></li>'+
                        '<li class="divider">|</li>'+
                        '<li><a href="data-input.php?d=<?php echo uniqueID('tps'); ?>">Data TPS</a></li>'+
		'</ul>');
</script> 
<!-- Install UI -->
<!-- UI -->
<!-- js css-->
<link rel="stylesheet" href="style/js/ui/theme/jquery.ui.all.css" />
<script src="style/js/ui/jquery.ui.core.js"></script>
<script src="style/js/ui/jquery.ui.widget.js"></script>
<script src="style/js/ui/jquery.ui.button.js"></script>
<script src="style/js/ui/jquery.ui.position.js"></script>
<script src="style/js/ui/jquery.ui.dialog.js"></script>
<!--Sis data input -->
<script type="text/javascript" language="javascript" src="javascript/main.js"></script> 
<?php
require_once 'statics/not.php';
?>
