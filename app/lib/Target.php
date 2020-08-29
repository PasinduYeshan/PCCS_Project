<?php
interface Target {
  function setHeader();
  function setFooter();
  function generatePDF($params);
}