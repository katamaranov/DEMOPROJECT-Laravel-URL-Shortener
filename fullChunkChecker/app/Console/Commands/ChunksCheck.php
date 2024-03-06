<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Fullchunkcheker;

class ChunksCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:chunks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the table is full';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $chunks = config('constants.chunks');

        for ($i=0; $i < count($chunks); $i++) {
            $entity = "App\Models\\" . $chunks[$i] . 'link';
            $g = new $entity();
            $cnt = $g::count();
            if ($cnt >= 900000000) {
                $f = Fullchunkcheker::find($chunks[$i]);
                $f->full = true;
                $f->save();
            }
        }
    }
}
