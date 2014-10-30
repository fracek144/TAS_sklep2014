<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <title>Pokerface</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
   	<link rel="stylesheet" type="text/css" href="<?=$this -> getSiteUrl(); ?>/media/style.css"> 
  </head>
  <body>
 
   <div id="container">
    <div id="header"></div>
 
    <div id="menu">
	 <ul>
	  <li><a href="<?=$this -> getsiteUrl();?>">Strona główna</a></li>
	  <li><a href="#">Produkty</a></li>
	  <li><a href="#">Twoje zakupy</a></li>
	  <li><a href="<?=$this -> getsiteUrl();?>user/loginform">Logowanie</a></li>
	 </ul>
	</div>
 
    <div id="panel"></div>
 
    <div id="content">
		<?=$content; ?>
	</div>
 
    <div id="footer">&copy; 2014</div>
   </div>
 
  </body>
</html>