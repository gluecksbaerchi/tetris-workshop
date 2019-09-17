<?php


namespace App\Console\Commands;


class ReverseCommand
{
    /** @var string  */
    protected $signature = 'object:reverse {reverse}';

    protected $description = 'Objekte in umgekehrte Richtung bewegen ein/aus.';

    public function handle()
    {
        $config = file_put_contents('config.json', $this->arg);
    }
}
