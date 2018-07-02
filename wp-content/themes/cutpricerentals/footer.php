<footer id="footer">
    <div class="container">
        <div class="row no-gutters row-eq-height">
            <div class="col-xs-12 col-sm-6 col-xl-7">
                <div class="map-wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d774.7524409338615!2d174.16674232776106!3d-39.03789681284414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d1450c30287b7f9%3A0x27ee25474df465c8!2s131+De+Havilland+Dr%2C+Bell+Block%2C+New+Plymouth+4373!5e0!3m2!1sen!2snz!4v1526461368447" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-xl-5">
                <div class="contacts-wrapper">
                    <ul>
                        <li class="mobile"><a href="tel:<?=formatPhoneNumber(get_option('mobile'))?>"><?=get_option('mobile')?></a></li>
                        <li class="phone"><a href="tel:<?=formatPhoneNumber(get_option('phone'))?>"><?=get_option('phone')?></a></li>
                        <li class="email"><a href="mailto:<?=get_option('email')?>"><?=get_option('email')?></a></li>
                        <li class="location"><?=get_option('address')?></li>
                    </ul>
                    <a href="<?=get_page_link(23)?>" class="contact-us btn btn-primary">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<section id="copyright">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <?=get_bloginfo('name')?>. <span>Website by <a href="https://www.designgarage.co.nz/" target="_blank">Design Garage</a></span>
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>