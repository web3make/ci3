<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <?php if(isset($page_item) && !empty($page_item)): ?>
        <div class="article">
            <form action="<?=base_url();?>admin/page/save/<?=$page_item->id_page;?>" method="post">
                <input type="text" value="<?=strip_slashes($page_item->title);?>" name="title" class="text" /> : Заголовок<br />
                <textarea name="text" id="elm1" style="width: 100%;height: 250px;"><?=strip_slashes($page_item->text);?></textarea><br />
                <input type="submit" value="Сохранить" class="edit left" /> 
                <input type="button" value="Удалить" class="delete" 
                    onclick="window.location.href='<?=base_url();?>admin/page/delete/<?=$page_item->id_page;?>'" />
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>