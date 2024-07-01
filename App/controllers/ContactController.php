<?php
namespace Controllers;

use Models\Contact;
use Views\ContactView;

class ContactController {
    protected $contact;
    protected $contactView;

    public function __construct() {
        $this->contact = new Contact();
        $this->contactView = new ContactView();
    }

    public function getContact() {
        $this->contactView->initForm();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->contact->saveContact();
        }
    }
}