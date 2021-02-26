<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kelurahan;
use Flynsarmy\CsvSeeder\CsvSeeder;


class KelurahanSeeder extends CsvSeeder
{
   public function __construct()
	{
		$this->table = 'kelurahans';
		$this->filename = base_path().'/database/seeders/csvs/kelurahan.csv';
	}
    public function run()
    {
        

			// Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean	 before populating
		// DB::table($this->table)->truncate();

		parent::run();
    }
}
