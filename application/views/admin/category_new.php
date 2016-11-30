<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <form action="<?=base_url();?>admin/category/save/" method="post">
            <input type="text" name="title" value="" class="text" /> : Title category <br />
            <input type="submit" value="Save" class="edit" />
        </form>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>