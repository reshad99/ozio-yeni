<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Bakı', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Ağcabədi', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Gəncə', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Sumqayıt', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Mingəçevir', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Şəki', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Şəmkir', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Lənkəran', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Quba', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Qusar', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Xaçmaz', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Şamaxı', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Qəbələ', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'İsmayıllı', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Zaqatala', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Qax', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Balakən', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Bərdə', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Ağdam', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Tərtər', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Füzuli', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Cəbrayıl', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Laçın', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Kəlbəcər', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Ağstafa', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Qazax', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Tovuz', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Gədəbəy', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Daşkəsən', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Goranboy', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Sabirabad', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Saatlı', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Hacıqabul', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Neftçala', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Salyan', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Şirvan', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Zərdab', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Ucar', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Ağdaş', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Göyçay', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Kürdəmir', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Yardımlı', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Masallı', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Lerik', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Cəlilabad', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Biləsuvar', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Ağdərə', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Ağsu', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Astara', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Babək', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Beyləqan', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Culfa', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Dəliməmmədli', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Göygöl', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Göytəpə', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Horadiz', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Xankəndi', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Xızı', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Xocalı', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Xocavənd', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Xırdalan', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Xudat', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'İmişli', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Qobustan', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Qovlar', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Qubadlı', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Liman', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Naftalan', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Naxçıvan', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Oğuz', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Ordubad', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Samux', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Siyəzən', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Şabran', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Şahbuz', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Şərur', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Şuşa', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Yevlax', 'country_id' => 17, 'created_at' => now(),],
            ['name' => 'Zəngilan', 'country_id' => 17, 'created_at' => now(),],
        ];

        City::insert($cities);
    }
}
