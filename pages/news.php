<?php 
error_reporting(E_ALL);

if(!$Info->Get("item")){
?>
<h2>News overview</h2>
<p>This is an overview of the different news items.</p>
<ul>
  <li><a href="<?=$root?>news/1/">Item 1</a></li>
  <li><a href="<?=$root?>news/2/">Item 2</a></li>
  <li><a href="<?=$root?>news/3/">Item 3</a></li>
</ul>
<?php
}else{
?>
	<h2>News item <?=$Info->Get("item")?></h2>
	<p>Show news item <?=$Info->Get("item")?></p>
<?php	
}
?>
