<hr>
<footer>
  <p><?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
</footer>
</div> <!-- /container -->
<?php wp_footer(); ?>
<div class="modal fade" id="contactFrom">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Contact Us</h4>
      </div>
      <div class="modal-body">
        <?php
        if( function_exists( 'ninja_forms_display_form' ) ) ninja_forms_display_form( 1 );
         ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --
</body>
</html>
