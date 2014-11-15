<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    
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
    </div>
    <!-- end of container -->
    
    <div id="footer">
       Copyright &copy; 2012 <a href="/">
        <strong>Інтегратор</strong></a> | 
        Всі права застережено. Розробка <span class="author">WorldSites</span>.
    </div>
  <!-- end of footer -->

</div>
<!-- end of wrapper -->

</body>
</html>