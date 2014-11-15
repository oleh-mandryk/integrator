<? if (isset($info_ok)) {?>
<div class="not_error"><?=$info_ok?></div>
<?}?>

<div id="indexForms">
<?=Form::open('page/contact')?>
    
    
    <div class="posBlockItem">
        <div class="posBlockNotText">
            <?=Form::label('name', 'Ваше Ім\'я')?>:<br/>
            <?=Form::input('name', $data['name'])?>
        </div>
        <div class="posBlockText">
            <?if(isset($errors['name'])){ echo $errors['name'];}?>
        </div>
    </div>
    
    <div class="posBlockItem">
        <div class="posBlockNotText">
            <?=Form::label('email', 'Ваш E-mail')?>:<br/>
            <?=Form::input('email', $data['email'])?>
        </div>
        <div class="posBlockText">
            <?if(isset($errors['email'])){ echo $errors['email'];}?>
        </div>
    </div>
    
    <div class="posBlockItem">
        <div class="posBlockNotText">
            <?=Form::label('subject', 'Тема повідомлення')?>:<br/>
            <?=Form::input('subject', $data['subject'])?>
        </div>
        <div class="posBlockText">
            <?if(isset($errors['subject'])){ echo $errors['subject'];}?>
        </div>
    </div>
    
    <div class="posBlockItem">
        <div class="posBlockNotText">
            <?=Form::label('text', 'Повідомлення')?>:<br/>
            <?=Form::textarea('text',$data['text'])?>
        </div>
        <div class="posBlockText">
            <?if(isset($errors['text'])){ echo $errors['text'];}?>
        </div>
    </div>
    
    <div class="posBlockItem">
        <?=Form::label('captcha', 'Введіть цифри з картинки')?>:<br/>
        <?=$captcha; ?>
        <div class="posBlockNotText">
            
            
            <?=Form::input('captcha', null, array('class' => 'numeric'))?>
        </div>
        <div class="posBlockText">
            <?if(isset($errors['captcha'])){ echo $errors['captcha'];}?>
        </div>
    </div>
    
    <div class="posBlockItem">
    <p><?=Form::submit('send', 'Відправити', array('class' => 'submit'))?></p>
    </div>
<?=Form::close()?>
</div>