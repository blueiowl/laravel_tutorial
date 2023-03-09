<?php

use Illuminate\Database\Seeder;
use App\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todo = ['掃除', '洗濯', '料理'];
        
        for($i = 0; $i < 3; $i ++)
        {
            $task = new Task;
            $task->name = $todo[$i];
            $task->done_flag = false;
            $task->delete_flag = false;
            $task->user_id = 1;
            $task->save();
        }

        $task = new Task;
        $task->name = '勉強';
        $task->done_flag = false;
        $task->delete_flag = false;
        $task->user_id = 2;
        $task->save();
    }
}
