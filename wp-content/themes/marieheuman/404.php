<?php
/**
 * Redirection automatique des erreurs 404 vers l'accueil
 */
wp_safe_redirect( home_url(), 301 );
exit;