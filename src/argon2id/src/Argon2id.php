<?php

namespace ISF\WP\Argon2id;

final class Argon2id
{
    public static function hash(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID, self::hashOptions());
    }

    public static function verify($password, $hash): bool
    {
        return password_verify($password, $hash);
    }

    private static function hashOptions(): array
    {
        return [
            'memory_cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
            'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST,
            'thread' => PASSWORD_ARGON2_DEFAULT_THREADS,
        ];
    }
}
