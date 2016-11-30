<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <?php $this->load->view('/admin/blocks/peoples');?>
        <div id="paginations">
            <?=@$pages;?>
        </div>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>