<?php

require_once __DIR__ . '/app/Models/Recruitment.php';

$company = require __DIR__ . '/config/company.php';
$recruitment = new Recruitment();
$responsibilities = $recruitment->getResponsibilities();
$benefits = $recruitment->getBenefits();

function escapeHtml(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

require __DIR__ . '/views/recruitment.php';
