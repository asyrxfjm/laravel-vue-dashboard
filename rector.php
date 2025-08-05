<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\If_\SimplifyIfReturnBoolRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    // Define the paths to refactor
    $rectorConfig->paths([
        __DIR__.'/app',
        __DIR__.'/config',
        __DIR__.'/database',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ]);

    // What PHP version features to apply (change based on your PHP version)
    $rectorConfig->phpVersion(Rector\ValueObject\PhpVersion::PHP_81);

    // Enable Laravel-specific rules
    $rectorConfig->sets([
        LaravelSetList::LARAVEL_CODE_QUALITY,
        LaravelSetList::LARAVEL_COLLECTION,
        LaravelSetList::LARAVEL_120,        // Adjust based on your Laravel version
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        SetList::PRIVATIZATION,
        SetList::TYPE_DECLARATION,
    ]);

    // Optional: skip specific files or classes
    $rectorConfig->skip([
        // __DIR__ . '/app/Exceptions/Handler.php',
    ]);

    // Optionally add custom rules
    $rectorConfig->rules([
        SimplifyIfReturnBoolRector::class,
    ]);
};
