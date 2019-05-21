<?php

use Illuminate\Database\Seeder;
use App\Example;

class ExampleTableSeeder extends Seeder
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
            $example = new Example;
            $example->work_name     = 'work_name'.$i;
            $example->content      = 'content'.$i;
            $example->user_id   = 1;

            if($i === 1 || $i === 2){
                $example->status       = 1;//未着手
            }elseif($i === 3 || $i === 4){
                $example->status       = 2;//作業中
            }else{
                $example->status       = 3;//完了
            }
            $example->save();
        }

        for($i = 7; $i <= 12; $i++){
            $example = new Example;
            $example->work_name     = 'work_name'.$i;
            $example->content      = 'content'.$i;
            $example->user_id   = 2;

            if($i === 7 || $i === 8){
                $example->status       = 1;//未着手
            }elseif($i === 9 || $i === 10){
                $example->status       = 2;//作業中
            }else{
                $example->status       = 3;//完了
            }
            $example->save();
        }
    }
}