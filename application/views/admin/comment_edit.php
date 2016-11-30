<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <div id="comments">
            <?php if(isset($comment) && !empty($comment)): ?>
                <div class="comment">
                    <form action="<?=base_url();?>admin/comments/save/<?=$comment->id_comment.'/'.$comment->id_article;?>" method="post">
                        <input type="text" name="user_name" value="<?=strip_slashes($comment->user_name);?>" class="text" /> : Name
                        <br />
                        <textarea name="text" id="elm1" style="width: 100%;height: 250px;"><?=strip_slashes($comment->text);?></textarea>
                        <br />
                        <input type="submit" class="edit left" value=" Save " />
                    </form>
                     | <input type="button" value="Delete"  class="delete" 
                            onclick="window.location.href='<?=base_url();?>admin/comments/delete/<?=$comment->id_comment.'/'.$comment->id_article;?>'" />
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>