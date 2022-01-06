<section>
	<?php echo form_open('public_ctl/send_reg', array('class' => 'customform')); ?>
        <div class="line">
        	<div class="box margin-bottom">
        	<div class="margin">
        		<div class="s-12 l-12"><h4>Registration Form</h4></div>
        		<div class="s-12 l-12"><?php echo $msg . '<br>'; ?></div>
        		<div class="s-12 l-4">
        			<small>Your First Name</small>
        		</div>
        		<div class="s-12 l-4">
        			<small>Your Last Name</small>
        		</div>
        		<div class="s-12 l-4">
        			<small>Your Email</small>
        		</div>
        		<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'fname',
        			     'placeholder' => 'Your First Name',
        			     'title' => 'Your First Name'
        			 );
        			 echo form_input($data, $fname);
        			?>
        		</div>
        		<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'lname',
        			     'placeholder' => 'Your Last Name',
        			     'title' => 'Your Last Name'
        			 );
        			 echo form_input($data, $lname);
        			?>
        		</div>
        		<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'email',
        			     'placeholder' => 'Your Email',
        			     'title' => 'Your Email'
        			 );
        			 echo form_input($data, $email);
        			?>
        		</div>
        		<div class="s-12 l-12">&nbsp;</div>
        		<div class="s-12 l-4">
        			<small>
					Username
					</small>
        		</div>
        		<div class="s-12 l-8">&nbsp;</div>
        		<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'user',
        			     'placeholder' => 'Your Username',
        			     'title' => 'Your Username'
        			 );
        			 echo form_input($data, $user);
        			?>
        		</div>
        		<div class="s-12 l-12">&nbsp;</div>
        		<div class="s-12 l-4">
        			<small>
					Password
					</small>
        		</div>
        		<div class="s-12 l-4">
        			<small>Re-Enter Password</small>
        		</div>
        		<div class="s-12 l-4">&nbsp;</div>
        		<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'pass1',
        			     'placeholder' => 'Enter Password',
        			     'title' => 'Your Password'
        			 );
        			 echo form_password($data);
        			?>
        		</div>
        		<div class="s-12 l-4">
        			<?php 
        			 $data = array(
        			     'name' => 'pass2',
        			     'placeholder' => 'Re-Enter Password',
        			     'title' => 'Re-Enter Your Password'
        			 );
        			 echo form_password($data);
        			?>
        		</div>
        		<div class="s-12 l-12">&nbsp;</div>
        	</div>
        		<div class="s-12 l-2"><button type="submit">Send Registration</button></div> 
        	</div>        
        </div>
	<?php echo form_close(); ?>
</section>
