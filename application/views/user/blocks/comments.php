<div id="comments">
    <?php if(isset($comments) && !empty($comments)): ?>
        <h3>Comments: <?=count($comments);?></h3>
        <?php foreach($comments as $item): ?>
            <div class="comment">
                <p><a href="<?=base_url();?>u/<?=strip_slashes($item->id_user);?>"><?=strip_slashes($item->user_name);?></a></p>
                <p><span class="red">Text:</span> <?=strip_slashes($item->text);?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h4>Comments: 0</h4>
    <?php endif; ?>
</div>
<?php if(!$this->session->userdata('id_user')):?>
<div id="form_comment">
	<a href="../auht/login">Login</a>
<div>
<?php else:?>
<div id="form_comment">
    <form action="<?=base_url();?>comments/add/<?=$article->id_article;?>" method="post" onsubmit="return check()">
        <textarea name="text">Text</textarea><br />
        <input type="submit" class="submit" value="Submit" />
    </form>
</div>
<?php endif;?>