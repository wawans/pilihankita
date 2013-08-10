<?php
require_once 'statics/kop.php';
?>
<script> document.title = "Masuk | Pilihan Kita"; </script>  	
		<h2 class="lobster text-center">Masuk</h2>
		<article>
		<div class="row-fluid text-left" id="body_form">
<div class="span4"></div>
<div class="span4">
     <div align="center" id="message"></div>
		<form action="javascript:masuk()" class="bs-docs-example login form-horizontal">
            <div class="control-group padding-10">
              <label class="control-label" for="inputUser">Nama Pengguna</label>
              <div class="controls">
                <input type="text" id="uname" class="input width-full" placeholder="Nama Pengguna" required>
              </div>
            </div>
            <div class="control-group padding-10">
              <label class="control-label" for="inputPassword">Password</label>
              <div class="controls">
                <input type="password" id="sandi" class="input width-full" placeholder="Password" required>
              </div>
            </div>
			
            <div class="control-group  text-right">
              <div id="load" class="controls">
                <button id="submit" class="btn">Masuk</button>
              </div>
            </div>
          </form>
		</div>
		<div class="span4"></div>
		<div class="clear"></div>
</div>
		</article>
<script type="text/javascript" language="javascript" src="javascript/main.js"></script> 
<script type="text/javascript" language="javascript" src="javascript/masuk.js"></script>             
<?php
require_once 'statics/not.php';
?>
