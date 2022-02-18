<?php

use App\Element;

require '../vendor/autoload.php';

$element = new Element('p');

echo $element->render();