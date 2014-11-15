<?if($one_photorand->count() > 0):?>
<div id="contentTitle">
<h1>Випадкове фото</h1>
</div>
<div id="contentText">
<div class="gallery">
    <?foreach($one_photorand as $photorand):?>
    <a title="<?=$photorand->title?>" href="/media/img/photogallery/big/<?=$photorand->url_img?>" rel="prettyPhoto[gallery2]"><img src="/media/img/photogallery/small/<?=$photorand->url_img?>" alt="" /></a>
    <?endforeach?>
</div>
</div>
<?endif;?>