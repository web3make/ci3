<?php $this->load->view('user/blocks/header'); ?>
    <div id="main">
        <?php $this->load->view('user/blocks/sidebar'); ?> 
        <div id="content">
            <?php $this->load->view('user/blocks/articles'); ?> 
            <div id="paginations">
                <?=@$pages;?>
            </div>
        </div>
    </div>
<?php $this->load->view('user/blocks/footer'); ?>