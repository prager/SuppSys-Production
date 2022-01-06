<section>
	<?php echo form_open('orders/load_order/' . $id, array('class' => 'customform')); ?>
        <div class="line">

<div class="s-12 m-12 l-12">
    <div class="box">
        <div class="grid margin">

        <div class="s-12 m-12 l-12">
        <h4>Add/Edit Order</h4>
				<p><?php echo anchor('Orders', 'Show Orders') . ' | ' . anchor('mngr', 'Home Page'); ?></p>
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
            <div class="s-12 m-6 l-6"><label for="desc"><small>Supplier</small></label></div>
            <div class="s-12 m-3 l-3">&nbsp;</div>

            <div class="s-12 m-3 l-6">
			<?php
        	$data = array(
        		'name' => 'supplier',
        		'placeholder' => 'Enter Supplier',
        		'title' => 'Enter Supplier');
        	echo form_input($data, $supp);
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
            <div class="s-12 m-4 l-4"><label for="part_no"><small>Part No.</small></label></div>
            <div class="s-12 m-3 l-4"><label for="supp_part_no"><small>Supp. Part No.</small></label></div>
            <div class="s-12 m-4 l-4">&nbsp;</div>

            <div class="s-12 m-4 l-4">
            <?php
        	$data = array(
        		'name' => 'part_no',
        		'placeholder' => 'Enter Part No',
        		'title' => 'Enter Part No');
        	echo form_input($data, $part_no);
        	?>
            </div>
            <div class="s-12 m-4 l-4">
			<?php
        	$data = array(
        		'name' => 'supp_part_no',
        		'placeholder' => 'Enter Supp Part No',
        		'title' => 'Enter Supp Part No');
        	echo form_input($data, $supp_part_no);
        	?>
			</div>
            <div class="s-12 m-3 l-3">&nbsp;</div>
        <!-- End of Second line -->
        <br>
        <!-- Third Line -->
            <div class="s-12 m-4 l-4"><label for="order_date"><small>Order Date</small></label></div>
            <div class="s-12 m-4 l-4"><label for="received_date"><small>Received Date</small></label></div>
            <div class="s-12 m-2 l-2">&nbsp;</div>

            <div class="s-12 m-4 l-4">
            <?php
        	$data = array(
        	    'type' => 'date',
        		'name' => 'order_date',
        		'title' => 'Order Date'
        	);
        	echo form_input($data, $order_date);
        	?>
            </div>
            <div class="s-12 m-4 l-4">
			<?php
        	$data = array(
        	    'type' => 'date',
        		'name' => 'received_date',
        		'title' => 'Received Date');
        	echo form_input($data, $received_date);
        	?>
			</div>
        <!-- End of Third line -->

        <br>
        <!-- Fourth Line -->
            <div class="s-12 m-4 l-4"><label for="part_no"><small>Document No.</small></label></div>
            <div class="s-12 m-4 l-4"><label for="supp_part_no"><small>Invoice No.</small></label></div>
            <div class="s-12 m-2 l-2">&nbsp;</div>

            <div class="s-12 m-4 l-4">
            <?php
        	$data = array(
        		'name' => 'doc_no',
        		'placeholder' => 'Enter Document No',
        		'title' => 'Enter Document No');
        	echo form_input($data, $doc_no);
        	?>
            </div>
            <div class="s-12 m-4 l-4">
			<?php
        	$data = array(
        		'name' => 'inv_no',
        		'placeholder' => 'Enter Invoice No',
        		'title' => 'Enter Invoice No');
        	echo form_input($data, $inv_no);
        	?>
			</div>
        <!-- End of Fourth line -->
        <br>
		<!-- First Line -->
            <div class="s-12 m-6 l-6"><label for="desc"><small>Remarks</small></label></div>
            <div class="s-12 m-3 l-3">&nbsp;</div>

            <div class="s-12 m-3 l-6">
			<?php
        	$data = array(
        		'name' => 'remarks',
        		'placeholder' => 'Enter Remarks',
        		'title' => 'Enter Remarks');
        	echo form_input($data, $remarks);
        	?>
			</div>
            <div class="s-12 m-3 l-3">&nbsp;</div>
        <!-- End of first line -->
        <br>
        <!-- First Line -->
            <div class="s-12 m-6 l-6"><label for="desc"><small>URL</small></label></div>
            <div class="s-12 m-3 l-3">&nbsp;</div>

            <div class="s-12 m-6 l-6">
			<?php
        	$data = array(
        		'name' => 'url',
        		'placeholder' => 'Enter URL',
        		'title' => 'Enter URL');
        	echo form_input($data, $url);
        	?>
			</div>
            <div class="s-12 m-3 l-3">&nbsp;</div>
        <!-- End of first line -->
        <br>
        <div class="s-12 m-2 l-2">&nbsp;</div>
        <div class="s-12 m-2 l-2"><button type="submit">Add/Edit Order</button></div>
        </div>
    </div>
    <div class="line">&nbsp;</div>
</div>
        </div>
	<?php echo form_close(); ?>
</section>
