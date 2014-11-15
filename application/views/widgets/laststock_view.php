<?if (empty($laststock->content)):?>
<?else:?>
<div id="contentTitle">
<h1>Остання акція</h1>
</div>
<div id="contentText">
<p><?=$laststock->content?></p>
</div>
<?endif;?>