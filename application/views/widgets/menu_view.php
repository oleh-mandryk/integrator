<div id="menu">
    <?$cl=null?>
    <ul>
    <?foreach ($menu as $name => $menu):
    if(in_array($select, $menu)):
    
        $cl='current';
    
    else:
    
        $cl='null';
    
    endif;?>
    <li class="<?=$cl?>">
        <?switch ($name) {
            case 'Головна':?>
                <a href="/"><div class="item"><?=$name?></div></a>
            <?break;
            
            case 'Фотогалерея':?>
                <a href="/photogallery"><div class="item"><?=$name?></div></a>
            <?break;
            
            case 'Акції':?>
                <a href="/stock"><div class="item"><?=$name?></div></a>
            <?break;
            
            default:?>
                <a href="/page/<?=$menu[0]?>"><div class="item"><?=$name?></div></a>
            <?break;
        }?>
    </li>
    <?endforeach?>
    </ul>
</div>