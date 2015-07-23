<?php
use Phalcon\DI\FactoryDefault,
    Phalcon\Forms\Element;

// ReCaptcha-Element
class ReCaptchaElement extends Element
{
    public function render($attributes = NULL)
    {
        // Konfiguration beziehen
        $config = FactoryDefault::getDefault()->getConfig();

        // HTML-Code erzeugen
        $html  = '<div class="g-recaptcha" data-sitekey="%1$s"></div>';
        $html .= '<script src="//www.google.com/recaptcha/api.js?hl=%2$s"></script>';

        // Platzhalter füllen und HTML zurückgeben
        return sprintf(
            $html,
            $config->ReCaptcha->siteKey,
            $config->ReCaptcha->language
        );

    }
}
