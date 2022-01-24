<?php

namespace Programic\Triggers\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Programic\Tasks\Facades\Trigger;

class MakeTriggerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trigger {trigger}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trigger class';


    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws Exception
     */
    public function handle()
    {
        $triggerName = $this->argument('trigger');
        $fileName = $triggerName . '.php';

        $stub = File::get(__DIR__ . '/../../stubs/trigger.php.stub');
        $stub = str_replace('TRIGGER_NAME', $triggerName, $stub);
        $targetPath = base_path() . '/database/triggers/';

        if (!File::isDirectory($targetPath)) {
            File::makeDirectory($targetPath, 0755, true, true);
        }

        File::put($targetPath . $fileName, $stub);

        $this->line('<info>Trigger created:</info> ' . $fileName);
    }
}
