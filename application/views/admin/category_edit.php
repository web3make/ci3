<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <form action="<?=base_url();?>admin/category/add/<?=$category_item->id_category;?>" method="post">
            <input type="text" name="title" value="<?=$category_item->title;?>" class="text" /> : Title category <br />
            <input type="submit" value="Save" class="edit" />
        </form>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>