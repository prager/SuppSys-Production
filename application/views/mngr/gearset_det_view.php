<section>
        <div class="line">
        	<div class="box margin-bottom">        	
        		<div class="s-12 m-4 l-4">
        		<h4><?php echo $description; ?></h4>        			
        			<p><?php echo anchor('mngr/show_gear_sets', 'Gear Sets') . ' | ' . anchor('mngr', 'Gear') . 
        			' | ' . anchor('mngr/show_members', 'Members'); ?></p>
        		</div>
        		<div class="s-12 m-12 l-12">&nbsp;</div>
        		<div class="s-12 m-8 l-8">
        		<?php if($members != NULL) {?>
                 	<table>
                 	<thead>
                     	<tr>
                     		<td>Member</td>
                     		<td>Delete</td>
                     	</tr>
                 	</thead>
                 	<tbody>
                 	<?php
                 	    foreach($members as $mem) {
                 	    ?>
                 		<tr>
                 			<td><?php echo anchor('mngr/edit_member/' . $mem['id'], $mem['lname'] . ' ' . $mem['fname']); ?></td>            			 
             			<td>
             				<?php echo anchor('mngr/delete_member/' . $mem['id'], 'Delete'); ?>             			
             			</td>  
                 		</tr>
                 	<?php }?>
                 	</tbody>
                 </table>
             <?php }
             else { ?>
             <p>Not assigned to any member</p>
             <?php }?>
             </div>
        	<div class="s-12 m-4 l-4">&nbsp;</div>  
        	<div class="s-12 m-12 l-12">&nbsp;</div>
        	<div class="s-12 m-8 l-8">
             <table>
                 	<thead>
                     	<tr>
                     		<td>Gear Items</td>
                     		<td>ID Gear Sets</td>
                     		<td>Qty</td>
                     		<td>Remove</td>
                     	</tr>
                 	</thead>
                 	<tbody>
                 	<?php
                 	    foreach($gearset as $item) {
                 	    ?>
                 		<tr>
                 			<td><?php echo anchor('mngr/edit_gear/'. $item['id'], $item['description']); ?></td>
                 			<td><?php echo $item['id']; ?></td>
                 			<td><?php echo $item['qty']; ?></td>
                 			<td><?php echo anchor('mngr/remove_item/' . $id_gearset . '/' . $item['id'], 'Remove'); ?>
                 		</tr>
                 	<?php }?>
                 	</tbody>
                 </table>
             </div>
        	<div class="s-12 l-12">&nbsp;</div>
        	<?php echo form_open('mngr/update_gearset/' . $id_gearset, array('class' => 'customform')); ?>
        	
        		<div class="s-12 l-12">
        			<small>Edit Description</small>
        		</div>
        	<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'desc',
        			     'placeholder' => 'Enter Description',
        			     'title' => 'Enter Description'
        			 );
        			 echo form_input($data, $description);
        			?>
        		</div>
        		<div class="s-12 l-12">&nbsp;</div> 
        	<div class="s-12 m-12 l-12">
                	<h4>Available Gear</h4>
                </div>
            
                <div class="s-12 m-4 l-4">
                			<?php 
                			$i = 0;
                			foreach ($gear[0] as $item) {?>
                <input name="incl-<?php echo $i?>" value="<?php echo $item['id']?>" type="checkbox" />
                				<label>
                				<?php echo $item['description'] . '<br>'; 
                				      $i++; ?>
								</label>
                			<?php }?>
                </div>
                <div class="s-12 m-4 l-4">
                			<?php foreach ($gear[1] as $item) {?>
                <input name="incl-<?php echo $i?>" value="<?php echo $item['id']?>" type="checkbox" />
                				<label>
                				<?php echo $item['description'] . '<br>';  
                				      $i++; ?>
								</label>
                			<?php }?>
                </div>
                <div class="s-12 m-4 l-4">
                			<?php foreach ($gear[2] as $item) {?>
                <input name="incl-<?php echo $i?>" value="<?php echo $item['id']?>" type="checkbox" />
                				<label>
                				<?php echo $item['description'] . '<br>';  
                				      $i++; ?>
								</label>
                			<?php }?>
                </div>
        		<div class="s-12 l-12">&nbsp;</div>
        		<div class="s-12 l-2">
        		<button type="submit">Submit Changes</button>
        		<?php echo form_close(); ?>
        		</div>
        	</div> 
        	</div> 
</section>
