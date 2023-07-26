<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_csv = file(storage_path('data/city.csv'));
        // dd($data_csv);  // すべて表示される
        for($i =1;$i < count($data_csv); $i++){
            //一行のデータから\n\r除去
            $csv = str_replace("\n", "", $data_csv[$i]);
            $csv = str_replace("\r", "", $csv);
            
            $str =mb_convert_kana($csv,"KV");
            $data = explode(",",$csv);
            // dd($data);一行のデータが表示
            $city = new City();
            $city ->prefcode =$data[0];
            $city ->pref =$data[1];
            $city ->city = $data[2];
            $city ->kenkana =$data[3];
            $city ->sikukana =$data[4];
            $city ->save();
        }
    }
}


