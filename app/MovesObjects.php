<?php

namespace App;

interface MovesObjects
{
    public function moveRight(): void;

    public function moveLeft(): void;

    public function moveFront(): void;

    public function moveBack(): void;
}
