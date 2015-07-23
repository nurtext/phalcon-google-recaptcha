<?php
use Phalcon\DI\FactoryDefault,
    Phalcon\Validation,
    Phalcon\Validation\Validator,
    Phalcon\Validation\ValidatorInterface,
    Phalcon\Validation\Message,
    ReCaptcha\ReCaptcha;

// ReCaptcha-Validator
class ReCaptchaValidator extends Validator implements ValidatorInterface
{
    public function validate(Validation $validator, $attributes)
    {
        // Konfiguration und Request-Objekt beziehen
        $di      = FactoryDefault::getDefault();
        $config  = $di->getConfig();
        $request = $di->getRequest();

        // Googles ReCaptcha-Klasse instanzieren
        $recaptcha = new ReCaptcha($config->ReCaptcha->secret);

        // Antwort von ReCaptcha-API beziehen
        $response = $recaptcha->verify(
            $request->getPost('g-recaptcha-response'),
            $request->getClientAddress()
        );

        // Antwort überprüfen
        if (!$response->isSuccess())
        {
            // Nachricht dem Validator hinzufügen
            $validator->appendMessage(
                new Message(
                    $this->getOption('message') ?: 'Bitte ReCaptcha ausfüllen',
                    $attributes,
                    'ReCaptcha'
                )
            );

            // Prüfung fehlgeschlagen
            return FALSE;

        }

        // Erfolgreich
        return TRUE;

    }

}
