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
        $title = ['掃除', '洗濯', '料理'];
        $content = ['掃除機をかける', '溜まった洗濯物を洗濯機にかけて干す', 'ゆで卵を作る'];
        
        for($i = 0; $i < 3; $i ++)
        {
            $task = new Task;
            $task->title = $title[$i];
            $task->content = $content[$i];
            $task->done_flag = false;
            $task->delete_flag = false;
            $task->user_id = 1;
            $task->save();
        }

        $task = new Task;
        $task->title = '勉強';
        $task->content = '数学の問題集10ページ進める';
        $task->done_flag = false;
        $task->delete_flag = false;
        $task->user_id = 2;
        $task->save();
    }
}
