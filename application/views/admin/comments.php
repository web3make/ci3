<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <div id="comments">
            <h3>Title: <span class="red"><?=@$article->title;?></span></h3>
            <?php if(isset($comments) && !empty($comments)): ?>
                <h3>Comment list:</h3>
                <?php foreach($comments as $item): ?>
                    <div class="comment">
                        <p><span class="red">Name:</span> <?=strip_slashes($item->user_name);?></p>
                        <p><span class="red">Text:</span> <?=strip_slashes($item->text);?></p>
                        <input type="button" value="Edit" class="edit"
                            onclick="window.location.href='<?=base_url();?>admin/comments/edit/<?=$item->id_comment;?>'" /> | 
                        <input type="button" value="Delete"  class="delete"
                            onclick="window.location.href='<?=base_url();?>admin/comments/delete/<?=$item->id_comment.'/'.$item->id_article;?>'" />
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h3>No Comments</h3>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>