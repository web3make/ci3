    <div id="footer">
        <?php if($id_user=$this->session->userdata('role')=='admin'):?>
		<div class="footer_left"><a href="<?=base_url();?>admin/" id="exit" target="_blank">adminka</a></div>
		<?php endif;?>
    </div>
</body>
</html>