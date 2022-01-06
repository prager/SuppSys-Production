<section>
	<?php echo form_open('mngr/load_gear_set/' . $gear_set['id_gear_sets'], array('class' => 'customform')); ?>
        <div class="line">
        	<div class="box margin-bottom">
        		<div class="s-12 l-12">
        		<h4>Add Gear</h4></div>
        		<div class="s-12 l-5">
        			<small>Gear Set Description</small>
        		</div>
        		<div class="s-12 l-4">&nbsp;</div>
        		<div class="s-12 l-3">&nbsp;</div>
        		<div class="s-12 l-5">
        			<?php 
        			 $data = array(
        			     'name' => 'description',
        			     'placeholder' => 'Enter Description',
        			     'title' => 'Description'
        			 );
        			 echo form_input($data, $gear_set['description']);
        			?>
        		</div>        		
        		<div class="s-12 l-4">&nbsp;</div>
        		<div class="s-12 l-3">&nbsp;</div>        		
        		<div class="s-12 l-2">
        		<button type="submit">Add Gear Item</button>
        		</div>
        		<div class="s-12 m-6 l-6">
                	<h4>Select Item</h4>
                </div>
                <div class="s-12 m-6 l-6">
                	<p>Gear Items</p>
                </div>
        		<div class="s-12 l-12">&nbsp;</div> 
        	</div>        
        </div>
	<?php echo form_close(); ?>
</section>
