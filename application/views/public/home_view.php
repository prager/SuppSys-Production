      <section>
         <!-- ASIDE NAV AND CONTENT -->
         <div class="line">
            <div class="box margin-bottom">
               <div class="margin">
                  <!-- CONTENT -->
                  <article class="s-12 m-12 l-12">
                     <h3>Supply System</h3>
                     <p>SupplySys is a simple online Supply System provided by JLK Consulting. 
                     You must login to procede.
                     </p> <small>
                     <?php echo anchor('public_ctl/register', 'Register here', 'title="Register"', 'class="right"')?> 
                     </small>  
                  </article>
               </div>
            </div>
         </div>
         <div class="line">
            <div class="box margin-bottom">
               <div class="margin">
                  <!-- CONTENT -->
                  <div class="s-12 l-5">
                     <?php echo form_open('login', array('class' => 'customform')); ?>
                     	<small>Username:</small>
                     	<br>
                     	<?php 
            			 $data = array(
            			     'name' => 'user',
            			     'placeholder' => 'Enter Username',
            			     'title' => 'Enter Username'
            			 );
            			 echo form_input($data);
            			?>
                     	<br>
                     	<small>Password</small>
                     	<br>
                     	<?php 
            			 $data = array(
            			     'name' => 'pass',
            			     'placeholder' => 'Enter Password',
            			     'title' => 'Enter Password'
            			 );
            			 echo form_password($data);
            			?>
                     	<div class="s-12 l-5 center"><button type="submit">Submit</button>
                     	</div>
                     <?php echo form_close(); ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
