<?php /* Template Name: Contact */ ?>
<?php get_header() ?>
    <main class="layout contact">
        <h2 class="contact__title page__title"><?= __('Contactez-nous', 'noair') ?></h2>
        <div class="margin big-screen">
            <p class="contact__content"><?= __('Contactez-nous en fonction de votre besoin via notre formulaire', 'noair') ?></p>

            <div class="contact__wrapper">
                <section class="contact__links hidden">
                    <h3 class="links__title sro"><?= __('Liens vers nos partenaires et réseaux sociaux', 'noair') ?></h3>
                    <?php noair_include('social', ['modifier' => 'contact']); ?>

                    <?php noair_include('partner-link', ['modifier' => 'contact']); ?>

                </section>

                <?php if (!isset($_SESSION['feedback_contact_form']) || !$_SESSION['feedback_contact_form']['success']): ?>
                    <form class="contact__form form hidden" method="post"
                          action="<?= get_home_url() ?>/wp-admin/admin-post.php">

                        <div class="form__field">
                            <label class="form__label"
                                   for="object"><?= __('Je souhaite vous contacter pour/à', 'noair') ?> : </label>
                            <select name="object" id="object" class="form__select">
                                <option value="studies" class="form__option"><?= __('Les études', 'noair') ?></option>
                                <option value="research"
                                        class="form__option"><?= __('La recherche', 'noair') ?></option>
                                <option value="shop"
                                        class="form__option"><?= __('Des fins commerciales', 'noair') ?></option>
                                <option value="other" class="form__option"><?= __('Autres', 'noair') ?></option>
                            </select>
                        </div>
                        <?= noair_get_contact_form_field_error('choice'); ?>

                        <div class="form__field">
                            <label for="lastname" class="form__label"><?= __('Nom', 'noair') ?></label>
                            <input type="text" class="form__input" name="lastname" id="lastname" placeholder="Jean"
                                   value="<?= noair_get_contact_form_field_value('lastname') ?>"
                            >
                            <?= noair_get_contact_form_field_error('lastname') ?>
                        </div>
                        <div class="form__field">
                            <label for="firstname" class="form__label"><?= __('Prénom', 'noair') ?></label>
                            <input type="text" class="form__input" name="firstname" id="firstname" placeholder="Dupont"
                                   value="<?= noair_get_contact_form_field_value('firstname') ?>">
                            <?= noair_get_contact_form_field_error('firstname') ?>
                        </div>
                        <div class="form__field">
                            <label for="email" class="form__label"><?= __('Email', 'noair') ?></label>
                            <input type="email" class="form__input" name="email" id="email"
                                   placeholder="email@address.com"
                                   value="<?= noair_get_contact_form_field_value('email') ?>">
                            <?= noair_get_contact_form_field_error('email') ?>
                        </div>
                        <div class="form__field">
                            <label for="message" class="form__label"><?= __('Message', 'noair') ?></label>
                            <textarea name="message" id="message" cols="30"
                                      placeholder="<?= __('Écrivez votre message.', 'noair') ?>"
                                      rows="7"><?= noair_get_contact_form_field_value('message') ?></textarea>
                            <?= noair_get_contact_form_field_error('message') ?>
                        </div>
                        <div class="form__field form__actions">
                            <input type="hidden" name="action" value="submit_contact_form">
                            <?php wp_nonce_field('nonce_check_contact_form') ?>
                            <input type="submit" class="form__submit button" value="Envoyer">
                        </div>
                    </form>
                <?php else: ?>
                    <p class="form__success"><?= __('Message envoyé. Merci de nous avoir contacté.', 'noair') ?></p>
                <?php endif; ?>
            </div>

        </div>
    </main>

<?php get_footer();
unset($_SESSION['feedback_contact_form']);
?>