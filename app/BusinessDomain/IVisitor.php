<?php
interface IVisitor{
    public function visitBranch(BranchDomain $branch);
    public function visitTrafficOfficer(TrafficOfficerDomain $branch);
    public function visitFineSheet(FineSheetDomain $branch);
}