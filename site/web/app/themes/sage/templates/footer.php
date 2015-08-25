<footer class="content-info footer" role="contentinfo">
  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="recruit">
                <h2 class="recruit__heading">Use this software</h2>
                <p class="recruit__text">
                    Tails up adoption software is open source and maintained by volunteers.
                </p>
                <p class="recruit__text">
                    This is an example site. It's almost ready to be used by animal rescue organisations. If you would like to use it, please stay tuned.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="about-organisation">
                <h2 class="about-organisation__heading">
                  <?php echo get_theme_mod( 'name_textbox', 'Organisation name goes here' ); ?>
                </h2>
                <p class="about-organisation__text">
                  <?php echo get_theme_mod( 'bio_textarea', 'Organisation bio goes here' ); ?>
                </p>
            </div>
        </div>
    </div>
      <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
