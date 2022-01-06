<section>
 <!-- ASIDE NAV AND CONTENT -->
 <div class="line">
    <div class="box margin-bottom">
            <div class="s-12 m-12 l-12">
    			<?php echo anchor('mngr', 'Add and Edit Gear', 'class="button margin-bottom"')?>
                <?php echo anchor('mngr/show_members', 'Add and Edit Members', 'class="button margin-bottom"')?>
                <?php echo anchor('#', 'Add and Edit Gear Sets', 'class="button disabled-btn margin-bottom"')?>
                <?php echo anchor('orders', 'Orders', 'class="button margin-bottom"')?>
                <?php echo anchor('received', 'Received', 'class="button margin-bottom"')?>
            </div>
             <div class="s-12 m-4 l-8">
             <table>
             	<thead>
                 	<tr>
                 		<td>Description</td><td>Copy</td><td>Delete</td>
                 	</tr>
             	</thead>
             	<tbody>

 <!-- add accordion https://www.w3schools.com/howto/howto_js_accordion.asp -->

             	<?php if($gearsets != NULL) {
             	    foreach($gearsets as $gearset) {
             	    ?>
             		<tr>
             			<td><?php echo anchor('mngr/show_gearset_det/' . $gearset['id'],
             			    $gearset['desc']); ?>
             			</td>
             			<td>
             				<?php echo anchor('mngr/copy_gearset/' . $gearset['id'], 'Copy'); ?>
             			</td>
             			<td>
             				<?php
             				if(!$gearset['assigned']) {
             				   echo anchor('mngr/delete_gearset/' . $gearset['id'], 'Delete');
             				}
             				else {
             				    echo 'Assigned';
             				}
             				   ?>
             			</td>
             		</tr>
             	<?php
             	    }
             	   }?>
             	</tbody>
             </table>
             </div>
             <div class="s-12 m-12 l-12">&nbsp;</div>
             <div class="s-12 m-3 l-3">
        		<a class="button s-12 margin-bottom" href="<?php echo base_url() ;?>index.php/mngr/edit_gearset">Add Gear Set</a>
        	</div>
    </div>
 </div>
</section>
