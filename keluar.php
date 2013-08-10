<?php
session_start();
/* 05 Agu 13 , 0:10:52
 * 
 * Project  : 
 * File     : keluar.php
 * Author   : Wawan Setyawan <wawans.setyawan @ gmail.com>
 * 
 */
 $_SESSION=array();
  if (session_id() != "" || isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-2592000, '/');
	session_destroy();
?>
<script> document.title = "Under Development | Pilihan Kita"; </script>
<h1>Anda baru saja keluar.</h1>
<code>This page currently under development .
You should go back to our  <a href="./">&DoubleLongRightArrow; HOMEPAGE &DoubleLongLeftArrow;</a>.</code>
