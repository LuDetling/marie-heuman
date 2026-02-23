<?php
$projet = get_field("projet");
$image = $projet['avant_apres']['avant']['images'];
if ($image): ?>
    <section class="section-beige identite">
        <?= $image ?>
    </section>
<?php endif; ?>