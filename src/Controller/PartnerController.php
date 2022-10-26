<?php

namespace App\Controller;

use App\Model\PartnerManager;

class PartnerController extends AbstractController
{
    public function list(): string
    {
        $partnerManager = new PartnerManager();
        $partners = $partnerManager->selectAll();

        return $this->twig->render('Partner/list.html.twig', ['partners' => $partners]);
    }
    public function add(): ?string
    {
        echo 'toto';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            var_dump($_POST);
            $partner = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $partnerManager = new PartnerManager();
            $id = $partnerManager->insert($partner);

            header('Location:/partner');
            return null;
        }

        return $this->twig->render('partner/add.html.twig');
    }
}
