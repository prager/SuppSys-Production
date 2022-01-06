<section>
 <!-- ASIDE NAV AND CONTENT -->
 <div class="line">
    <div class="box margin-bottom">
            <div class="s-12 m-12 l-12">
    			<?php echo anchor('mngr', 'Add and Edit Gear', 'class="button margin-bottom"')?>
                <?php echo anchor('#', 'Add and Edit Members', 'class="button disabled-btn margin-bottom"')?>
                <?php echo anchor('mngr/show_gear_sets', 'Add and Edit Gear Sets', 'class="button margin-bottom"')?>
                <?php echo anchor('orders', 'Orders', 'class="button margin-bottom"')?>
                <?php echo anchor('received', 'Received', 'class="button margin-bottom"')?>
            </div>
            <div class="s-12 m-12 l-12">
        			<p><?php echo anchor('mngr/download_members', 'Download Members'); ?></p>
        	</div>
          <article class="s-12 m-12 l-12">
             <div class="s-12 m-8 l-8">
             <table>
             	<thead>
                 	<tr>
                 		<td>Name</td><td>Delete</td>
                 	</tr>
             	</thead>
             	<tbody>
             	<?php if($members != NULL) {
             	    foreach($members as $member) {
             	    ?>
             		<tr>
             			<td><?php echo anchor('mngr/edit_member/' . $member['id_members'],
             			    $member['lname'] . ' ' . $member['fname']); ?>
             			</td>
             			<td>
             				<?php echo anchor('mngr/delete_member/' . $member['id_members'], 'Delete'); ?>
             			</td>
             		</tr>
             	<?php
             	    }
             	   }?>
             	</tbody>
             </table>
             </div>
             <div class="s-12 m-12 l-12">&nbsp;</div>
             <div class="s-12 m-5 l-5">
             <?php //echo anchor('mngr/99', 'List All', 'class="button rounded-btn submit-btn margin-bottom"')?>
             	<?php echo anchor('mngr/show_members/1', ' &nbsp;  &nbsp; ', 'class="icon-sli-control-start"')?>
             	<?php
             	    if($pg <= 1){
             	        echo '';
             	    }
                 	else {
                 	    $link = 'mngr/show_members/'.($pg - 1);
                 		$btn = 'class="icon-sli-control-rewind"';
                 		echo anchor($link, ' &nbsp;  &nbsp; ', $btn);
                 	}
                 ?>

                 <?php
                 	if($pg >= $no_pages){
                 	    echo '';
                 	}
                 	else {
                 	    $link = 'mngr/show_members/'.($pg + 1);
                 	    //$btn = 'class="button submit-btn margin-bottom"';
                 	    $btn = 'class="icon-sli-control-forward"';
                 	    echo anchor($link, ' &nbsp;  &nbsp; ', $btn);
                 	    echo ' ';
                 	}
                 ?>

                <?php echo anchor('mngr/show_members/' . $no_pages, ' &nbsp;  &nbsp; ', 'class="icon-sli-control-end"')?>
             </div>
             <div class="s-12 m-12 l-12">&nbsp;</div>
             <div class="s-12 m-3 l-3">
        		<a class="button s-12 margin-bottom" href="<?php echo base_url() ;?>index.php/mngr/edit_member">Add Member</a>
        	</div>
          </article>
    </div>
 </div>
</section>
