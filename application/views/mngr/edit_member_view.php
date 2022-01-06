<section>
	<?php echo form_open('mngr/load_member/' . $member['id_members'], array('class' => 'customform')); ?>
        <div class="line">
        	<div class="box margin-bottom">
        		<div class="s-12 l-12">
        		<?php if($member['id_members'] != 0) {?>
        		<h4>Edit Member</h4>
        		<?php } else {?>
        		<h4>Add Member</h4>
        		<?php }?>
        		</div>
        		<div class="s-12 m-4 l-4">        			
        			<p><?php echo anchor('mngr/show_gear_sets', 'Gear Sets') . ' | ' . anchor('mngr', 'Gear') . 
        			' | ' . anchor('mngr/show_members', 'Members') . ' | ' . 
        			anchor('mngr/download_assigned_gear/' . $member['id_members'], 'Download Details'); ?></p>
        		</div>
        		<div class="s-12 m-8 l-8">&nbsp;</div>
        		<div class="margin">
        		<div class="s-12 l-4">
        			<small>Last Name</small>
        		</div>
        		<div class="s-12 l-4">
        			<small>First Name</small>
        		</div>
        		<div class="s-12 l-4">&nbsp;</div>
        		<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'lname',
        			     'placeholder' => 'Enter Last Name',
        			     'title' => 'Enter Last Name'
        			 );
        			 echo form_input($data, $member['lname']);
        			?>
        		</div>
        		<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'fname',
        			     'placeholder' => 'Enter First Name',
        			     'title' => 'Enter First Name'
        			 );
        			 echo form_input($data, $member['fname']);
        			?>
        		</div>
        		</div>
        		
        		<?php 
        		if(!$flag) {
        		if($member['id_members'] != 0) {?>
        		<div class="s-12 m-8 l-8">
                 	<table>
                 	<thead>
                     	<tr>
                     		<td>Gearset</td><td>Select to Assign</td>
                     	</tr>
                 	</thead>
                 	<tbody>
                 	<?php if($gearsets != NULL) {
                 	    $i = 0;
                 	    foreach($gearsets as $item) {
                 	    ?>
                 		<tr>
                 			<td><?php echo anchor('mngr/show_gearset_det/' . $item['id'] . '/' . $member['id_members'], 
                 			    $item['desc']); ?></td>             			 
                 			<td>
                 				<?php                 				
                 				if($gearset['id_gear_sets'] != $item['id']) {?>
                 					<input name="gearset" value="<?php echo $item['id']?>" type="radio" />
                 					<label for="<?php echo $item['id']?>">Assign <?php echo $item['desc']?></label>
                 				<?php }
                 				else {?>
                 					<input name="gearset" value="<?php echo $item['id']?>" type="radio" checked />
                 					<label for="<?php echo $item['id']?>">Assign <?php echo $item['desc'] .
                 					anchor('mngr/unassign_gearset/' . $item['id'] . '/' . $member['id_members'], ' - Unassign')?></label>
                 				<?php }?>
                 			</td>           			
                 		</tr>
                 	<?php
                 	      $i++;
                 	    }
                 	   }?>
                 	</tbody>
                 </table>
             </div>
                <?php }
        		}
        		else {?>
        		<div class="s-12 m-8 l-8">
        		<p>
        		Assigned Gearset: 
        		<?php echo anchor('mngr/show_gearset_det/' . $gearset['id_gear_sets'], $gearset['description']) .  ' | ' .
        		    anchor('mngr/unassign_gearset/' . $gearset['id_gear_sets'] . '/' . $member['id_members'], ' Unassign Gearset'); ?>
        		</p>
        		</div>
        		<?php }?>
        	<div class="s-12 l-12">&nbsp;</div>
    		<div class="s-12 l-2">
    		<?php if($member['id_members'] != 0) {?>
    		<button type="submit">Submit Changes</button>
    		<?php } else {?>
    		<button type="submit">Add Member</button>
    		<?php }?>
    		</div>
        	</div>        		
        </div>
	<?php echo form_close(); ?>
</section>
