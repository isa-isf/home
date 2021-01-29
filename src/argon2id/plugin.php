<?php

/**
 * Plugin Name: ISF/WP Argon2id
 */

use ISF\WP\Argon2id\Argon2id;

function wp_check_password(string $password, string $hash, string $userId = ''): bool
{
    // check if hash is a md5 based hash
    if (str_starts_with($hash, '$P$')) {
        global $wp_hasher;

        if (empty($wp_hasher)) {
            require_once ABSPATH . WPINC . '/class-phpass.php';
            $wp_hasher = new PasswordHash( 8, true );
        }

        $check = $wp_hasher->CheckPassword($password, $hash);

        if (!$check) {
            return false;
        }

        // re hash using argon2id
        wp_set_password($password, $userId);
        return true;
    }

    return Argon2id::verify($password, $hash);
}

function wp_hash_password(string $password): string
{
    return Argon2id::hash($password);
}

function wp_set_password(string $password, string $userId) {
    global $wpdb;

    $hash = Argon2id::hash($password);

    $wpdb->update(
        $wpdb->users,
        [
            'user_pass'           => $hash,
            'user_activation_key' => '',
        ],
        ['ID' => $userId]
    );

    clean_user_cache($userId);
}
