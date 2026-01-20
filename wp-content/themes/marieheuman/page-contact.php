<?php
/* Template Name: Page Contact */
get_header();
?>
<main class="md:ml-20" id="page-contact">
    <section class="header-content section-white">
        <!-- <div class="container"> -->
        <?php
        $header = get_field('header_content');
        ?>
        <h1><?= the_title() ?></h1>
        <?= $header['titre'] ?>
        <!-- </div> -->
    </section>
    <div class="img-under-header"></div>
    <section class="decouverte">
        <!-- <div class="container"> -->

        <?php
        $contact = get_field('page_contact')['appel'];
        ?>
        <span class="tag-home"><?= $contact['tag'] ?></span>
        <?= $contact['titre'] ?>
        <div class="flex justify-center gap-10 md:gap-20">
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
        <div id="custom-booking-app" class="section-white">

            <div id="step-1" class="booking-step active">
                <div class="flex gap-4 justify-between header-form-calendly">
                    <div>
                        <a href="#custom-booking-app" id="previous-date" class="hidden">Précédentes dates</a>
                    </div>
                    <h4 class="step-title">Sélectionnez une date et une heure</h4>
                    <div>
                        <a href="#custom-booking-app" id="next-date">Prochaines dates</a>
                    </div>
                </div>
                <!-- Boucle sur calendar cards qui ouvre un accordeon -->
                <div class="calendar-cards">
                </div>

                <div class="action-area">
                    <div class="flex gap-4 justify-center">
                        <a id="go-to-step-2" href="#custom-booking-app" class="orange-button locked"
                            disabled>Suivant</a>

                    </div>
                    <p class="summary-text"></p>
                    <p class="call"></p>
                    <p class="error"></p>
                </div>
            </div>

            <div id="step-2" class="booking-step hidden">
                <form method="POST" class="form-calendly" id="form-calendly">
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

                <div class="action-area flex gap-10 md:gap-20 items-center flex-wrap md:flex-nowrap">
                    <div class="w-full md:w-1/2">
                        <a id="back-to-step-1" href="#custom-booking-app" class="second-link-orange">Retour</a>
                    </div>
                    <div class="w-full md:w-1/2">
                        <button class="orange-button" form="form-calendly">Envoyez votre demande</button>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <!-- END CALENDLY -->

    </section>
    <!-- CONTACT -->
    <section class="contact section-white">
        <?php
        $contact_form = $contact["contact"];
        ?>
        <span class="tag-home"><?= $contact_form['tag'] ?></span>
        <?= $contact_form['titre'] ?>
        <form method="post" class="form-contact section-beige" id="form-contact" enctype="multipart/form-data">
            <?php wp_nonce_field('contact_form_action', 'contact_nonce'); ?>

            <!-- Honeypot anti-spam -->
            <input type="text" name="website" style="display:none">

            <div>
                <label for="lastname-contact" class="required">Nom</label>
                <input id="lastname-contact" name="lastname" type="text" value="Detling">
            </div>
            <div>
                <label for="firstname-contact" class="required">Prénom</label>
                <input id="firstname-contact" name="firstname" type="text" value="Lucas">
            </div>
            <div>
                <label for="email-contact" class="required">Email</label>
                <input id="email-contact" name="email" type="text" value="lucas.detling@gmail.com">
            </div>
            <div>
                <label for="phone-contact" class="required">Téléphone</label>
                <input id="phone-contact" name="phone" type="text">
            </div>
            <div class="from-calendly"></div>
            <div class="flex gap-4 files">
                <div>
                    <label for="photos">Photos</label>
                    <input type="file" name="photos[]" id="photos" multiple>
                </div>
                <div>
                    <label for="plans">Plans</label>
                    <input type="file" name="plans[]" id="plans" multiple>
                </div>
                <div>
                    <label for="otherFiles">Autres</label>
                    <input type="file" name="otherFiles[]" id="otherFiles" multiple>
                </div>
            </div>
            <fieldset class="ccga flex gap-4 items-start">
                <div>
                    <input type="checkbox" name="ccga" id="ccga">
                    <label for="ccga">J'accepte d'être contactée par Marie Heuman concernant mon projet
                        d'architecture
                        d'intérieur. Mes données seront traitées conformément à la <a href="#" class="ccga">politique de
                            confidentialité.</a></label>
                </div>
            </fieldset>
        </form>
        <button type="submit" class="orange-button" name="contact_submit" form="form-contact">Envoyez votre
            demande</button>
    </section>
    <!-- END CONTACT -->

    <section class="collaboration section-beige">

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
                    <div class="swiper-slide section-white">
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
    </section>
    <section class="soutiens section-white">
        <div class="content-soutiens section-beige">
            <?= $contact['soutiens'] ?>
        </div>
    </section>
    <section class="reseaux section-beige">
        <span class="tag-home"><?= $contact['reseaux']['tag'] ?></span>
        <?= $contact['reseaux']['titre'] ?>
    </section>
    <section class="faq section-white">
        <span class="tag-home"><?= $contact['faq']['tag'] ?></span>
        <?= $contact['faq']['titre'] ?>
        <a href="<?= $contact['faq']['lien']['url'] ?>" class="more"><?= $contact['faq']['lien']['title'] ?></a>
    </section>
</main>

<?php get_footer(); ?>