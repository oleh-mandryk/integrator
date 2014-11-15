<div id="menu">
    <?$cl=null?>
    <div class="homeBut"><?=Html::anchor('', Html::image('media/img/home.png'))?></div>
    <ul>
    <?foreach ($menu as $name => $menu):
    if(in_array($select, $menu)):
    
        $cl='current';
    
    else:
    
        $cl='null';
    
    endif;?>
    <li class="<?=$cl?>">
        <?if ($menu[0] != 'logout') {?>
            <a href="/admin/<?=$menu[0]?>"><div class="item"><?=$name?></div></a>
        <?} else {?>
            <a href="/<?=$menu[0]?>"><div class="item"><?=$name?></div></a>
        <?}?>
    </li>
    <?endforeach?>
    </ul>
</div>