<div id="sidebar">            
    <?php if(isset($category) && !empty($category)): ?>
    <h2>Категории</h2>
        <ul>
            <?php foreach($category as $item): ?>
                <li>
                    <a href="/category/<?=$item->id_category;?>"><?=strip_slashes($item->title);?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>