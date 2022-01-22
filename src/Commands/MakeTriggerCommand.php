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
        $triggerName = Str::snake($this->argument('trigger'));
        $className = Str::studly($triggerName);
        $fileName = Carbon::now()->format('Y_m_d_His') . '_' . $triggerName . '.php';

        $stub = File::get(__DIR__ . '/../../stubs/trigger.php.stub');
        $stub = str_replace('TRIGGER_NAME', $className, $stub);

        File::put(base_path() . '/database/triggers/' . $fileName, $stub);

        $this->line('<info>Trigger created:</info> ' . $fileName);
    }
}
