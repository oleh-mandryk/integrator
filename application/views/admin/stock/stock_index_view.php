<? if (isset($info_ok)) {?>
<div class="not_error"><?=$info_ok?></div>
<?}?>

<div class="add">
<?=HTML::image('media/img/add.png')?>
<?=HTML::anchor('admin/stocks/add', 'Додати')?>
</div>

<?if($stock->count() > 0):?>
<? $tr=null; $k=1; $result=null;?>
<br class="clear"/>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Контент</th>
            <th>Функції</th>
        </tr>
    </thead>
<? foreach ($stock as $stock_one):?>
<?$result=$k%2;?>
<?if ($result===0) { $tr='a';} else { $tr='b'; }?>
<tbody>
<tr class="<?=$tr?>">
    <td><?=$stock_one->id?></td>
    <td><?=HTML::anchor('admin/stocks/edit/'. $stock_one->id, $stock_one->content)?></td>
    <td>
    
    <?=HTML::anchor('admin/stocks/edit/'. $stock_one->id, HTML::image('media/img/edit.png'))?>
    
    <?=HTML::anchor('admin/stocks/delete/'. $stock_one->id, HTML::image('media/img/delete.png'))?>
    </td>
</tr>
<? $k++;?>
<? endforeach?>
</tbody>
</table>
<?=$pagination;?>
<?else:?>
<p>Немає акцій</p>
<?endif?>