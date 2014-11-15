<?if(!$all_stocks->count() > 0):?>
<p>Наразі акцій немає!</p>
<?else:?>
<ol>
<?foreach($all_stocks as $stocks):?>
<li><?=$stocks->content;?></li>
<?endforeach?>
</ol>
<?endif;?>