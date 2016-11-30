<div id="sidebar">
    <?php if(isset($category) && !empty($category)): ?>
    <h2>Category</h2>
        <ul>
        <?php foreach($category as $item): ?>
            <li>
                <input type="button" class="delete delete_category" value="x" title="Delete category!"
                    onclick="window.location.href='<?=base_url();?>admin/category/delete/<?=$item->id_category;?>'" />
                <input type="button" value="v" class="edit edit_category" title="Edit category"
                    onclick="window.location.href='<?=base_url();?>admin/category/edit/<?=$item->id_category;?>'" />
                <a href="<?=base_url();?>admin/category/<?=$item->id_category;?>"><?=$item->title;?></a>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <input type="button" value="Create category" class="edit"
        onclick="window.location.href='<?=base_url();?>admin/category/create'" />
    <?php if(isset($page) && !empty($page)): ?>
        <h2>Страницы</h2>
        <ul>
        <?php foreach($page as $item): ?>
            <li>
                <input type="button" class="delete delete_category" value="x" title="Удалить!"
                    onclick="window.location.href='<?=base_url();?>admin/page/delete/<?=$item->id_page;?>'" />
                <a href="<?=base_url();?>admin/page/<?=$item->id_page;?>"><?=strip_slashes($item->title);?></a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>

    <h2>People</h2>
    <ul>
        <li>
            <a href="<?=base_url();?>admin/people">All people</a>
		</li>
		<li>
            <a href="<?=base_url();?>admin/people/user">Users</a>
		</li>
		<li>
            <a href="<?=base_url();?>admin/people/admin">Admin</a>
        </li>
    </ul>
    <h2>Settings</h2>
    <ul>
        <li>
            <a href="<?=base_url();?>admin/settings">System</a>
        </li>
    </ul>
</div>
