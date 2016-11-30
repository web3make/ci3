<?php if(isset($articles) && !empty($articles)): ?>
    <?php foreach($articles as $item): ?>
        <div class="article">
            <h3><a href="<?=base_url();?>article/<?=$item->id_article;?>"><?=strip_slashes($item->title);?></a></h3>
            <div><?=strip_slashes($item->text);?></div>
            <p class="info">
                Comments: <span class="red"><?=$item->comments;?></span> | 
                Date: <span class="red"><?=$item->date;?></span> | 
                Category: <a href="<?=base_url();?>category/<?=$item->id_category;?>"><?=$item->category;?></a>
            </p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>