<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <div class="article">
		   <hr>
		
		
		
			<form action="<?=base_url();?>admin/article/add" method="post">
				<select name="category">
					<?php foreach($category as $item): ?>
						<option value="<?=$item->id_category;?>"><?=strip_slashes($item->title);?></option>
					<?php endforeach; ?>
				</select>
				<input type="text" value="" name="title" class="text" /> :Title<br />
				<textarea name="text" id="elm1" style="width: 100%;height: 250px;"></textarea><br />
				<input type="submit" value="Save post" class="edit" />
			</form>
		
		
		
		   <hr>
        </div>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>