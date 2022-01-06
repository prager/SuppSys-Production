<section>
	<?php echo form_open('received/load_received/' . $id_received, array('class' => 'customform')); ?>
        <div class="line">

<div class="s-12 m-12 l-12">
    <div class="box">
        <div class="grid margin">

        <div class="s-12 m-12 l-12">
        <h4>Add/Edit Received</h4>
				<p><?php echo anchor('received', 'Show Received') . ' | ' . anchor('mngr', 'Home Page'); ?></p>
				<br>
										<div class="radio">
								      <label><input type="radio" name="purch" value="fedmall" <?php if ($type == 0) echo "checked";?>><small>FedMall</small></label>
								      <label><input type="radio" name="purch" value="gpc" <?php if ($type == 1) echo "checked";?>><small>GPC</small></label>
						    		</div>
        </div>
        <!-- First Line -->
        <div class="s-12 m-6 l-6"><label for="desc"><small>Description</small></label></div>
        <div class="s-12 m-3 l-3">&nbsp;</div>

      <div class="s-12 m-3 l-6">
			<?php
        	$data = array(
        		'name' => 'desc',
        		'placeholder' => 'Enter Description',
        		'title' => 'Enter Description');
        	echo form_input($data, $desc);
        	?>
			</div>
            <div class="s-12 m-3 l-3">&nbsp;</div>
        <!-- End of first line -->
        <br>
        <!-- First Line -->
            <div class="s-12 m-6 l-6"><label for="desc"><small>Vendor</small></label></div>
            <div class="s-12 m-3 l-3">&nbsp;</div>

            <div class="s-12 m-3 l-6">
			<?php
        	$data = array(
        		'name' => 'vendor',
        		'placeholder' => 'Enter Vendor',
        		'title' => 'Enter Vendor');
        	echo form_input($data, $vendor);
        	?>
			</div>
            <div class="s-12 m-3 l-3">&nbsp;</div>
        <!-- End of first line -->
        <br>
        <!-- Second Line -->
            <div class="s-12 m-4 l-4"><label for="price"><small>Price</small></label></div>
            <div class="s-12 m-3 l-4"><label for="qty"><small>Quantity</small></label></div>
            <div class="s-12 m-4 l-4">&nbsp;</div>

            <div class="s-12 m-4 l-4">
            <?php
        	$data = array(
        		'name' => 'price',
        		'placeholder' => 'Enter Price',
        		'title' => 'Enter Part No');
        	echo form_input($data, $price);
        	?>
            </div>
            <div class="s-12 m-4 l-4">
			<?php
        	$data = array(
        	    'type' => 'number',
        		'name' => 'qty',
        		'placeholder' => 'Enter Quantity',
        		'title' => 'Enter Quantity');
        	echo form_input($data, $qty);
        	?>
			</div>
            <div class="s-12 m-3 l-3">&nbsp;</div>
        <!-- End of Second line -->
        <br>
        <!-- Second Line -->
            <div class="s-12 m-4 l-4"><label for="part_no"><small>Item No.</small></label></div>
            <div class="s-12 m-3 l-4"><label for="supp_part_no"><small>Shipped From</small></label></div>
            <div class="s-12 m-4 l-4">&nbsp;</div>

            <div class="s-12 m-4 l-4">
            <?php
        	$data = array(
        		'name' => 'item_no',
        		'placeholder' => 'Enter Item No',
        		'title' => 'Enter Item No');
        	echo form_input($data, $item_id);
        	?>
            </div>
            <div class="s-12 m-4 l-4">
			<?php
        	$data = array(
        		'name' => 'shipped_from',
        		'placeholder' => 'Enter Shipped From',
        		'title' => 'Enter Shipped From');
        	echo form_input($data, $shipped_from);
        	?>
			</div>
            <div class="s-12 m-3 l-3">&nbsp;</div>
        <!-- End of Second line -->
        <br>
        <!-- Third Line -->
            <div class="s-12 m-4 l-4"><label for="order_date"><small>Received Date</small></label></div>
            <!--<div class="s-12 m-4 l-4"><label for="received_date"><small>Received Date</small></label></div>-->
            <div class="s-12 m-2 l-2">&nbsp;</div>
						<br>
            <!--<div class="s-12 m-4 l-4">
            <?php
        	/*$data = array(
        	    'type' => 'date',
        		'name' => 'order_date',
        		'title' => 'Order Date'
        	);
        	echo form_input($data, $order_date);*/
        	?>
				</div>-->
				<div class="s-12 m-4 l-4">&nbsp;</div>
            <div class="s-12 m-4 l-4">
			<?php
        	$data = array(
        	    'type' => 'date',
        		'name' => 'date',
        		'title' => 'Received Date');
        	echo form_input($data, $date);
        	?>
			</div>
			<div class="s-12 m-4 l-4">&nbsp;</div>
			<!-- End of first line -->
			<br>
			<!-- First Line -->
					<div class="s-12 m-6 l-6"><label for="desc"><small>Remark</small></label></div>
					<div class="s-12 m-3 l-3">&nbsp;</div>

					<div class="s-12 m-3 l-6">
		<?php
				$data = array(
					'name' => 'remark',
					'placeholder' => 'Enter Remark',
					'title' => 'Enter Remark');
				echo form_input($data, $vendor);
				?>
		</div>
					<div class="s-12 m-3 l-3">&nbsp;</div>
			<!-- End of first line -->
        <br>
        <div class="s-12 m-2 l-2">&nbsp;</div>
        <div class="s-12 m-2 l-2"><button type="submit">Add/Edit Received</button></div>
        </div>
    </div>
    <div class="line">&nbsp;</div>
</div>
        </div>
	<?php echo form_close(); ?>
</section>
