<?php


namespace App\Console\Commands;


use App\Models\Thing;
use App\Services\ObjectHandler;
use Illuminate\Console\Command;

class ShowObjectsCommand extends Command
{
    /** @var string  */
    protected $signature = 'object:show {--id= : Objekt-ID} {--name= : Objektbezeichnung}';

    /**
     * @var string
     */
    protected $description = 'Gibt die Position von Objekten aus.';

    /**
     * @var ObjectHandler
     */
    protected $objectHandler;

    /**
     * ShowObjectsCommand constructor.
     * @param ObjectHandler $objectHandler
     */
    public function __construct(ObjectHandler $objectHandler)
    {
        parent::__construct();
        $this->objectHandler = $objectHandler;
    }


    // todo: verschiedene Commands nutzen um die vielen if Prüfungen zu vermeiden
    public function handle()
    {
        $objectId = $this->option('id');
        $objectName = $this->option('name');

        if ($objectId == null && $objectName == null) {
            $this->showAllObjects();
            return;
        }

        if ($objectId !== null && $objectName !== null) {
            print_r('Bitte nur Id ODER Bezeichnung eingeben!');
            return;
        }

        if ($objectId !== null) {
            $object = Thing::find($objectId);
        }

        if ($objectName !== null) {
            $object = Thing::where('name', '=', $objectName)->first();
        }

        if ($object === null) {
            print_r("Das Objekt konnte nicht gefunden werden.\n");
            return;
        }

        $this->objectHandler->printObjectPosition($object);
        return;
    }


    /**
     * Gibt die Position aller existierender Objekte aus.
     */
    public function showAllObjects(): void
    {
        $objects = Thing::all();
        foreach ($objects as $object) {
            $this->objectHandler->printObjectPosition($object);
        }
    }
}
