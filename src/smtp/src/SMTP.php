<?php

namespace ISF\WP\SMTP;

use PHPMailer\PHPMailer\PHPMailer;

final class SMTP
{
    public static function initPhpMailer(PHPMailer $mailer): void
    {
        $mailer->isSMTP();
        $mailer->SMTPAutoTLS = env('SMTP_AUTO_TLS', false);
        $mailer->SMTPAuth = env('SMTP_AUTH', true);
        $mailer->SMTPSecure = env('SMTP_SECURE', 'tls');
        $mailer->Host = env('SMTP_HOST', 'localhost');
        $mailer->Port = env('SMTP_PORT', '1025');
        $mailer->Username = env('SMTP_USERNAME', '');
        $mailer->Password = env('SMTP_PASSWORD', '');
        ray($mailer);
    }

    public static function mailFromAddress(): string
    {
        return env('SMTP_MAIL_FROM', 'example@example.com');
    }

    public static function register(): void
    {
        add_action('phpmailer_init', [__CLASS__, 'initPhpMailer']);
        add_filter('wp_mail_from', [__CLASS__, 'mailFromAddress']);
    }
}
