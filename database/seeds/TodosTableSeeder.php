<?php

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 6; $i++){
            $todo = new Todo;
            $todo->work_name     = 'work_name'.$i;
            $todo->content      = 'content'.$i;
            $todo->user_id   = 1;

            if($i === 1 || $i === 2){
                $todo->status       = 1;//未着手
            }elseif($i === 3 || $i === 4){
                $todo->status       = 2;//作業中
            }else{
                $todo->status       = 3;//完了
            }
            $todo->save();
        }

        for($i = 7; $i <= 12; $i++){
            $todo = new Todo;
            $todo->work_name     = 'work_name'.$i;
            $todo->content      = 'content'.$i;
            $todo->user_id   = 2;

            if($i === 7 || $i === 8){
                $todo->status       = 1;//未着手
            }elseif($i === 9 || $i === 10){
                $todo->status       = 2;//作業中
            }else{
                $todo->status       = 3;//完了
            }
            $todo->save();
        }
    }
}
