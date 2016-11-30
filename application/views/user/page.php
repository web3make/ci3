<?php $this->load->view('user/blocks/header'); ?>
    <div id="main">
        <?php $this->load->view('user/blocks/sidebar',$category); ?>
        <div id="content">
            <?php if(isset($page_item) && !empty($page_item)): ?>
                <div class="article">
                    <h3><?=strip_slashes($page_item->title);?></h3>
                    <div class="post"><?=strip_slashes($page_item->text);?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $this->load->view('user/blocks/footer'); ?>