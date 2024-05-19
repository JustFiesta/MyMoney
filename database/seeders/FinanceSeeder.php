<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Finance;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->pluck('id');

        foreach ($users as $userId) {
            Finance::insert([
                'amount' => rand(0, 1000),
                'type' => rand(0, 1) ? 'income' : 'outcome',
                'category' => $this->getRandomCategory(),
                'user_id' => $userId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * Get a random category for finance.
     *
     * @return string
     */
    private function getRandomCategory()
    {
        $categories = ['Transport', 'Zdrowie', 'Jedzenie', 'Rozrywka', 'Zakupy'];
        return $categories[array_rand($categories)];
    }
}
