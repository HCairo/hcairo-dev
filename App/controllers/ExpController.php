<?php
namespace Controllers;

use Models\Experiences;
use Views\ExpView;

class ExpController {
    protected $experiences;
    protected $expView;

    public function __construct() {
        $this->experiences = new Experiences();
        $this->expView = new ExpView();
    }

    public function displayExperiences() {
        $exp = $this->experiences->fetchExperiences();
        $this->expView->renderView($exp);
    }
}