<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'a@g4v.ru',
            'real_name' => 'Сергей',
            'real_lastname' => 'Чазов',
            'global_permission' => 'superAdmin',
            'theme' => 'default',
            'password' => bcrypt('Aqwerty123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'remember_token' => str_random(10),
        ]);

DB::table('users')->insert([
            'name' => 'AlexanderCh',
            'email' => 'oitv18@gmail.com',
            'real_name' => 'Александр',
            'real_lastname' => 'Chazov',
            'global_permission' => 'superAdmin',
            'theme' => 'default',
            'password' => bcrypt('Aqwerty123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'remember_token' => str_random(10),
        ]);


DB::table('companies')->insert([
            'admin_id' => '1',
            'name' => 'Buisness Intersections',
            'description' => 'BI (buisness intersections) - это инструмент для системного анализа точек контакта между бизнесом и людьми ',
            'logo' => 'img/default/dot.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            
            
        ]);

DB::table('companies')->insert([
            'admin_id' => '2',
            'name' => 'Тестовая компания',
            'description' => 'Тестовое полное описание для компании. Админом являтся пользователь с id=2',
            'logo' => 'img/default/dot.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


DB::table('companies_users')->insert([
            'company_id' => '1',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            
            
        ]);
DB::table('companies_users')->insert([
            'company_id' => '2',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
DB::table('companies_users')->insert([
            'company_id' => '1',
            'user_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

//три главных тестовых точки
DB::table('dots')->insert([
            'name' => 'Сайт bi.ru.net',
            'description_full' => 'Это главная точка контакта в нашем проекте. Я вижу в ней несколько путей развития: наращивать функционал (это сейчас важнее всего), улучшать внешний вид, тестировать на баги и улучшать способы обратной связи. Ну и да: интегрировать сайт со всем, что интегрируется. например с Б24',
            'description_short' => 'Подточки: формы обратной связи, главная страница, чат поддержки',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_id' => '1',
            'author' => '1',
            'chart_id' => '1',
            ]);

DB::table('dots')->insert([
            'name' => 'Телефонные звонки',
            'description_full' => 'Телефонные звонки бывают двух видов: холодные, когда мы предлагаем бизнесу бесплатно поучаствовать зарегистрирвоаться и работать с нашим сайтом, и горячие (обратные), когда мы звоним человеку, который уже проявил интерес. Вторые ценнее',
            'description_short' => 'Делится на горячие и холодные звонки',
            'company_id' => '1',
            'chart_id' => '2',
            'author' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]);

DB::table('dots')->insert([
            'name' => 'тестовая точка',
            'description_full' => 'тестовое полное описание',
            'description_short' => 'Тестовое коротко описание',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_id' => '2',
            'author' => '1',
            'chart_id' => '3',
            ]);

//Три подчиненных точки
DB::table('dots')->insert([
            'name' => 'Обратная связь',
            'description_full' => 'Нам нужны следующие формы обратной связи: чат от битрикса, возможность оставить отзыв во время оплаты поддержки, кнопка "обратная связь как на Битриксе"',
            'description_short' => 'чат, кнопка \"обратная связь\", отзыв во время поддержки',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_id' => '1',
            'author' => '1',
            'chart_id' => '1',
            'parent_id'=>'1',
            ]);

DB::table('dots')->insert([
            'name' => 'Интерфейс',
            'description_full' => 'Нужно сделать дополнительный канбан по юзерам, а не по точкам. Это нужно вынести в конкретную задачу. А так это будет самая нагруженная точка. Надо будет разбить ее на дочерние',
            'description_short' => 'Все, что с касается функционала сайта bi.ru.net',
            'company_id' => '1',
            'author' => '1',
            'chart_id' => '2',
            'parent_id'=>'1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]);

DB::table('dots')->insert([
            'name' => 'Холодные звонки',
            'description_full' => 'Нужно разработать скрипты, определиться с базой и много еще всего',
            'description_short' => 'Все, что касается звонком людям, не проявлявшим интерес',
            'company_id' => '1',
            'author' => '1',
            'chart_id' => '1',
            'parent_id'=>'2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]);

//две точки, подчиненные точки Интерфейс

DB::table('dots')->insert([
            'name' => 'Формы',
            'description_full' => 'На сайте очень много форм - нужно каждую вынести в отдельную задачу',
            'description_short' => 'На сайте очень много форм - нужно каждую вынести в отдельную задачу',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_id' => '1',
            'author' => '1',
            'chart_id' => '1',
            'parent_id'=>'4',
            ]);

DB::table('dots')->insert([
            'name' => 'Страницы редактирования',
            'description_full' => 'Каждую страницу редактирования нужно вынести в отдельную задачу',
            'description_short' => 'Каждую страницу редактирования нужно вынести в отдельную задачу',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_id' => '1',
            'author' => '1',
            'chart_id' => '1',
            'parent_id'=>'4',
            ]);
//задачи по точкам
DB::table('dot_tasks')->insert([
            'name' => 'Сделать форму подачи идей',
            'dot_id' => '5',
            'responsible_id' => '2',
            'company_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'description' => 'Когда нажимаешь на Идея у любого пользователя должна быть возможность оставить идею, заполнив поля Проблема, Состояние, Решение',
             'problem' => 'Описание проблем у всех точек пока будет одинаковое -тестовое 0',
            'deadline'=>'2019-09-1',
            'status'=>'3',
            'author_id'=>'1',
            ]);
DB::table('dot_tasks')->insert([
            'name' => 'Сделать форму добавления точек',
            'dot_id' => '5',
            'responsible_id' => '1',
            'company_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'description' => 'На странице каждой точки нужна такая форма',
            'problem' => 'Описание проблем у всех точек пока будет одинаковое -тестовое 1',
            'deadline'=>'2019-06-23',
            'status'=>'1',
            'author_id'=>'2',
            ]);
DB::table('dot_tasks')->insert([
            'name' => 'Форма редактирования профилей нужна',
            'dot_id' => '5',
            'responsible_id' => '2',
            'company_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'description' => 'Я думаю, это понятная функция, может она, кстати уже есть в ларавеле',
            'problem' => 'Описание проблем у всех точек пока будет одинаковое -тестовое 2',
            'deadline'=>'2019-09-1',
            'status'=>'3',
            'author_id'=>'1',
            ]);
//тестовые задачи для тестовой компании
DB::table('dot_tasks')->insert([
            'name' => 'Тестовая задача1',
            'dot_id' => '5',
            'responsible_id' => '2',
            'company_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'problem' => 'Описание проблем у всех точек пока будет одинаковое -тестовое 3',
            'description' => 'Описание для тестовой задачи1',
            'deadline'=>'2019-09-1',
            'status'=>'4',
            'author_id'=>'1',
            ]);
DB::table('dot_tasks')->insert([
            'name' => 'Тестовая задача2',
            'dot_id' => '5',
            'responsible_id' => '1',
            'company_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'description' => 'Описание для тестовой задачи2',
            'problem' => 'Описание проблем у всех точек пока будет одинаковое -тестовое 4',
            'deadline'=>'2019-09-1',
            'status'=>'2',
            'author_id'=>'2',
            ]);
DB::table('dot_tasks')->insert([
            'name' => 'Тестовая задача3',
            'dot_id' => '5',
            'responsible_id' => '2',
            'company_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'description' => 'Описание для тестовой задачи4',
            'problem' => 'Описание проблем у всех точек пока будет одинаковое -тестовое 5',
            'deadline'=>'2019-09-1',
            'status'=>'5',
            'author_id'=>'2',
            ]);



    }
}
