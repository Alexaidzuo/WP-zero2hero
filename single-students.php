<?php get_header('single'); ?>
<header class="container">
    <h3 class="singlePage-postTitle"><?php the_title() ?></h3>
</header>
<section class="students-single-section">
<div class="container clearfix">
<?php if ( have_rows( 'student' ) ) : ?>
<?php while ( have_rows( 'student' ) ) : the_row(); ?>
    <div class="student-profile">
<?php $profil_picture = get_sub_field( 'profil_picture' ); ?>
        <div class="student-picture">
<?php if ( $profil_picture ) { ?>
            <img src="<?php echo $profil_picture['url']; ?>" alt="<?php echo $profil_picture['alt']; ?>" />
<?php } ?>
        </div>
        <h4 class="studentName"><?php the_sub_field( 'student_full_name' );
?></h4>
<?php $student_cv = get_sub_field( 'student_cv' ); ?>
        <div class="cvLink">
<?php if ( $student_cv ) { ?>
            <i class="fas fa-file-pdf"><a href="<?php echo $student_cv['url']; ?>" target="_blank"> Curriculum
                    Vitae</a></i>
<?php } ?>
        </div>
        <div class="githubLink"><i class="fab fa-github"><a href="<?php the_sub_field( 'git_profile' ); ?>"
                    target="_blank"> GitHub Projekat</a></i></div>
    </div>
<?php endwhile; ?>
<?php else : ?>
<?php // no rows found ?>
<?php endif; ?>
</div>
</section>

<?php
get_footer();