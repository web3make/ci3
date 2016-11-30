<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <?php if(@count($category) > 0): ?>
            <input type="button" value="Create article" class="edit" 
                onclick="window.location.href='<?=base_url();?>admin/article/create'" />
        <?php endif; ?>
        <?php $this->load->view('/admin/blocks/articles');?>
		<div id="paginations">
            <?=@$pages;?>
        </div>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>