<?php

namespace domain\Zone\Seeders;

use domain\Province\Models\Province;
use domain\Zone\Models\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{

    public function run(): void
    {
        // Province-wise Zone mapping (based on your PDF)
        $zoneData = [
            'Western' => [
                'Colombo',
                'Homagama',
                'Piliyandala',
                'Sri Jayawadhanapura',
                'Gampaha',
                'Kelaniya',
                'Minuwangoda',
                'Negombo',
                'Horana',
                'Kalutara',
                'Matugama',
            ],

            'Central' => [
                'Denuwara',
                'Gampola',
                'Kandy',
                'Katugastota',
                'Teldeniya',
                'Waththegama',
                'Galewela',
                'Matale',
                'Naula',
                'Wilgamuwa',
                'Hanguranketha',
                'Hatton',
                'Kotmale',
                'Nuwara Eliya',
                'Walapane',
            ],

            'Southern' => [
                'Ambalangoda',
                'Elpitiya',
                'Galle',
                'Udugama',
                'Hambantota',
                'Tangalle',
                'Walasmulla',
                'Akuressa',
                'Matara',
                'Morawaka',
                'Mulatiyana',
            ],

            'Northern' => [
                'Islands',
                'Jaffna',
                'Thenmarachchi',
                'Vadamarachchi',
                'Valikamam',
                'Kilinochchi',
                'Madhu',
                'Mannar',
                'Mullaitivu',
                'Thunukkai',
                'Vavuniya',
                'Vavuniya North',
            ],

            'Eastern' => [
                'Akkaraipattu',
                'Ampara',
                'Dehiattakandiya',
                'Kalmunai',
                'Mahaoya',
                'Sammanthurai',
                'Thirukkovil',
                'Batticaloa',
                'Batticaloa Central',
                'Batticaloa West',
                'Kalkudah',
                'Paddiruppu',
                'Kantalai',
                'Kinniya',
                'Mutur',
                'Trincomalee',
                'Trincomalee North',
            ],

            'North Western' => [
                'Giriulla',
                'Ibbagamuwa',
                'Kuliyapitiya',
                'Kurunegala',
                'Maho',
                'Nikaweratiya',
                'Chilaw',
                'Puttalam',
            ],

            'North Central' => [
                'Anuradhapura',
                'Galenbindunuwewa',
                'Kebithigollewa',
                'Kekirawa',
                'Tambuttegama',
                'Dimbulagala',
                'Hingurakgoda',
                'Polonnaruwa',
            ],

            'Uva' => [
                'Badulla',
                'Bandarawela',
                'Viyaluwa',
                'Mahiyanganaya',
                'Passara',
                'Welimada',
                'Bibile',
                'Monaragala',
                'Wellawaya',
            ],

            'Sabaragamuwa' => [
                'Dehiowita',
                'Kegalle',
                'Mawanella',
                'Balangoda',
                'Embilipitiya',
                'Nivitigala',
                'Ratnapura',
            ],
        ];

        foreach ($zoneData as $provinceName => $zones) {
            $province = Province::where('name', $provinceName)->first();

            if (!$province) {
                $this->command->warn("Province not found: $provinceName");
                continue;
            }

            foreach ($zones as $zoneName) {
                Zone::firstOrCreate([
                    'name' => $zoneName,
                    'province_id' => $province->id,
                ]);
            }
        }
    }
}
