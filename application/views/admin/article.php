<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <?php if(isset($article) && !empty($article)): ?>
            <div class="article">
                <form action="<?=base_url();?>admin/article/save/<?=$article->id_article;?>/<?=$article->id_category;?>" method="post">
                    <input type="text" value="<?=strip_slashes($article->title);?>" name="title" class="text" /> :Title<br />
                    <textarea name="text" id="elm1" style="width: 100%;height: 250px;"><?=strip_slashes($article->text);?></textarea><br />
                    <input type="submit" value="Save post" class="edit left" />
                </form>
                 | <input type="button" value="Delete" class="delete" 
                        onclick="window.location.href='<?=base_url();?>admin/article/delete/<?=$article->id_article;?>'" />
                <br />
                <br />
                <p class="info">
                    <a href="<?=base_url();?>admin/comments/<?=$article->id_article;?>">Comments: <?=$article->comments;?></a> | 
                    Date: <span class="red"><?=$article->date;?></span>
                </p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>