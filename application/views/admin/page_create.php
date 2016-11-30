<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <div class="article">
            <form action="<?=base_url();?>admin/page/add" method="post">
                <input type="text" value="" name="title" class="text" /> : Заголовок<br />
                <textarea name="text" id="elm1" style="width: 100%;height: 250px;"></textarea><br />
                <input type="submit" value="Сохранить" class="edit left" /> 
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>