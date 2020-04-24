<?php

require_once "models/gestorSlide.php";
require_once "models/gestorMensajes.php";

require_once "controllers/template.php";
require_once "controllers/gestorSlide.php";
require_once "controllers/gestorMensajes.php";

$template = new TemplateController();
$template -> template();