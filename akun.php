<?php

/* 10 Agu 13 , 1:50:18
 * 
 * Project  : 
 * File     : akun.php
 * Author   : Wawan Setyawan <wawans.setyawan @ gmail.com>
 * 
 */
require_once 'statics/kop.php';
require_once 'system/functions.php';
userCek();
$tipe = $isUser->tipe;
switch ($tipe) {
    case '1':
        $tipe = 'Pengguna Terdaftar';
        break;
    case '3':
        $tipe = 'Panitia';
        break;
    case '5':
        $tipe = 'Administrator';
        break;

    default:
        break;
}
$status = $isUser->status;
switch ($status) {
    case '1':
        $status = 'Pengguna Aktif';
        break;
    case '0':
        $status = 'Pengguna Pasif';
        break;

    default:
        break;
}
?>
<script> document.title = "Akun <? echo $isUser->nama; ?> | Pilihan Kita"; </script>
<h1 class="lobster">Akun Detail</h1>
<table class="table table-bordered">
    <tr>
        <th colspan="2"><img src="bin/default.jpg" /></th>
    </tr>
    <tr>
        <th style="width: 20%">Nama Pengguna</th>
        <td> <? echo $isUser->nama; ?></td>
    </tr>
    <tr>
        <th>Akun Tipe</th>
        <td> <? echo $tipe; ?></td>
    </tr>
    <tr>
        <th>Akun Status</th>
        <td> <? echo $status; ?></td>
    </tr>
    <tr>
        <th>Kata Sandi</th>
        <td><code>Tidak ditampilkan</code></td>
    </tr>
    <tr>
        <th>Pengaturan Akun</th>
        <td><button class="btn">Ganti Sandi</button></td>
    </tr>
</table>
<?php
require_once 'statics/not.php';
?>
