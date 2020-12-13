<?php


class HigherOfficerController extends UserController{
    private $reportC;

    public function __construct($controller, $action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
        $this->reportC = new ReportController($controller,$action);
    }

    public function generateBranchReportAction(){
        $this->reportC->branchreportAction();
    }
    public function generateOverallReportAction(){
        $this->reportC->overallreportAction();
    }
}