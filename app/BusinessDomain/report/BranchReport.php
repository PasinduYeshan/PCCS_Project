<?php 
class BranchReport extends Report{

    public function visitBranchGroup(BranchGroup $branchGroup){
    }

    public function visitFineSheet(FineSheetDomain $finesheet)
    {
        $this->fineSheets[] = $finesheet;
    }

    public function getFinesheets()
    {
<<<<<<< HEAD
        return $this->finesheet;
=======
        return $this->fineSheets;
>>>>>>> new
    }
}