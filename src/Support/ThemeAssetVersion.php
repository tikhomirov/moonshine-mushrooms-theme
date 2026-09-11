<?php

declare(strict_types=1);

namespace Tikhomirov\MoonShineMushroomsTheme\Support;

final class ThemeAssetVersion
{
    /** @var array<string, string> */
    private const array PACKAGE_ASSET_PATHS = [
        'admin.css'         => 'resources/css/admin.css',
        'avatar-preview.js' => 'resources/avatar-preview.js',
    ];

    public static function resolve(string $publicPath): string
    {
        $normalizedPath = '/' . mb_ltrim(strtok($publicPath, '?') ?: $publicPath, '/');
        $absolutePublicPath = public_path(mb_ltrim($normalizedPath, '/'));

        if (is_file($absolutePublicPath)) {
            return (string) filemtime($absolutePublicPath);
        }

        $filename = basename($normalizedPath);
        $packageRelativePath = self::PACKAGE_ASSET_PATHS[$filename] ?? null;

        if ($packageRelativePath === null) {
            return self::packageVersion();
        }

        $packagePath = dirname(__DIR__, 2) . '/' . $packageRelativePath;

        if (is_file($packagePath)) {
            return (string) filemtime($packagePath);
        }

        return self::packageVersion();
    }

    public static function packageVersion(): string
    {
        static $version = null;

        if ($version !== null) {
            return $version;
        }

        $composerPath = dirname(__DIR__, 2) . '/composer.json';
        $composer = json_decode((string) file_get_contents($composerPath), true);
        $version = (string) ($composer['version'] ?? '1.0.0');

        return $version;
    }
}
