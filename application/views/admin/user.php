<?php $this->load->view('/admin/blocks/header');?>
<div id="main">
    <?php $this->load->view('/admin/blocks/sidebar');?>
    <div id="content">
        <?php if(isset($user) && !empty($user)): ?>
        <div class="article">
            <h3><a href="<?=base_url();?>admin/u/<?=$user->id_user;?>"><?=strip_slashes($user->user_name);?></a></h3>
			<!------------------------------------------------------->
			<form action="<?=base_url();?>admin/people/save/<?=$user->id_user;?>" method="post">
                   
			<select name="role" class="text">
                            <option <?php if($user->role =="user") echo 'selected="selected"';?> value="user">User</option>
                            <option <?php if($user->role =="admin") echo 'selected="selected"';?> value="admin">Admin</option>
            </select>
			<!------------------------------------------------------->

			<select name="control" class="text">
                            <option <?php if($user->control =="a") echo 'selected="selected"';?> value="a">Activated</option>
                            <option <?php if($user->control =="b") echo 'selected="selected"';?> value="b">Banned</option>
            </select>
			<!------------------------------------------------------->
			<input type="submit" value="Сохранить" class="edit" /> 
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $this->load->view('/admin/blocks/footer');?>