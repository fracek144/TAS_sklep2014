<p style="font-family: Tahoma;">
<?php
foreach($newsdata as $news) {
?>
 
<i><?=$news['title']; ?></i><br>
<b><?=$news['author']; ?></b><br>
 
<a href="<?=$this -> getBaseUrl(); ?>/news/getNewsById/<?=$news['id']; ?>" style="text-decoration: none;">Czytaj więcej</a>
<br><br>
<?php
}
?>
</p>