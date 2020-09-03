<?php
interface Target {
  function setHeader(BranchDomain $branch);
  function setFooter();
  function generatePDF($params);
}