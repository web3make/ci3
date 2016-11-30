<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <div class="article">
            <?php if(isset($settings) && !empty($settings)): ?>
            <form action="<?=base_url();?>admin/settings/save" method="post">
                <input type="text" value="<?=$settings['title'];?>" name="title" class="text" /> : Название<br />
                <input type="text" value="<?=$settings['email'];?>" name="email" class="text" /> : email<br />
                <input type="text" value="<?=$settings['login'];?>" name="login" class="text" /> : Логин<br />
                <input type="password" value="1234567890" name="password" class="text" /> : Пароль<br />
                <input type="text" value="<?=$settings['count'];?>" name="count" class="text" /> : Записей на странице<br />
                <input type="submit" value="Сохранить" class="edit left" /> 
            </form>
            <?php endif; ?>
        </div>
        <div id="paginations">
            <?=@$pages;?>
        </div>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>