<?php
// Index-Controller
class IndexController extends ControllerBase
{
    // Index-Action
    public function indexAction()
    {
        // ReCaptcha-Formular instanzieren
        $form = new ReCaptchaForm();

        // Auf POST-Request prüfen
        if ($this->request->isPost())
        {
            // Formular validieren
            if (!$form->isValid($this->request->getPost()))
            {
                // Meldungen ausgeben
                foreach ($form->getMessages() as $message)
                {
                    $this->flash->error($message);

                }

            }
            else
            {
                // POST-Variable übergeben und anderen View auswählen
                $this->view->name = $this->request->getPost('name');
                $this->view->pick('index/success');


            }

        }

        // Formular an View übergeben
        $this->view->form = $form;

    }

}
