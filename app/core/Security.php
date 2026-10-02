<?php
class Security {
    public static function applyHeaders() {
        header("X-Content-Type-Options: nosniff");
        header("X-Frame-Options: DENY");
        header("X-XSS-Protection: 1; mode=block");
        header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline'; img-src 'self' data:;");
        header("Referrer-Policy: no-referrer");
        header("Permissions-Policy: geolocation=(), microphone=()");
    }

    public static function sanitize($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    public static function sanitizeArray($array) {
        return array_map([self::class, 'sanitize'], $array);
    }

    public static function sanitizeFilename($filename) {
        return preg_replace('/[^a-zA-Z0-9-_\.]/', '_', $filename);
    }
}
