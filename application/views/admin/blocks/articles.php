<?php if(isset($articles) && !empty($articles)): ?>
    <?php foreach($articles as $item): ?>
        <div class="article">
            <h3><a href="<?=base_url();?>admin/article/<?=$item->id_article;?>"><?=strip_slashes($item->title);?></a></h3>
            <div><?=strip_slashes($item->text);?></div>
            <p class="info">
                Comments: <span class="red"><?=$item->comments;?></span> | 
                Date: <span class="red"><?=$item->date;?></span> | 
                Category: <a href="<?=base_url();?>admin/category/<?=$item->id_category;?>"><?=$item->category;?></a> |
                <input type="button" value="Delete" class="delete" 
                    onclick="window.location.href='<?=base_url();?>admin/article/delete/<?=$item->id_article;?>'" />
            </p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>