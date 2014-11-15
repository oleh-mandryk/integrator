<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="<?=$description?>"/>
    <meta name="keywords" content="<?=$keywords?>"/>
    
    <title><?=$site_name?> | <?=$title?></title>   
    
    <link href="/media/img/favicon.ico" rel="shortcut icon" media="screen" />
        
    <?foreach ($styles as $file_style):?>
        <?=html::style($file_style)?>
    <?endforeach?>
    <?foreach ($scripts as $file_script):?>
        <?=html::script($file_script)?>
    <?endforeach?>
</head>
<body>
<div id="wrapper">
    <?=$block_menu_main?>
    
    <!-- end of menu -->
    <div id="header">
        <div class="intro">Продаж комп'ютерів, оргтехніки, сервіс, послуги, дрібна поліграфія, реклама, комп'ютерні ігри, інтернет...</div>
    </div>
    <!-- end of header -->
    <div id="proContent">
    </div>
    <div id="container">
        <? if (isset($block_main)):?>
        <div id="contentMain">
            <div id="contentMainTop"> 
            </div>
            <div id="contentMainCenter">
                <div id="contentTitle">
                <h1><?=$page_title?></h1>
                </div>
                <div id="contentText">
                <?=$block_main?>
                </div>
            </div>
            <div id="contentMainBottom"> 
            </div>
        </div>
        <?endif?>
        
        <? if (isset($block_content)):?>
        <div id="content">
            <div id="contentTop"> 
            </div>
            <div id="contentCenter">
                <div id="contentTitle">
                <h1><?=$page_title?></h1>
                </div>
                <? foreach ($block_content as $сblock):?>
                <div id="contentText">
                <?=$сblock?>
                </div>
                <?endforeach?>
            </div>
            <div id="contentBottom"> 
            </div>
        </div>
        <?endif?>
        <? if (isset($block_sidebar)):?>
        <div id="sidebar">
            <div id="sidebarTop"> 
            </div>
            <div id="sidebarCenter">
            <? foreach ($block_sidebar as $sblock):?>
                
                <?=$sblock?>
                
            <?endforeach?>    
            </div>
            <div id="sidebarBottom"> 
            </div>
        </div>
        <?endif?>
        
        <? if (isset($block_banner)):?>
        <div id="banner">
            <div id="bannerTop"> 
            </div>
            <div id="bannerCenter">
                <div id="contentText">
                <div class="oneBanner">
                <img src="/media/img/bannerfans.png"/>
                </div>
                <div class="oneBanner">
                <!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t14.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показане число переглядів за 24"+
" години, відвідувачів за 24 години й за сьогодні' "+
"border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet-->
            </div>
            <div class="clear"></div>
            </div>
            </div>
            <div id="bannerBottom"> 
            </div>
        </div>
        <?endif?>
    </div>
    <!-- end of container -->
    
    <div id="footer">
        <a href="/">Головна</a> | 
        <a href="/page/services">Послуги</a> | 
        <a href="/page/cost">Ціни</a> | 
        <a href="/stock">Акції</a> | 
        <a href="/photogallery">Фотогалерея</a> | 
        <a href="/page/contact">Контакти</a><br />
        Copyright &copy; 2012 <a href="/">
        <strong>Інтегратор</strong></a> | 
        Всі права застережено. Розробка <span class="author">WorldSites</span>.
    </div>
  <!-- end of footer -->

</div>
<!-- end of wrapper -->

</body>
</html>