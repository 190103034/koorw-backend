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
            'coordinates' => '43.243133, 76.937066'
        ]);

        \App\Models\House::create([
            'street_id' => 2,
            'house_number' => 534,
            'coordinates' => '43.242739, 76.934721'
        ]);

        \App\Models\HouseName::create([
            'house_id' => 1,
            'name_ru' => 'ЖК Exclusive Life',
            'name_kk' => 'ТҮК Exclusive Life',
            'name_en' => 'RC Exclusive Life'
        ]);

        \App\Models\Service::create([
            'type' => 'master',
            'name_ru' => 'Электрик',
            'name_kk' => 'Электрші',
            'name_en' => 'Electrician'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 1,
            'type' => 'phone',
            'value' => '77077077070'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 1,
            'type' => 'whatsapp',
            'value' => '77077077070'
        ]);

        \App\Models\Service::create([
            'type' => 'master',
            'name_ru' => 'Сантехник',
            'name_kk' => 'Сантехник',
            'name_en' => 'Plumber'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 2,
            'type' => 'phone',
            'value' => '77022022020'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 2,
            'type' => 'whatsapp',
            'value' => '77022022020'
        ]);

        \App\Models\Service::create([
            'type' => 'business',
            'name_ru' => 'Пиццерия d’Italia',
            'name_kk' => 'd’Italia пиццериясы',
            'name_en' => 'Pizzeria d’Italia'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 3,
            'type' => 'phone',
            'value' => '77033033030'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 3,
            'type' => 'whatsapp',
            'value' => '77033033030'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 3,
            'type' => 'instagram',
            'value' => 'del_papa'
        ]);

        \App\Models\Service::create([
            'type' => 'business',
            'name_ru' => 'Салон красоты Sulujan',
            'name_kk' => 'Sulujan сән салоны',
            'name_en' => 'Fashion Salon Sulujan'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 4,
            'type' => 'phone',
            'value' => '77044044040'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 4,
            'type' => 'whatsapp',
            'value' => '77044044040'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 4,
            'type' => 'instagram',
            'value' => 'sulujan'
        ]);
        \App\Models\ServiceContact::create([
            'service_id' => 4,
            'type' => 'telegram',
            'value' => 'sulujan'
        ]);


        \App\Models\HouseService::create([
            'house_id' => 1,
            'service_id' => 1
        ]);
        \App\Models\HouseService::create([
            'house_id' => 1,
            'service_id' => 2
        ]);
        \App\Models\HouseService::create([
            'house_id' => 1,
            'service_id' => 3
        ]);
        \App\Models\HouseService::create([
            'house_id' => 1,
            'service_id' => 4
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

        \App\Models\User::create([
            'block_id' => 1,
            'username' => 'kaaslikk',
            'picture' => '/images/madi.jpg',
            'name' => 'Мади',
            'phone' => '77073054536',
            'password' => Hash::make('qqqqq11111')
        ]);

        \App\Models\User::create([
            'block_id' => 1,
            'username' => 'abayq',
            'picture' => '/images/abay.jpg',
            'name' => 'Абай',
            'phone' => '77027348346',
            'password' => Hash::make('wwwww22222')
        ]);

        \App\Models\User::create([
            'block_id' => 2,
            'username' => 'asem_su',
            'picture' => '/images/asem.jpg',
            'name' => 'Әсем',
            'phone' => '77235327584',
            'password' => Hash::make('wwwww22222')
        ]);

        \App\Models\User::create([
            'block_id' => 3,
            'username' => 'giorgi',
            'picture' => '/images/giorgi.png',
            'name' => 'Гиорги',
            'phone' => '77942476357',
            'password' => Hash::make('wwwww22222')
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
            'name_ru' => 'Только моим соседям по ЖК',
            'name_kk' => 'Тек менің ТҮК-тегі көршілерім үшін',
            'name_en' => 'Only for my RC neighbors',
        ]);
        \App\Models\Visibility::create([
            'name_ru' => 'Только моим соседям по блоку',
            'name_kk' => 'Тек менің блоктағы көршілерім үшін',
            'name_en' => 'Only for my block neighbors',
        ]);
        \App\Models\Visibility::create([
            'name_ru' => 'Для всех в моем районе',
            'name_kk' => 'Аймағымдағы барлық адамдар үшін',
            'name_en' => 'Everyone in my neighborhood',
        ]);

        \App\Models\Post::create([
            'hash_id' => 'qnfA72',
            'user_id' => 1,
            'category_id' => 1,
            'visibility_id' => 1,
            'body' => 'Повседневная практика показывает, что укрепление и развитие структуры играет важную роль в формировании дальнейших направлений развития. Равным образом начало повседневной работы по формированию позиции требуют определения и уточнения направлений прогрессивного развития.'
        ]);
        \App\Models\Post::create([
            'hash_id' => 'mwlQ92',
            'user_id' => 2,
            'parent_id' => 1,
            'category_id' => 1,
            'visibility_id' => 1,
            'body' => 'Поддерживаю!'
        ]);
        \App\Models\Post::create([
            'hash_id' => 'pdnJ82',
            'user_id' => 3,
            'parent_id' => 1,
            'category_id' => 1,
            'visibility_id' => 1,
            'body' => 'Считаю это лишним.'
        ]);

        \App\Models\Post::create([
            'hash_id' => 'msuL92',
            'user_id' => 2,
            'category_id' => 2,
            'visibility_id' => 2,
            'body' => 'Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности позволяет оценить значение модели развития.'
        ]);

        \App\Models\Post::create([
            'hash_id' => 'kwoS95',
            'user_id' => 3,
            'category_id' => 3,
            'visibility_id' => 3,
            'body' => 'Равным образом постоянное информационно.'
        ]);
    }
}
