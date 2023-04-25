<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\City::create([
            'name_ru' => 'Алматы',
            'name_kk' => 'Алматы',
            'name_en' => 'Almaty'
        ]);

        \App\Models\Street::create([
            'city_id' => 1,
            'name_ru' => 'улица Наурызбай Батыра',
            'name_kk' => 'Наурызбай Батыр көшесі',
            'name_en' => 'Nauryzbai Batyr Street'
        ]);

        \App\Models\Street::create([
            'city_id' => 1,
            'name_ru' => 'улица Сейфуллина',
            'name_kk' => 'Сейфуллин көшесі',
            'name_en' => 'Seyfullin Street'
        ]);

        \App\Models\House::create([
            'street_id' => 1,
            'house_number' => 111,
            'coordinates' => '43.243133, 76.937066',
            'secret_code' => 'hqz3Rt'
        ]);

        \App\Models\House::create([
            'street_id' => 2,
            'house_number' => 534,
            'coordinates' => '43.242739, 76.934721',
            'secret_code' => 'kUwb78'
        ]);

        \App\Models\HouseName::create([
            'house_id' => 1,
            'name_ru' => 'ЖК Exclusive Life',
            'name_kk' => 'ТҮК Exclusive Life',
            'name_en' => 'RC Exclusive Life'
        ]);

        \App\Models\Block::create([
            'house_id' => 1,
            'name_ru' => 'Блок 1',
            'name_en' => 'Block 1',
        ]);
        \App\Models\Block::create([
            'house_id' => 1,
            'name_ru' => 'Блок 2',
            'name_en' => 'Block 2',
        ]);


        \App\Models\Block::create([
            'house_id' => 2,
            'name_ru' => 'Подъезд 1',
            'name_kk' => 'Кіреберіс 1',
            'name_en' => 'Entrance 1',
        ]);

        \App\Models\Category::create([
            'keyword' => 'suggestions',
            'name_ru' => 'Предложения',
            'name_kk' => 'Ұсыным',
            'name_en' => 'Suggestions',
        ]);
        \App\Models\Category::create([
            'keyword' => 'complaints',
            'name_ru' => 'Жалобы',
            'name_kk' => 'Шағым',
            'name_en' => 'Complaints',
        ]);
        \App\Models\Category::create([
            'keyword' => 'leisure',
            'name_ru' => 'Досуг',
            'name_kk' => 'Демалыс',
            'name_en' => 'Leisure',
        ]);
        \App\Models\Category::create([
            'keyword' => 'other',
            'name_ru' => 'Разное',
            'name_kk' => 'Әртүрлі',
            'name_en' => 'Other',
        ]);

        \App\Models\Visibility::create([
            'name_ru' => 'Только мои соседи по ЖК',
            'name_kk' => 'Тек менің ТҮК-тегі көршілерім',
            'name_en' => 'Only my RC neighbors',
        ]);
        \App\Models\Visibility::create([
            'name_ru' => 'Только мои соседи по блоку',
            'name_kk' => 'Тек менің блоктағы көршілерім',
            'name_en' => 'Only my block neighbors',
        ]);
        \App\Models\Visibility::create([
            'name_ru' => 'Все в моём районе',
            'name_kk' => 'Аймағымдағы барлық адамдар',
            'name_en' => 'Everyone in my neighborhood',
        ]);

        \App\Models\ChatRoom::create([
            'chattable_id' => 1,
            'chattable_type' => 'App\Models\House'
        ]);

        \App\Models\ChatRoom::create([
            'chattable_id' => 1,
            'chattable_type' => 'App\Models\Block'
        ]);

        \App\Models\ChatMessage::create([
            'chat_room_id' => 1,
            'user_id' => 1,
            'message' => 'test'
        ]);
        \App\Models\ChatMessage::create([
            'chat_room_id' => 1,
            'user_id' => 2,
            'message' => 'test2'
        ]);
    }
}
