jQuery(document).ready(function($) {
    console.log("ici");

    // 1. Cible et écouteur d'événement
    // Cible tous les liens de filtre dans la liste de taxonomie (assurez-vous que cette classe est sur vos liens)
    $('.taxonomy-list a.filter-item').on('click', function(e) {
        
        // Empêche le navigateur de suivre le lien et de recharger toute la page
        e.preventDefault(); 
        
        const filterLink = $(this);
        
        // Récupère le slug stocké dans l'attribut data-slug du lien HTML
        const catSlug = filterLink.data('slug'); 
        
        // Conteneur où les nouveaux articles seront affichés.
        // C'est le <div> qui enveloppe la liste des articles.
        const resultsContainer = $('.blog-list-container');
        
        // 2. Feedback Visuel
        // Optionnel : Ajoute une classe 'loading' au conteneur pendant la requête
        resultsContainer.addClass('loading-state');
        // Met à jour la classe 'active' pour styliser le filtre actuellement sélectionné
        $('.taxonomy-list a.filter-item').removeClass('active');
        filterLink.addClass('active');

        // 3. Préparation des données POST
        const data = {
            'action': 'filter_blog_posts', // DOIT CORRESPONDRE au hook wp_ajax_filter_blog_posts dans functions.php
            'cat_slug': catSlug,          // La clé PHP $_POST['cat_slug'] que nous lisons dans functions.php
            'nonce': blog_ajax_object.nonce // Le jeton de sécurité transmis depuis PHP
        };

        // 4. Requête AJAX
        $.post(blog_ajax_object.ajax_url, data, function(response) {
            
            // Si la requête réussit :
            // Remplace le contenu du conteneur par le HTML renvoyé par la fonction PHP
            resultsContainer.html(response);
            
        }).fail(function() {
            // Gestion des erreurs (par exemple, si le serveur ne répond pas)
            resultsContainer.html('<p class="error-message">Erreur : Impossible de charger les articles.</p>');
        }).always(function() {
            // Exécuté dans tous les cas (succès ou échec)
            // Retire la classe 'loading'
            resultsContainer.removeClass('loading-state');
        });

    });

});