<?php


namespace App\Console\Commands;


use App\Models\Thing;
use Illuminate\Console\Command;

class CreateObjectsCommand extends Command
{
    /** @var string  */
    protected $signature = 'object:create {name} {type}';

    protected $description = 'Erstellt ein Objekt an Position (0, 0).';

    public function handle()
    {
        $type = $this->argument('type');
        if (!in_array($type, ['normal', 'fast', 'slow'])) {
            print_r('Type muss "normal", "slow" oder "fast" sein!');
            print_r("\n");
            return;
        }

        $object = new Thing();
        $object->name = $this->argument('name');
        $object->type = $type;
        $object->saveOrFail();
        print_r("Neues Objekt wurde erstellt.\n");
    }
}
