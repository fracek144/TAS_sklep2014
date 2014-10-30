<p style="font-family: Tahoma;">
<?php
foreach($userdata as $user) {
?>
 
<i><?=$user['username']; ?> - </i>
 
<a href="<?=$this -> getBaseUrl(); ?>/user/getUserById/<?=$user['id']; ?>" style="text-decoration: none;">Profil</a>
<br><br>
<?php
}
?>
</p>