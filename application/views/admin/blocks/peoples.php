<?php if(isset($people) && !empty($people)): ?>
    <?php foreach($people as $item): ?>
        <div class="article">
            <h3><a href="<?=base_url();?>admin/u/<?=$item->id_user;?>"><?=strip_slashes($item->user_name);?></a></h3>
            <p class="info">
                role: <span class="red"><?=$item->role;?></span> | 
                control: <span class="red"><?=$item->control;?></span> 
            </p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>