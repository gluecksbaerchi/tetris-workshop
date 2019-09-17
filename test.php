<?php

use App\Collections\MyCollection;
use App\MovableObjects\MyMovableObject;
use App\MovableObjects\MyMovableObjectFactory;
use App\Printer;
use App\ReverseConfig;

include "vendor/autoload.php";

// Verschiedene Objekte anlegen

$userInput = [
    ['name' => 'NormalObjekt1', 'type' => 'normal'],
    ['name' => 'SlowObjekt', 'type' => 'slow'],
    ['name' => 'FastObjekt', 'type' => 'fast'],
    ['name' => 'NormalObjekt2', 'type' => 'normal']
];

$myObjectCollection = new MyCollection();

foreach ($userInput as $input) {
    $myObject = MyMovableObjectFactory::createMovableObject($input['type'], $input['name']);
    $myObjectCollection->addOrReplaceItem($myObject);
}

// Alle Objekte ausgeben
foreach ($myObjectCollection->getItems() as $item) {
    Printer::printMyMovableObject($item);
}

// Objekte bewegen
$userInput = [
    ['direction' => 'left', 'name' => 'NormalObjekt1'],
    ['direction' => 'right', 'name' => 'SlowObjekt'],
    ['direction' => 'front', 'name' => 'FastObjekt'],
    ['direction' => 'back', 'name' => 'NormalObjekt2'],
    ['direction' => 'right', 'name' => 'NormalObjekt2']
];

foreach ($userInput as $input) {
    /** @var MyMovableObject $myObject */
    $myObject = $myObjectCollection->getItem($input['name']);
    $movementMethod = 'move' . ucfirst($input['direction']);
    $myObject->$movementMethod();
}

Printer::printBorder();
// Alle Objekte ausgeben
foreach ($myObjectCollection->getItems() as $item) {
    Printer::printMyMovableObject($item);
}

// Objekte bewegen reverse
$reverseConfig = ReverseConfig::getInstance();
$reverseConfig->setReverseMode(true);

$userInput = [
    ['direction' => 'left', 'name' => 'NormalObjekt1'],
    ['direction' => 'right', 'name' => 'SlowObjekt'],
    ['direction' => 'front', 'name' => 'FastObjekt'],
    ['direction' => 'back', 'name' => 'NormalObjekt2'],
    ['direction' => 'right', 'name' => 'NormalObjekt2']
];

foreach ($userInput as $input) {
    /** @var MyMovableObject $myObject */
    $myObject = $myObjectCollection->getItem($input['name']);
    $movementMethod = 'move' . ucfirst($input['direction']);
    $myObject->$movementMethod();
}

Printer::printBorder();
// Alle Objekte ausgeben
foreach ($myObjectCollection->getItems() as $item) {
    Printer::printMyMovableObject($item);
}
