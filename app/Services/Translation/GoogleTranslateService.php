<?php

namespace App\Services\Translation;

use Stichoza\GoogleTranslate\GoogleTranslate;

class GoogleTranslateService implements TranslationServiceInterface
{
    protected GoogleTranslate $translator;

    public function __construct()
    {
        $this->translator = new GoogleTranslate();
    }

    public function translate(string $text, string $targetLocale): string
    {
        $this->translator->setTarget($targetLocale);
        return $this->translator->translate($text);
    }
}

