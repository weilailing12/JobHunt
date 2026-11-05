<?php
declare(strict_types=1);

/**
 * Public-site language helper. English remains the source language; Simplified
 * Chinese is selected with ?lang=zh and remembered for one year in a cookie.
 */
if (!defined('JOBHUNT_LANGUAGE_READY')) {
    define('JOBHUNT_LANGUAGE_READY', true);

    $jobHuntSupportedLanguages = ['en', 'zh'];
    $jobHuntLanguage = 'en';
    $requestedLanguage = is_string($_GET['lang'] ?? null) ? $_GET['lang'] : null;

    if ($requestedLanguage !== null && in_array($requestedLanguage, $jobHuntSupportedLanguages, true)) {
        $jobHuntLanguage = $requestedLanguage;
        setcookie('jobhunt_language', $jobHuntLanguage, [
            'expires' => time() + (365 * 24 * 60 * 60),
            'path' => '/',
            'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
            'httponly' => false,
            'samesite' => 'Lax',
        ]);
    } elseif (is_string($_COOKIE['jobhunt_language'] ?? null) && in_array($_COOKIE['jobhunt_language'], $jobHuntSupportedLanguages, true)) {
        $jobHuntLanguage = $_COOKIE['jobhunt_language'];
    }

    $jobHuntChineseTranslations = require __DIR__ . '/lang/zh.php';

    function jobHuntLanguage(): string
    {
        global $jobHuntLanguage;
        return $jobHuntLanguage;
    }

    function jobHuntLocale(): string
    {
        return jobHuntLanguage() === 'zh' ? 'zh-Hans' : 'en';
    }

    function jobHuntText(string $text): string
    {
        global $jobHuntChineseTranslations;
        return jobHuntLanguage() === 'zh' ? ($jobHuntChineseTranslations[$text] ?? $text) : $text;
    }

    function jobHuntLanguageUrl(string $language): string
    {
        $requestPath = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/index.php', PHP_URL_PATH);
        $path = basename(rtrim($requestPath, '/'));
        // A directory URL such as /JobHunt/ has no PHP filename. Always use
        // the homepage instead of creating a broken relative URL like JobHunt?lang=zh.
        if ($path === '' || !str_ends_with(strtolower($path), '.php')) {
            $path = 'index.php';
        }
        $query = $_GET;
        unset($query['lang']);
        if (in_array($language, ['en', 'zh'], true)) {
            $query['lang'] = $language;
        }

        return $path . ($query ? '?' . http_build_query($query) : '');
    }

    function jobHuntTranslateOutput(string $content): string
    {
        global $jobHuntChineseTranslations;
        if (jobHuntLanguage() !== 'zh') {
            return $content;
        }

        // Translate rendered text and only presentation-related attributes.
        // URLs, form submissions and database values deliberately remain unchanged.
        $parts = preg_split('/(<[^>]*>)/', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
        if ($parts === false) {
            return $content;
        }

        foreach ($parts as $index => $part) {
            if ($part !== '' && $part[0] === '<') {
                $parts[$index] = preg_replace_callback(
                    '/\\b(placeholder|alt|title|aria-label)=([\'\"])(.*?)\\2/i',
                    static function (array $matches) use ($jobHuntChineseTranslations): string {
                        $value = html_entity_decode($matches[3], ENT_QUOTES, 'UTF-8');
                        if (!isset($jobHuntChineseTranslations[$value])) {
                            return $matches[0];
                        }

                        return $matches[1] . '=' . $matches[2]
                            . htmlspecialchars($jobHuntChineseTranslations[$value], ENT_QUOTES, 'UTF-8')
                            . $matches[2];
                    },
                    $part
                ) ?? $part;
                continue;
            }

            if ($part !== '' && $part[0] !== '<') {
                $visibleText = trim($part);
                $lookupText = html_entity_decode($visibleText, ENT_QUOTES, 'UTF-8');
                if ($visibleText !== '' && isset($jobHuntChineseTranslations[$lookupText])) {
                    $parts[$index] = str_replace($visibleText, $jobHuntChineseTranslations[$lookupText], $part);
                }
            }
        }

        return implode('', $parts);
    }

    if ($jobHuntLanguage === 'zh') {
        ob_start('jobHuntTranslateOutput');
    }
}
