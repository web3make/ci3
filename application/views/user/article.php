<?php $this->load->view('user/blocks/header'); ?>
    <div id="main">
        <?php $this->load->view('user/blocks/sidebar'); ?>
        <div id="content">
            <?php if(isset($article) && !empty($article)): ?>
                <div class="article">
                    <h3><?=strip_slashes($article->title);?></h3>
                    <p><?=strip_slashes($article->text);?></p>
                    <p class="info">
                        Comments: <span class="red"><?=$article->comments;?></span> | 
                        Date: <span class="red"><?=$article->date;?></span> | 
                        Category: <a href="<?=base_url();?>category/<?=$article->id_category;?>"><?=$article->category;?></a>
                    </p>
                </div>
            <?php endif; ?>
            <?php $this->load->view('user/blocks/comments'); ?>
        </div>
    </div>
<?php $this->load->view('user/blocks/footer'); ?>