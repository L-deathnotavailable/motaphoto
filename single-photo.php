<?php
	get_header();

    // Récupération de l'identifiant de la photo (nom) dans l'URL
    $slug = get_query_var('photographies');

    // Construction des critères de recherche
    $args = [
        'post_type' => 'photographies',
        'name' => $slug,
        'posts_per_page' => 1
    ];

    // Requête auprès de la base de données wordpress pour récupérer la photo correspondante
    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post();

        $reference = get_field('reference');
        $type_de_photos = get_field('type_de_photos');
        $annee = get_field('annee');
        $categories = wp_get_post_terms(get_the_ID(), 'cate');
        $formats = wp_get_post_terms(get_the_ID(), 'formats');
?>
    <div class="articlephoto">
		<!-- Zone gauche - Informations photos -->
		<div class="specificationsPhotos">
			<div class="detailsArticle">
				<h2><?php echo the_title();?></h2>
				<p>RÉFÉRENCE : <span id="ref"><?php echo $reference;?></span></p>
				<p>CATÉGORIE : 
					<?php foreach ($categories as $categorie) {
                        echo esc_html($categorie->name);
                    } ?>
				</p>
				<p>FORMAT : 
					<?php foreach ($formats as $format) {
                        echo esc_html($format->name);
                    }
                    ?>
				</p>
				<p>TYPE : <?php echo $type_de_photos;?></p>
				<p>ANNÉE : <?php echo $annee;?></p>
			</div>
		</div>
		<!-- Zone droite - La photo -->
		<div class="photodroite">
			<div class="PContent">
				<?php the_content();?>
			</div>
		</div>
	</div>

    
<!-- Ajout du bandeau d'interactions inférieur -->
    <div class="bandeauSousPhoto">
        <div class="TxtBtnFleche">
            <div class="TxtBtn">
                <p>Cette photo vous intéresse ?</p>
                <button class="ContactezNous">Contact</button>
            </div>
            <div class="tableau">
                <!-- Définition des bornes du tableau pour créer une boucle -->
                <?php 
                    // Requête pour obtenir le dernier post
                    $args_dernier = array(
                        'post_type' => 'photographies', 
                        'posts_per_page' => 1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );

                    $last_post = new WP_Query($args_dernier);

                    // Requête pour obtenir le premier post
                    $args_premier = array(
                        'post_type' => 'photographies', 
                        'posts_per_page' => 1,
                        'orderby' => 'date',
                        'order' => 'ASC',
                    );

                    $first_post = new WP_Query($args_premier);
                ?>
                <div class="GestionFleches">
                    <div class="GestionGauche">
                        <!-- Récupération du post précédent par date de publication ASC (comportement par defaut) -->
                        <?php
                        $previous_post = get_previous_post();
                        // Si le post précédent existe, affichage du post précédent
                        if (!empty($previous_post)) :
                        ?>
                            <a href="<?php echo get_permalink($previous_post); ?>">
                                <img class="flecheNavG" src="<?php echo get_stylesheet_directory_uri() . '/assets/fleche-navigation-gauche.png' ?>" alt="Flèche de gauche" />
                            </a>
                        <!-- Si post précédent non-existant, affichage du dernier post publié -->
                        <?php else :
                            $last_post = $last_post->posts[0];
                        ?>
                            <a href="<?php echo get_permalink($last_post); ?>">
                                <img class="flecheG" src="<?php echo get_stylesheet_directory_uri() . '/assets/fleche-navigation-gauche.png' ?>" alt="Flèche de gauche" />
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="GestionDroite">
                        <!-- Récupération du post suivant par date de publication ASC (comportement naturel) -->
                        <?php
                        $next_post = get_next_post();
                        // Si post suivant existant, affichage du post suivant
                        if (!empty($next_post)) :
                        ?>
                            <a href="<?php echo get_permalink($next_post); ?>">
                                <img class="flecheNavD" src="<?php echo get_stylesheet_directory_uri() . '/assets/fleche-navigation-droite.png' ?>" alt="Flèche de droite" />
                            </a>
                        <!-- Si post suivant non-existant, affichage du premier post publié -->
                        <?php else :
                            $first_post = $first_post->posts[0]; 
                        ?>
                            <a href="<?php echo get_permalink($first_post); ?>">
                                <img class="flecheD" src="<?php echo get_stylesheet_directory_uri() . '/assets/fleche-navigation-droite.png' ?>" alt="Flèche de droite"/>
                            </a>
                        <?php endif; ?>
                    </div>   
                </div>
            </div>
        </div>
    </div>

		    <div class="div-vignettes">
				<div class="conteneur-vignette-precedent">
					<?php
						// Récupération de la photo du post précédent
						if (!empty($previous_post)) {
							$miniature = get_post_field('post_content', $previous_post->ID);
						} else {
							$miniature = get_post_field('post_content', $dernier_post);
						}
						// Affichage du contenu
						echo $miniature;
					?>
				</div>
				<div class="conteneur-vignette-suivant">
					<?php
						// Récupération de la photo du post suivant
						if (!empty($next_post)) {
							$vignette = get_post_field('post_content', $next_post->ID);
						} else {
							$vignette = get_post_field('post_content', $first_post);
						}
						// Affichage du contenu
						echo $vignette;
					?>
				</div>
		    </div>
		</div>
	</div>

<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
