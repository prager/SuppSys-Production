<section>
	<?php echo form_open('public_ctl/send_msg', array('class' => 'customform')); ?>
        <div class="line">
        	<div class="box margin-bottom">
        	<div class="margin">
        		<div class="s-12 l-12"><h4>Send Message</h4><br></div>
        		<div class="s-12 l-4">
        			<input name="name" placeholder="Your Name" title="Your Name" type="text" />
        		</div>
        		<div class="s-12 l-4">
        			<input name="email" placeholder="Your Email" title="Your Email" type="text" />
        		</div>
        		<div class="s-12 l-4">
        			<input name="subj" placeholder="Subject" title="Subject" type="text" />
        		</div>
        		<div class="s-12"><textarea placeholder="Your message" name="" rows="5"></textarea></div>
        	</div>
        		<div class="s-12 l-2 right"><button type="submit">Send Message</button></div> 
        	</div>        
        </div>
	<?php echo form_close(); ?>
</section>
