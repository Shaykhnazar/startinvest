<?php

namespace App\Services\Translation;

interface TranslationServiceInterface
{
    public function translate(string $text, string $targetLocale): string;
}
