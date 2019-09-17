<?php


namespace App\Console\Commands;


use App\Models\Thing;
use App\Services\ObjectHandler;
use Illuminate\Console\Command;

class MoveObjectCommand extends Command
{
    /** @var string  */
    protected $signature = 'object:move';

    protected $description = 'Bewegt ein Objekt in die gegebene Richtung.';

    /**
     * @var ObjectHandler
     */
    protected $objectHandler;

    /**
     * MoveObjectCommand constructor.
     * @param ObjectHandler $objectHandler
     */
    public function __construct(ObjectHandler $objectHandler)
    {
        parent::__construct();
        $this->objectHandler = $objectHandler;
    }

    public function handle()
    {
        $name = readline('Welches Objekt soll bewegt werden?: ');
        do {
            $direction = readline('In welche Richtung soll das Objekt bewegt werden (v-vor, z-zurück, r-rechts, l-links)?: ');
            if (!$this->validDirection($direction)) {
                print_r("Die eingegebene Richtung existiert nicht.\n");
            }
        } while (!$this->validDirection($direction));
        //$width = (int) readline('Wie weit soll das Objekt in diese Richtung bewegt werden?: ');


        $object = $this->objectHandler->moveObjectToDirection($name, $direction);
        print_r("Das Objekt wurde verschoben.\n");
        $this->objectHandler->printObjectPosition($object);
    }

    /**
     * @param string $direction
     * @return bool
     */
    public function validDirection(string $direction): bool
    {
        return in_array($direction, ['v', 'z', 'r', 'l']);
    }
}
