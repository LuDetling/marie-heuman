<?php
/* Template Name: Page Contact */
get_header();
?>
<main class="ml-20" id="page-contact">
    <section class="header-content">
        <div class="container">
            <?php
            $header = get_field('header_content');
            ?>
            <h1><?= the_title() ?></h1>
            <?= $header['titre'] ?>
        </div>
    </section>
    <section class="decouverte">
        <div class="container">

            <?php
            $contact = get_field('page_contact')['appel'];
            ?>
            <span class="tag-home"><?= $contact['tag'] ?></span>
            <?= $contact['titre'] ?>
            <div class="flex justify-around gap-8">
                <?php
                // On boucle de 1 à 3 pour parcourir les champs numérotés manuellement
                for ($i = 1; $i <= 3; $i++) {
                    // 1. Définition de la clé dynamique (ex: 'icone_titre_1')
                    $groupe_icone = $contact['groupe_icone_titre']['icone_titre_' . $i];
                    // 2. Vérification de l'existence de la donnée pour éviter les erreurs PHP
                    if (isset($groupe_icone)) {

                        // Stockage de la classe de l'icône (ex: 'dashicons-phone')
                
                        // 3. Affichage sécurisé
                        ?>
                        <div class="content-icone-texte">
                            <span class="dashicons <?= esc_attr($groupe_icone['icone']); ?>"></span>
                            <div class="texte"><?= $groupe_icone['description'] ?></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <!-- CALENDLY -->
            <div id="custom-booking-app">

                <div id="step-1" class="booking-step active">
                    <div class="flex gap-4 justify-between header-form-calendly">
                        <div>
                            <a href="#custom-booking-app" id="previous-date" class="hidden"></a>
                        </div>
                        <h4 class="step-title">Sélectionnez une date et une heure</h4>
                        <div>
                            <a href="#custom-booking-app" id="next-date"></a>
                        </div>
                    </div>
                    <!-- Boucle sur calendar cards qui ouvre un accordeon -->
                    <div class="calendar-cards">
                    </div>

                    <div class="action-area">
                        <div class="flex gap-4">
                            <a id="go-to-step-2" href="#custom-booking-app" class="orange-button locked"
                                disabled>Suivant</a>

                        </div>
                        <p class="summary-text"></p>
                        <p class="call"></p>
                        <p class="error"></p>
                    </div>
                </div>

                <div id="step-2" class="booking-step hidden">
                    <form action="POST" class="form-calendly" id="form-calendly">
                        <div>
                            <label for="lastname" class="required">Nom</label>
                            <input id="lastname" name="lastname" type="text">
                        </div>
                        <div>
                            <label for="firstname" class="required">Prénom</label>
                            <input id="firstname" name="firstname" type="text">
                        </div>
                        <div>
                            <label for="email" class="required">Email</label>
                            <input id="email" name="email" type="text">
                        </div>
                        <div>
                            <label for="phone" class="required">Téléphone</label>
                            <input id="phone" name="phone" type="text">
                        </div>
                    </form>

                    <div class="action-area flex gap-16">
                        <div class="w-1/2">
                            <a id="back-to-step-1" href="#custom-booking-app" class="marron-button">Retour</a>
                        </div>
                        <div class="w-1/2">
                            <button class="orange-button" form="form-calendly">Envoyer ma demande</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CALENDLY -->

    </section>

    <section class="contact">

        <form action="POST" class="form-calendly" id="form-contact">
            <?php wp_nonce_field('contact_form_action', 'contact_nonce'); ?>

            <div>
                <label for="lastname-contact" class="required">Nom</label>
                <input id="lastname-contact" name="lastname" type="text">
            </div>
            <div>
                <label for="firstname-contact" class="required">Prénom</label>
                <input id="firstname-contact" name="firstname" type="text">
            </div>
            <div>
                <label for="email-contact" class="required">Email</label>
                <input id="email-contact" name="email" type="text">
            </div>
            <div>
                <label for="phone-contact" class="required">Téléphone</label>
                <input id="phone-contact" name="phone" type="text">
            </div>
        </form>
        <button type="submit" class="orange-button" name="contact_submit" form="form-contact">Envoyer ma
            demande</button>
        <?php
        if (
            isset($_POST['contact_submit']) &&
            isset($_POST['contact_nonce']) &&
            wp_verify_nonce($_POST['contact_nonce'], 'contact_form_action')
        ) {
            $name = sanitize_text_field($_POST['name']);
            $email = sanitize_email($_POST['email']);
            $message = sanitize_textarea_field($_POST['message']);

            $to = 'contact@tonsite.fr';
            $subject = 'Nouveau message de contact';

            $headers = [
                'Content-Type: text/html; charset=UTF-8',
                'From: Site <contact@tonsite.fr>',
                'Reply-To: ' . $email
            ];

            $body = "
    <strong>Nom :</strong> {$name}<br>
    <strong>Email :</strong> {$email}<br><br>
    <strong>Message :</strong><br>
    {$message}
  ";

            wp_mail($to, $subject, $body, $headers);
        } ?>


    </section>
    <section class="collaboration">
        <div class="container">

            <?php
            $collaboration = $contact["collaboration"];
            ?>
            <span class="tag-home"><?= $collaboration['tag'] ?></span>
            <?= $collaboration['titre'] ?>
            <div class="swiper-navigation">
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper contactSwiper">
                <div class="swiper-wrapper">
                    <?php
                    for ($i = 1; $i <= 3; $i++):
                        $bloc = $collaboration['groupe_collaboration']['collaboration_' . $i];
                        ?>
                        <div class="swiper-slide">
                            <div class="flex gap-4">

                                <span class="dashicons <?= $bloc['icone']; ?>"></span>
                                <div class="content">
                                    <h4><?= $bloc['titre'] ?></h4>
                                    <div class="infos"><?= $bloc['infos'] ?></div>
                                    <div class="texte"><?= $bloc['description'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="soutiens">
        <div class="container">
            <div class="content-soutiens">
                <?= $contact['soutiens'] ?>
            </div>
        </div>
    </section>
    <section class="reseaux">
        <div class="container">
            <span class="tag-home"><?= $contact['reseaux']['tag'] ?></span>
            <?= $contact['reseaux']['titre'] ?>
        </div>
    </section>
    <section class="faq">
        <div class="container">
            <span class="tag-home"><?= $contact['faq']['tag'] ?></span>
            <?= $contact['faq']['titre'] ?>
            <a href="<?= $contact['faq']['lien']['url'] ?>" class="more"><?= $contact['faq']['lien']['title'] ?></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>