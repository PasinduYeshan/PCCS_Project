<?php
interface IVisitor{
    public function visitBranchGroup(BranchGroup $branchGroup);
    public function visitBranch(BranchDomain $branch);
    public function visitTrafficOfficer(TrafficOfficerDomain $officer);
    public function visitFineSheet(FineSheetDomain $finesheet);
}