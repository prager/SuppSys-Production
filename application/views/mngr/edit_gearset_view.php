<section>
	<?php 
	       echo form_open('mngr/load_gearset/' . $gearset['id_gear_sets'], array('class' => 'customform')); ?>
        <div class="line">
        <div class="box margin-bottom">
        		<div class="s-12 l-12">
        		<?php if($gearset['id_gear_sets'] != 0) {?>
        		<h4>Edit Edit Gear Set</h4>
        		<?php } else {?>
        		<h4>Add Gear Set</h4>
        		<p>(<?php echo anchor('mngr/show_gear_sets', 'Cancel'); ?>)</p>
        		</div>
        		<?php }?>
        		<div class="s-12 l-4">
        			<small>Description</small>
        		</div>
        		<div class="s-12 l-8">&nbsp;</div>
        		<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'desc',
        			     'placeholder' => 'Enter Description',
        			     'title' => 'Enter Description'
        			 );
        			 echo form_input($data, $gearset['description']);
        			?>
        		</div>
        		<div class="s-12 l-12">&nbsp;</div>
        		<?php if($gearset['id_gear_sets'] != 0) {?>
        		<div class="s-12 m-6 l-6">
                	<h4>Gear Included</h4>
                </div>
                <?php }?>
                <div class="s-12 m-12 l-12">
                	<h4>Available Gear</h4>
                </div>
                <div class="s-12 m-4 l-4">
                			<?php 
                			$i = 0;
                			foreach ($gear[0] as $item) {?>
                <input name="incl-<?php echo $i?>" value="<?php echo $item['id_gear']?>" type="checkbox" />
                				<label>
                				<?php echo $item['desc'] . '<br>'; 
                				      $i++; ?>
								</label>
                			<?php }?>
                </div>
                <div class="s-12 m-4 l-4">
                			<?php foreach ($gear[1] as $item) {?>
                <input name="incl-<?php echo $i?>" value="<?php echo $item['id_gear']?>" type="checkbox" />
                				<label>
                				<?php echo $item['desc']  . '<br>';  
                				      $i++; ?>
								</label>
                			<?php }?>
                </div>
                <div class="s-12 m-4 l-4">
                			<?php foreach ($gear[2] as $item) {?>
                <input name="incl-<?php echo $i?>" value="<?php echo $item['id_gear']?>" type="checkbox" />
                				<label>
                				<?php echo $item['desc']  . '<br>';  
                				      $i++; ?>
								</label>
                			<?php }?>
                </div>
        		<div class="s-12 l-12">&nbsp;</div>  
        		<div class="s-12 l-2">
        		<?php if($gearset['id_gear_sets'] != 0) {?>
        		<button type="submit">Submit Changes</button>
        		<?php } else {?>
        		<button type="submit">Add Gear Set</button>
        		<?php } ?>
        		</div>
        	</div>	
        	</div> 
	<?php echo form_close(); ?>
</section>
