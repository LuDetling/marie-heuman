<?php
/* Template Name: Page Contact */
get_header();
?>
<main id="page-contact">
    <!-- <div id="app"></div> -->

    <section class="header-content section-floral">
        <div class="container-header">
            <?php
            $header = get_field('header_content');
            ?>
            <?= $header['titre'] ?>
            <a href="<?= $header['lien_1']['url'] ?>" class="button marron-button"><?= $header['lien_1']['title'] ?></a>
        </div>
    </section>
    <section class="section-desert decouverte">

        <?php
        $decouverte = get_field('contact_decouverte');
        ?>
        <div class="tag-home"><?= $decouverte['tag'] ?></div>
        <div class="content"><?= $decouverte['content'] ?></div>
        <!-- CALENDLY -->
        <div id="custom-booking-app" class="section-floral">
            <div id="step-1" class="booking-step active">
                <div class="flex gap-4 justify-between header-form-calendly">
                    <div>
                        <a href="#custom-booking-app" id="previous-date" class="hidden">Précédentes dates</a>
                    </div>
                    <h3 class="step-title">Sélectionnez une date et une heure</h3>
                    <div>
                        <a href="#custom-booking-app" id="next-date">Prochaines dates</a>
                    </div>
                </div>
                <!-- Boucle sur calendar cards qui ouvre un accordeon -->
                <div class="calendar-cards">
                </div>

                <div class="action-area">
                    <div class="flex gap-4 justify-center">
                        <a id="go-to-step-2" href="#custom-booking-app" class="button marron-button locked"
                            disabled>Etape suivante</a>

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
                        <input id="lastname" name="lastname" type="text" required>
                    </div>
                    <div>
                        <label for="firstname" class="required">Prénom</label>
                        <input id="firstname" name="firstname" type="text" required>
                    </div>
                    <div>
                        <label for="email" class="required">Email</label>
                        <input id="email" name="email" type="text" required>
                    </div>
                    <div>
                        <label for="phone" class="required">Téléphone</label>
                        <input id="phone" name="phone" type="text" required>
                    </div>
                </form>

                <div class="info-datas mt-12"></div>
                <div class="action-area flex gap-10 md:gap-20 items-center flex-wrap md:flex-nowrap">
                    <div class="md:w-1/2 w-full">
                        <a id="back-to-step-1" href="#custom-booking-app" class="secondary-button">← Retour</a>
                    </div>
                    <div class="md:w-1/2 w-full">
                        <button class="button marron-button send-button" form="form-calendly">Envoyez votre
                            demande</button>
                        <span class="loading loading-spinner loading-sm hidden"></span>
                    </div>
                </div>
            </div>
            <!-- END CALENDLY -->
        </div>
        <div class="other"><?= $decouverte['other'] ?></div>

    </section>

    <?php $appel = get_field('contact_appel'); ?>
    <section class="section-floral appel">
        <div class="tag-home"><?= $appel['tag'] ?></div>
        <div class="content"><?= $appel['content'] ?></div>

        <div class="grid xl:grid-cols-3 gap-0 ">
            <?php foreach ($appel['cards'] as $card): ?>
                <div class="card"><?= $card ?></div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php $parcours = get_field('contact_parcours'); ?>
    <section class="section-floral parcours">
        <div class="tag-home"><?= $parcours['tag'] ?></div>
        <div class="content"><?= $parcours['content'] ?></div>

        <div class="accordions">
            <?php $i = 1;
            foreach ($parcours['liste'] as $accordion):
                $numero = str_pad($i, 2, "0", STR_PAD_LEFT); ?>
                <div class="flex items-start gap-6 py-8 accordion-content">
                    <details class="collapse " name="accordion-methode-home">
                        <summary class="collapse-title mb-2 items-center">
                            <span class="index">
                                <?= $numero ?>
                            </span>
                            <div class="title">
                                <?= $accordion['titre'] ?>
                            </div>
                            <div class="hidden md:block circle ml-auto"></div>

                        </summary>
                        <div class="collapse-content mt-4 ">
                            <?= $accordion['content'] ?>
                        </div>
                    </details>

                </div>
                <?php $i++; endforeach; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>