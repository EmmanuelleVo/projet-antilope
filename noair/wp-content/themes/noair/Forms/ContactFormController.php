<?php

class ContactFormController extends BaseFormController
{

    protected function getNonceKey(): string
    {
        return 'nonce_check_contact_form';
    }

    protected function getSanitizableAttributes():array {
        return [
            'object' => TextSanitizer::class,
            'lastname' => TextSanitizer::class,
            'firstname' => TextSanitizer::class,
            'email' => EmailSanitizer::class,
            'phone' => TextSanitizer::class,
            'message' => TextSanitizer::class,
        ];
    }

    protected function redirectWithErrors($errors)
    {
        $_SESSION['feedback_contact_form'] = [
            'success' => false,
            'data' => $this->data,
            'errors' => $errors
        ];

        return wp_safe_redirect(($this->data['_wp_http_referer'] ?? ''), 302);
    }

    protected function getValidatableAttributes(): array
    {
        return [
            'object' => [RequiredValidator::class],
            'lastname' => [RequiredValidator::class],
            'firstname' => [RequiredValidator::class],
            'email' => [RequiredValidator::class, EmailValidator::class],
            'message' => [RequiredValidator::class],
        ];
    }

    protected function handle() {
        $id = wp_insert_post( [
            'post_type'    => 'message',
            'post_title'   => 'Message de ' . $this->data['firstname'] . ' ' . $this->data['lastname'],
            'post_content' => $this->data['message'],
            'post_status'  => 'publish'
        ] );

        $email = '';

        switch ($_POST['object']){
            case 'research':
                $subject = 'avoir plus d\'infos sur un module';
                $email = 'thienan_vo@live.be';
                break;
            case 'studies':
                $subject = 'avoir plus d\'infos sur la section électronique et systèmes embarqués';
                $email = 'voemmanuelle@gmail.com';
                break;
            case 'shop':
                $subject = 'commander un module';
                $email = 'thienan_vo@live.be';
                break;
            case 'other':
                $subject = 'renseignement';
                $email = 'thienan_vo@live.be';
                break;
        }

        // Envoyer un mail
        $content = 'Bonjour, un nouveau message de contact à été envoyé. <br>';
        $content .= 'Pour le visualiser : ' . get_edit_post_link( $id );

        wp_mail( get_bloginfo('admin_email'), 'Nouveau message', $content );
        wp_mail($email, 'Nouveau message. Souhait : '.$subject, $content);
        // TODO : configurer serveur mail (ex: mailgun - plugin)
    }

    protected function redirectWithSuccess() {
        $_SESSION['feedback_contact_form'] = [
            'success' => true,
        ];
        return wp_safe_redirect($this->data['_wp_http_referer'] . '#contact', '302');
    }
}