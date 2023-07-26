<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pref;

class PrefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data_csv = file(storage_path('data/pref.csv'));
       
        //dd($data_csv);   すべて表示される
        for($i =1;$i < count($data_csv); $i++){
            //一行のデータから\n\r除去
            $csv = str_replace("\n", "", $data_csv[$i]);
            $csv = str_replace("\r", "", $csv);
            $data = explode(",",$csv);
           // dd($data);一行のデータが表示
           
            //テーブルに保存
            $pref = new Pref();
            $pref->pref =$data[0];
            $pref->pref2 =$data[1];
            $pref->yomi = $data[2];
            $pref->english =$data[3];
            $pref->save();
        }
    }
}
