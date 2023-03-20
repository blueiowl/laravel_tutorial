<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Task;

class UndeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:undelete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '削除したタスクを復活させる';

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
        $task = Task::find($id);

        $task->delete_flag = false;
        $task->save();

        $this->info('タスクの復活が完了しました');
    }
}
