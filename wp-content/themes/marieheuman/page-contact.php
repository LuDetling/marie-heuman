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

                    <h4 class="step-title">Sélectionnez une date et une heure</h4>

                    <div class="calendar-card">

                        <div class="date-header">
                            <span></span>
                        </div>

                        <div class="time-slots-grid">
                            <!-- <button class="time-btn">09:00</button>
                            <button class="time-btn">09:30</button>
                            <button class="time-btn">11:00</button>
                            <button class="time-btn">11:30</button>
                            <button class="time-btn">11:30</button>
                            <button class="time-btn">16:00</button>
                            <button class="time-btn selected">17:00</button>
                            <button class="time-btn">17:30</button> -->
                        </div>

                        <hr class="trait">

                        <div class="meeting-type-selector">
                            <label class="type-option active">
                                <input type="radio" name="meeting_type" value="google_meet" checked>
                                <div class="option-content">
                                    <span class="icon">📹</span>
                                    <strong>Visioconférence</strong>
                                    <small>Google Meet</small>
                                </div>
                            </label>

                            <label class="type-option">
                                <input type="radio" name="meeting_type" value="phone">
                                <div class="option-content">
                                    <span class="icon">📞</span>
                                    <strong>Téléphone</strong>
                                    <small>Appel téléphonique</small>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="other-days">
                    </div>

                    <div class="action-area">
                        <button id="go-to-step-2" class="orange-button">Suivant</button>
                        <p class="summary-text"></p>
                    </div>
                </div>

                <div id="step-2" class="booking-step hidden">

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Prénom*</label>
                            <input type="text" name="prenom" required>
                        </div>
                        <div class="form-group">
                            <label>Nom*</label>
                            <input type="text" name="nom" required>
                        </div>

                        <div class="form-group">
                            <label>Société</label>
                            <input type="text" name="societe">
                        </div>
                        <div class="form-group">
                            <label>SIRET</label>
                            <input type="text" name="siret">
                        </div>

                        <div class="form-group full-width">
                            <label>Décrivez-moi votre projet*</label>
                            <textarea rows="5"></textarea>
                        </div>

                        <div class="upload-section full-width">
                            <div class="upload-item">
                                <strong>Photos</strong>
                                <span class="upload-link">📥 Téléchargez</span>
                            </div>
                            <div class="upload-item">
                                <strong>Plans</strong>
                                <span class="upload-link">📥 Téléchargez</span>
                            </div>
                            <div class="upload-item">
                                <strong>Autres documents</strong>
                                <span class="upload-link">📥 Téléchargez</span>
                            </div>
                        </div>

                        <div class="form-group full-width checkbox-group">
                            <input type="checkbox" id="legal">
                            <label for="legal">J'accepte d'être contactée par Marie Heuman concernant mon
                                projet...</label>
                        </div>
                    </div>

                    <div class="action-area">
                        <button class="main-btn">Envoyer ma demande</button>
                        <button id="back-to-step-1" class="link-btn">Retour</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- END CALENDLY -->

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