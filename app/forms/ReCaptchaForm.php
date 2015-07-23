<?php
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Validation\Validator\PresenceOf;

// ReCaptcha-Formular
class ReCaptchaForm extends Form
{
    public function initialize()
    {
        // Elemente instanzieren
        $name      = new Text('name');
        $recaptcha = new ReCaptchaElement('recaptcha');

        // Validator für Name-Feld
        $name->addValidator(
            new PresenceOf(array(
                'message' => 'Bitte Namen eingeben'
            ))
        );

        // Validator für ReCaptcha
        $recaptcha->addValidator(
            new ReCaptchaValidator(array(
                'message' => 'Bitte ReCaptcha ausfüllen'
            ))
        );

        // Elemente zum Formular hinzufügen
        $this->add($name);
        $this->add($recaptcha);

    }

}
