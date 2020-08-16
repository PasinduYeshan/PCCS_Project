<?php 
class BranchReport extends Report{
    private $finesheet = [];

    public function visitBranchGroup(\BranchGroup $branchGroup){
    }

    public function visitFineSheet(FineSheetDomain $finesheet)
    {
        $this->fineSheets[] = $finesheet;
    }
}