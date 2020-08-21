***Important  2020/06/04 --- Didn't check this out
Singleton used in states
Find a way to use synchronized in getInstance Method

//This is how we can get the aray for the branch report
$branch_id = 1;
$branchReport = new BranchReport("2020-08-01","2020-08-15");
$branch = new BranchDomain($branch_id); //BranchGroup
$branch->accept($branchReport);
$reportArray = $branchReport->getReportArray();


//This is how we can get the aray for the overall report
//Only change is BrnchGroup
$branchReport = new OverallReport("2020-08-01","2020-08-15");
$branchGroup = new BranchGroup(); //BranchGroup
$branchGroup->accept($branchReport);
$reportArray = $branchReport->getReportArray();


//to display branch report by entering time period and branch
http://localhost/PCCS/report/branchreport
