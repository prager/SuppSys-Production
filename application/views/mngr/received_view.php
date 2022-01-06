<section>
    <div class="line">
    <div class="box margin-bottom">
        <div class="line">
            <div class="s-12 m-12 l-12">
    			<?php echo anchor('mngr', 'Add and Edit Gear', 'class="button margin-bottom"')?>
                <?php echo anchor('mngr/show_members', 'Add and Edit Members', 'class="button margin-bottom"')?>
                <?php echo anchor('mngr/show_gear_sets', 'Add and Edit Gear Sets', 'class="button margin-bottom"')?>
                <?php echo anchor('orders', 'Orders', 'class="button margin-bottom"')?>
                <?php echo anchor('#', 'Received', 'class="button disabled-btn margin-bottom"')?>
            </div>
            <article class="s-12 m-12 l-12">
            <div class="s-12 m-12 l-12">
            <small><?php echo anchor('received', 'Received')
            /*  . ' | ' . anchor('orders/fedmall', 'FedMall')
                . ' | ' . anchor('orders/gpc', 'GPC')
                  . ' | ' . anchor('orders/closed', 'Closed Orders')
                    . ' | ' . anchor('orders/open', 'Open Orders')*/
              . ' | ' . anchor('received/download_received', 'Download'); ?></small>
            </div>
             <div class="s-12 m-12 l-12">
             <table>
             	<thead>
                 	<tr>
                 		<td>Description</td><td>Vendor</td><td>Date</td><td>Qty</td>
                 		<td>Remark</td><td>Del</td>
                 	</tr>
             	</thead>
             	<tbody>
             	<?php if($received != NULL) {
             	    foreach($received as $item) {
             	    ?>
             		<tr>
             			<td><?php echo anchor('received/edit_received/' . $item['id_received'],
             			    $item['desc']); ?>
             			</td>
             			<td><?php echo $item['vendor']; ?></td>
             			<td><?php echo $item['date']; ?></td>
             			<td><?php echo $item['qty']; ?></td>
             			<td><?php echo $item['remark']; ?></td>
             			<td>
             				<?php echo anchor('received/delete_received/' . $item['id_received'], 'Del'); ?>
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
             	<?php echo anchor('mngr/1', ' &nbsp;  &nbsp; ', 'class="icon-sli-control-start"')?>
             	<?php
             	    if($pg <= 1){
             	        echo '';
             	    }
                 	else {
                 	    $link = 'mngr/'.($pg - 1);
                 		$btn = 'class="icon-sli-control-rewind"';
                 		echo anchor($link, ' &nbsp;  &nbsp; ', $btn);
                 	}
                 ?>

                 <?php
                 	if($pg >= $no_pages){
                 	    echo '';
                 	}
                 	else {
                 	    $link = 'mngr/'.($pg + 1);
                 	    //$btn = 'class="button submit-btn margin-bottom"';
                 	    $btn = 'class="icon-sli-control-forward"';
                 	    echo anchor($link, ' &nbsp;  &nbsp; ', $btn);
                 	    echo ' ';
                 	}
                 ?>

                <?php echo anchor('orders/' . $no_pages, ' &nbsp;  &nbsp; ', 'class="icon-sli-control-end"')?>
             </div>
             <div class="s-12 m-12 l-12">&nbsp;</div>
             <div class="s-12 m-3 l-3">
        		<a class="button s-12 margin-bottom" href="<?php echo base_url() ;?>index.php/received/edit_received">Add Received</a>
        	</div>
          </article>
		</div>
    </div>
    </div>
</section>
