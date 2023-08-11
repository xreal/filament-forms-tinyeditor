<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentFormsTinyeditorServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-forms-tinyeditor';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Js::make('tinymce', 'https://cdn.jsdelivr.net/npm/tinymce@5.10.7/tinymce.min.js'),
            Js::make('tiny-editor', __DIR__.'/../resources/dist/js/tiny-editor.js'),
            Js::make('tinymce-lang-de', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/de.min.js')->loadedOnRequest(),            
        ], package: 'mohamedsabil83/filament-forms-tinyeditor');
    }
}
