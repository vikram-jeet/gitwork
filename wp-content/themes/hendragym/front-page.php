<!-- Header -->
<?php get_header(); ?>

<?php
global $centireThemeTemplate;

echo $centireThemeTemplate->slider();

if(have_posts()) {
while (have_posts()) {
the_post();

the_content();

}

}


$centireThemeTemplate->sections();

get_footer(); ?>