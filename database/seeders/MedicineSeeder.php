<?php /** @noinspection PhpUndefinedMethodInspection */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicineSeeder extends Seeder
{
    /**
     * Run medicine catalog seeds.
     *
     * @return void
     */
    public function run()
    {
        //Medicine::truncate();

        $medicines = [
            [
                'drug_type' => 'Tablet',
                'manufacturer' => 'Panado',
                'name' => 'Paracetamol',
                'quantity' => 128,
            ],
            [
                'drug_type' => 'Tablet',
                'manufacturer' => 'Yash',
                'name' => 'Bebadryl',
                'quantity' => 43,
            ],
            [
                'drug_type' => 'Solution',
                'manufacturer' => 'Yash',
                'name' => 'Dimetane',
                'quantity' => 150,
            ],
            [
                'drug_type' => 'Tablet',
                'manufacturer' => 'Novartis',
                'name' => 'Coartem',
                'quantity' => 670,
            ],
            [
                'drug_type' => 'Tablet',
                'manufacturer' => 'Johnson and Johnson',
                'name' => 'Isoniazid',
                'quantity' => 8,
            ],
            [
                'drug_type' => 'Powder',
                'manufacturer' => 'Halewood Laboratories',
                'name' => 'ORS',
                'quantity' => 220,
            ]
        ];

        Medicine::insert($medicines);
    }
}
