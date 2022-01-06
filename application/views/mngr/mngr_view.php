<section>
    <div class="line">
    <div class="box margin-bottom">
        <div class="line">
            <div class="s-12 m-12 l-12">
    			<?php echo anchor('#', 'Add and Edit Gear', 'class="button disabled-btn margin-bottom"')?>
                <?php echo anchor('mngr/show_members', 'Add and Edit Members', 'class="button margin-bottom"')?>
                <?php echo anchor('mngr/show_gear_sets', 'Add and Edit Gear Sets', 'class="button margin-bottom"')?>
                <?php echo anchor('orders', 'Orders', 'class="button margin-bottom"')?>
                <?php echo anchor('received', 'Received', 'class="button margin-bottom"')?>
            </div>
            <div class="s-12 m-12 l-12">
            <small><?php echo anchor('mngr/download_gear', 'Download Gear') .
                        ' | ' . anchor('mngr/download_all_data', 'Generate Files') .
                        ' | ' . anchor('mngr/get_boat_gear', 'Boat Gear') .
                        ' | ' . anchor('mngr/download_boat_gear', 'Download Boat Gear') .
                        ' | ' . anchor('mngr/get_other_gear', 'Other Gear') .
                        ' | ' . anchor('mngr/download_other_gear', 'Download Other Gear') .
                        ' | ' . anchor('mngr/download_all_gear', 'Download All Gear') .
                        ' | ' . anchor('mngr/download_zip', 'Download Zip'); ?></small>
            </div>
            <article class="s-12 m-12 l-12">
             <div class="s-12 m-4 l-10">
             <table>
             	<thead>
                 	<tr>
                 		<td>Description</td><td>Quantity</td><td>Issued</td><td>Location</td><td>Delete</td>
                 	</tr>
             	</thead>
             	<tbody>
             	<?php if($gear != NULL) {
             	    foreach($gear as $item) {
             	    ?>
             		<tr>
             			<td><?php echo anchor('mngr/edit_gear/' . $item['id_gear'],
             			    $item['desc']); ?>
             			</td>
             			<td><?php echo $item['qty']; ?></td>
             			<td><?php echo $item['issued']; ?></td>
             			<td><?php echo $item['location']; ?></td>
             			<td>
             				<?php echo anchor('mngr/delete_gear/' . $item['id_gear'], 'Delete'); ?>
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
             	<?php
                  if($gear_type == 'gear') {
                    $gear_str = 'mngr';
                  }

                  if($gear_type == 'boat') {
                    $gear_str = 'mngr/get_boat_gear';
                  }

                  if($gear_type == 'other') {
                    $gear_str = 'mngr/get_other_gear';
                  }
                  echo anchor($gear_str . '/1', ' &nbsp;  &nbsp; ', 'class="icon-sli-control-start"')?>
             	<?php
             	    if($pg <= 1){
             	        echo '';
             	    }
                 	else {
                 	    $link = $gear_str . '/'.($pg - 1);
                 		$btn = 'class="icon-sli-control-rewind"';
                 		echo anchor($link, ' &nbsp;  &nbsp; ', $btn);
                 	}
                 ?>

                 <?php
                 	if($pg >= $no_pages){
                 	    echo '';
                 	}
                 	else {
                 	    $link = $gear_str . '/'.($pg + 1);
                 	    //$btn = 'class="button submit-btn margin-bottom"';
                 	    $btn = 'class="icon-sli-control-forward"';
                 	    echo anchor($link, ' &nbsp;  &nbsp; ', $btn);
                 	    echo ' ';
                 	}
                 ?>

                <?php echo anchor($gear_str . '/' . $no_pages, ' &nbsp;  &nbsp; ', 'class="icon-sli-control-end"')?>
             </div>
             <div class="s-12 m-12 l-12">&nbsp;</div>
             <div class="s-12 m-3 l-3">
        		<a class="button s-12 margin-bottom" href="<?php echo base_url() ;?>index.php/mngr/edit_gear">Add Gear</a>
        	</div>
          </article>
		</div>
    </div>
    </div>
</section>
