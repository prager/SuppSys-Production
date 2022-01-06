<section>
	<?php //echo 'Selected: ' . $selected ?>
	<?php echo form_open('mngr/load_gear/' . $id, array('class' => 'customform')); ?>
        <div class="line">
        	<div class="box margin-bottom">
        		<div class="s-12 m-12 l-12">
        			<h4>Add/Edit Gear (Issued: <?php echo $issued; ?>)</h4>
        			<p><?php echo anchor('mngr/show_gear_sets', 'Gear Sets') . ' | ' . anchor('mngr', 'Gear') .
													' | ' . anchor('mngr/download_gear', 'Download Gear') .
	                        ' | ' . anchor('mngr/download_all_data', 'Generate Files') .
	                        ' | ' . anchor('mngr/get_boat_gear', 'Boat Gear') .
	                        ' | ' . anchor('mngr/download_boat_gear', 'Download Boat Gear') .
	                        ' | ' . anchor('mngr/get_other_gear', 'Other Gear') .
	                        ' | ' . anchor('mngr/download_other_gear', 'Download Other Gear') .
	                        ' | ' . anchor('mngr/download_item', 'Download Other Gear') .
	                        ' | ' . anchor('mngr/download_zip', 'Download Zip'); ?></p>
        		</div>
        		<div class="margin">
        		<div class="s-12 l-4">
        			<small>Enter Description</small>
        		</div>
        		<div class="s-12 l-4">
        			<small>Select Gear Type</small>
        		</div>
        		<div class="s-12 l-4">
        			<small>Quantity</small>
        		</div>
        		<div class="s-12 l-4">
        			<?php
        			 $data = array(
        			     'name' => 'desc',
        			     'placeholder' => 'Enter Description',
        			     'title' => 'Enter Description'
        			 );
        			 echo form_input($data, $desc);
        			?>
        		</div>
        		<div class="s-12 l-4">
        			<?php
        			 echo form_dropdown('type', $types, $selected);
        			?>
        		</div>
        		<div class="s-12 l-2">
        			<?php
        			$data = array(
        			    'type' => 'number',
        			    'name' => 'qty',
        			    'value' => $qty
        			);
        			echo form_input($data);
        			?>
        		</div>
        		<div class="s-12 l-2">&nbsp;</div>
        		<div class="s-12 l-12">&nbsp;</div>

						<div class="s-12 l-4"><small>Enter SN</small></div>
        		<div class="s-12 l-4"><small>Enter Size</small></div>
        		<div class="s-12 l-4">&nbsp;</div>
						<div class="s-12 l-4">
        			<?php
        			 $data = array(
        			     'name' => 'sn',
        			     'placeholder' => 'Serial Number',
        			     'title' => 'Serial Number'
        			 );
        			 echo form_input($data, $sn);
        			?>
        		</div><div class="s-12 l-4">
        			<?php
        			 $data = array(
        			     'name' => 'size',
        			     'placeholder' => 'Size',
        			     'title' => 'Size'
        			 );
        			 echo form_input($data, $size);
        			?>
        		</div>
        		<div class="s-12 l-4">&nbsp;</div>
						<div class="s-12 l-12">&nbsp;</div>
        		<div class="s-12 l-4"><small>Enter Location</small></div>
						<div class="s-12 l-8">&nbsp;</div>
        		<div class="s-12 l-4">
        			<?php
        			 $data = array(
        			     'name' => 'loc',
        			     'placeholder' => 'Gear Location',
        			     'title' => 'Gear Location'
        			 );
        			 echo form_input($data, $location);
        			?>
        		</div>
						<div class="s-12 l-8">&nbsp;</div>

        		</div>
        	<div class="s-12 l-12">&nbsp;</div>
					<?php if ($assg != NULL) {?>
					<div class="s-12 l-12">
						<?php foreach($assg as $mem) {
							echo $mem . '<br>';
						}
						?>
					</div>
				<?php }?>
					<div class="s-12 l-12">&nbsp;</div>
        	<div class="s-12 l-2"><button type="submit">Add/Edit Gear</button></div>
        	</div>
        </div>
	<?php echo form_close(); ?>
</section>
