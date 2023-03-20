<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Task;

class DoingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:doing {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '指定したIDのタスクを未了にする';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id');
        $this->info($id);

        $task = Task::find($id);

        $task->done_flag = false;
        $task->save();

        $this->info('指定したタスクのステータスが未了になりました');
    }
}
