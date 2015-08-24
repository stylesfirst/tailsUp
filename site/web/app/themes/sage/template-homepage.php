<?php
/**
 * Template Name: Homepage Template
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
<div class="narrative">
    <h2 class="narrative__heading">Adopt, don't shop</h2>
    <p class="narrative__text">
        Most puppies in pet stores are born in inhumane puppy factories.
        By adopting your next best friend, you are giving the gift of life.
    </p>
</div>
<div class="adopt">
    <h2 class="adopt__heading">Available for adoption</h2>
  <?php echo do_shortcode('[products orderby="date" order="desc"]'); ?>
</div>
<div class="how-to">
    <h2 class="how-to__heading">Adopting is easy, but the commitment is forever</h2>
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <img class="how-to__dog" src="<?= get_template_directory_uri(); ?>/dist/images/tailsup-dog.png">
                <p class="how-to__text">Find your match</p>
            </div>
            <div class="col-xs-4">
                <img class="how-to__apply" src="<?= get_template_directory_uri(); ?>/dist/images/tailsup-apply.png">
                <p class="how-to__text">Apply online</p>
            </div>
            <div class="col-xs-4">
                <img class="how-to__love" src="<?= get_template_directory_uri(); ?>/dist/images/tailsup-love.png">
                <p class="how-to__text">Meet and fall in love</p>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <h2 class="process__heading">How the review process works</h2>
    <p class="process__text">
        Once you apply, you should expect a response within seven days.
        We often receive many applications for each dog, and our best efforts are made to match the dog to the most compatible applicant. This can depend on many factors, including special needs, energy level, amount of human contact required, and compatibility with existing pets and children.
    </p>
    <p class="process_text">
        We can work with you to find a dog that is best suited to your life.
    </p>
</div>
