        </div><!-- end content -->

    </div><!-- end wrap -->
    

    <footer>
        <div id="footer-text">
            <div id="two-column1">
				<p class="address">UC Santa Cruz, 1156 High Street, Santa Cruz, CA 95064<br /> &copy; 2014 The Regents of the University of California. All Rights Reserved.</p>
			</div>
            <div id="two-column2">
            	<p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>
                <img src="/themes/ucsc-omeka/images/imls.png" alt="Logo for the Institute of Museum and Library Services" />
                <p>This project was made possible in part by the Institute of Museum and Library Services</p>
            </div>
        </div>

        <?php fire_plugin_hook('public_footer'); ?>

    </footer><!-- end footer -->

    <script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.showAdvancedForm();        
        Omeka.moveNavOnResize();        
        Omeka.mobileMenu();        
    });
    </script>

</body>
</html>
