<?php
namespace Controllers;

use Models\Home;
use Views\HomeView;

class HomeController {
    protected $home;
    protected $homeView;

    public function __construct() {
        $this->home = new Home();
        $this->homeView = new HomeView();
    }

    public function displayPage() {
        $projects = $this->home->fetchProjects();
        $this->homeView->renderView($projects);
    }
}