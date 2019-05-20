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
            $example->workName     = 'workName'.$i;
            // $example->status       = '未着手';
            $example->content      = 'content '.$i;
            $example->created_id   = 1;
            $example->created_name = 'test1';
            $example->updated_id   = 1;
            $example->updated_name = 'test1';

            if($i === 1 || $i === 2){
                $example->status       = '未着手';
            }elseif($i === 3 || $i === 4){
                $example->status       = '作業中';
            }else{
                $example->status       = '完了';
            }
            $example->save();
        }

        for($i = 7; $i <= 12; $i++){
            $example = new Example;
            $example->workName     = 'workName'.$i;
            // $example->status       = '未着手';
            $example->content      = 'content '.$i;
            $example->created_id   = 2;
            $example->created_name = 'test2';
            $example->updated_id   = 2;
            $example->updated_name = 'test2';

            if($i === 7 || $i === 8){
                $example->status       = '未着手';
            }elseif($i === 9 || $i === 10){
                $example->status       = '作業中';
            }else{
                $example->status       = '完了';
            }
            $example->save();
        }

        // $param = [
        //     'workName' => 'workName1',
        //     'status'   => '未着手',
        //     'content'      => 'content1',
        //     'created_id'   => 1,
        //     'created_name' => 'test1',
        //     'updated_id'   => 1,
        //     'updated_name' => 'test1',
        //     'created_at' => date();
        // ];
        // // DB:table('example')->insert($param);
        // Example::insert($param);
    }
}
