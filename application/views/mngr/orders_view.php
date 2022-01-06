<section>
    <div class="line">
    <div class="box margin-bottom">
        <div class="line">
            <div class="s-12 m-12 l-12">
    			<?php echo anchor('mngr', 'Add and Edit Gear', 'class="button margin-bottom"')?>
                <?php echo anchor('mngr/show_members', 'Add and Edit Members', 'class="button margin-bottom"')?>
                <?php echo anchor('mngr/show_gear_sets', 'Add and Edit Gear Sets', 'class="button margin-bottom"')?>
                <?php echo anchor('#', 'Orders', 'class="button disabled-btn margin-bottom"')?>
                <?php echo anchor('received', 'Received', 'class="button margin-bottom"')?>
            </div>
            <article class="s-12 m-12 l-12">
            <div class="s-12 m-12 l-12">
            <small><?php echo anchor('orders', 'All Orders')
              . ' | ' . anchor('orders/fedmall', 'FedMall')
                . ' | ' . anchor('orders/download_fed', 'Download FedMall')
                . ' | ' . anchor('orders/gpc', 'GPC')
                  . ' | ' . anchor('orders/received', 'Received Orders')
                    . ' | ' . anchor('orders/open', 'Open Orders')
              . ' | ' . anchor('orders/download_orders', 'Download'); ?></small>
            </div>
             <div class="s-12 m-12 l-12">
             <table>
             	<thead>
                 	<tr>
                 		<td>Description</td><td>Doc Num</td><td>Qty</td><td>Ord Date</td>
                 		<td>Inv No</td><td>Rec Date</td><td>Remarks</td><td>Del</td>
                 	</tr>
             	</thead>
             	<tbody>
             	<?php if($orders != NULL) {
             	    foreach($orders as $item) {
             	    ?>
             		<tr>
             			<td><?php echo anchor('orders/edit_order/' . $item['id_orders'],
             			    $item['desc']); ?>
             			</td>
             			<td><?php echo $item['doc_no']; ?></td>
             			<td><?php echo $item['qty']; ?></td>
             			<td><?php echo $item['order_date']; ?></td>
             			<td><?php echo $item['invoice_no']; ?></td>
             			<td><?php echo $item['date_received']; ?></td>
             			<td><?php echo $item['remarks']; ?></td>
             			<td>
             				<?php echo anchor('orders/delete_order/' . $item['id_orders'], 'Del'); ?>
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
        		<a class="button s-12 margin-bottom" href="<?php echo base_url() ;?>index.php/orders/edit_order">Add Order</a>
        	</div>
          </article>
		</div>
    </div>
    </div>
</section>
