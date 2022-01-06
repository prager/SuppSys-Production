<!-- FOOTER -->
      <footer class="line">
         <div class="box">
            <div class="s-12 l-6">
              <small>Copyright &nbsp;&copy;&nbsp; 2020-<script type="text/javascript">
                var today = new Date();
                document.write(today.getFullYear() );
             </script> &nbsp;&nbsp; <a href="https://jlkconsulting.info" title="JLKconsulting">JLK Consulting</a>
              &nbsp;&nbsp; All Rights Reserved</small>
            </div>
            <div class="s-12 l-6">
               <small><a class="right" href="http://www.myresponsee.com" 
               title="GUI Responsive Template designed by Responsee Team">GUI Inspired by Responsee</a></small>
            </div>
         </div>
      </footer>
      <script type="text/javascript" src="<?php echo base_url() ;?>assets/js/responsee.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ;?>assets/owl-carousel/owl.carousel.js"></script>

      <script type="text/javascript">
        jQuery(document).ready(function($) {
          var owl = $('#header-carousel');
          owl.owlCarousel({
            nav: true,
            dots: true,
            items: 1,
            loop: true,
            navText: ["&#xf007","&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000
          });
          var owl = $('#gallery-carousel');
          owl.owlCarousel({
            nav: false,
            dots: true,
            loop: true,
            navText: ["&#xf007","&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
              0: {
                items: 1
              },
              769: {
                items: 2
              },
              960: {
                items: 4
              }
            }
          });
        })
      </script>
   </body>
</html>
