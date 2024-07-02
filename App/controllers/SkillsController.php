<?php
namespace Controllers;

use Models\Skills;
use Views\SkillsView;

class SkillsController {
    protected $skills;
    protected $skillsView;

    public function __construct() {
        $this->skills = new Skills();
        $this->skillsView = new SkillsView();
    }

    public function displaySkills() {
        $skill = $this->skills->fetchSkills();
        $this->skillsView->renderView($skill);
    }
}