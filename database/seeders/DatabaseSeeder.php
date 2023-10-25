<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Desa;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            
            // User::create([
                //     'name'=>'Cakra',
                //     'email'=>'cakra@gmail.com',
                //     'password'=>bcrypt('12345')
                // ]
                // );
                // User::create( [
                    //     'name'=>'Bima',
                    //     'email'=>'bima@gmail.com',
                    //     'password'=>bcrypt('1234')
                    // ]);
                    
                    // User::factory(3)->create();
                    // Category::create([
                    //     'name'=>'Web Programming',
                    //     'slug'=>'web-programming'
                    //      ]);
                    // Category::create([
                    //     'name'=>'Web Design',
                    //     'slug'=>'web-design'
                    // ]);
                    // Category::create([
                    //     'name'=>'Android Programming',
                    //     'slug'=>'android-programming'
                    // ]);
                    // Post::factory(20)->create();
        // Post::create([
        //     'title'=>'Judul Pertama',
        //     'slug'=>'judul-pertama',
        //     'excerpt'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, temporibus.',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dicta enim itaque architecto est dolores et repellendus aperiam fugiat sint, placeat earum veniam aut dolor, non perspiciatis repudiandae quaerat quo odit, magnam ipsum neque a sequi incidunt. Eveniet, perferendis. Nemo quis, molestias obcaecati cum sapiente doloribus dolor optio consequuntur numquam!',
        //     'category_id'=>1,
        //     'user_id'=>1
        // ]);
        // Post::create([
        //     'title'=>'Judul Kedua',
        //     'slug'=>'judul-kedua',
        //     'excerpt'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, temporibus.',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dicta enim itaque architecto est dolores et repellendus aperiam fugiat sint, placeat earum veniam aut dolor, non perspiciatis repudiandae quaerat quo odit, magnam ipsum neque a sequi incidunt. Eveniet, perferendis. Nemo quis, molestias obcaecati cum sapiente doloribus dolor optio consequuntur numquam!',
        //     'category_id'=>1,
        //     'user_id'=>1
        // ]);
        // Post::create([
        //     'title'=>'Judul Ketiga',
        //     'slug'=>'judul-ketiga',
        //     'excerpt'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, temporibus.',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dicta enim itaque architecto est dolores et repellendus aperiam fugiat sint, placeat earum veniam aut dolor, non perspiciatis repudiandae quaerat quo odit, magnam ipsum neque a sequi incidunt. Eveniet, perferendis. Nemo quis, molestias obcaecati cum sapiente doloribus dolor optio consequuntur numquam!',
        //     'category_id'=>2,
        //     'user_id'=>2
        // ]);
        // Post::create([
        //     'title'=>'Judul KeEmpat',
        //     'slug'=>'judul-keempat',
        //     'excerpt'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, temporibus.',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dicta enim itaque architecto est dolores et repellendus aperiam fugiat sint, placeat earum veniam aut dolor, non perspiciatis repudiandae quaerat quo odit, magnam ipsum neque a sequi incidunt. Eveniet, perferendis. Nemo quis, molestias obcaecati cum sapiente doloribus dolor optio consequuntur numquam!',
        //     'category_id'=>2,
        //     'user_id'=>2
        // ]);

        Kabupaten::create([
            'nama' =>"Denpasar",
           
            
        ]);
        Kabupaten::create([
            'nama' =>"Badung",
           
            
        ]);
        Kabupaten::create([
            'nama' =>"Karangasem",
           
            
        ]);
      Kecamatan::create([
            'nama'=>"Denpasar Barat",
            'kabupaten_id'=>1,
           

      ]);
      Kecamatan::create([
            'nama'=>"Denpasar Utara",
            'kabupaten_id'=>1,
           

      ]);
      Kecamatan::create([
            'nama'=>"Mengwi",
            'kabupaten_id'=>2,
           

      ]);
      Kecamatan::create([
            'nama'=>"Kuta Utara",
            'kabupaten_id'=>2,
           

      ]);
      Kecamatan::create([
            'nama'=>"Abiansemal",
            'kabupaten_id'=>2,
           

      ]);
    

      Desa::create([
          'kabupaten_id'=>1,
          'kecamatan_id'=>1,
          'nama_desa'=>'Pemecutan Kelod',
          'nama_bendesa'=>'I Wayan Tantra',
          'no_telp'=>'0826532653',
          'afiliasi_partai'=>'PDI Perjuangan'
      ]);
    
      Desa::create([
          'kabupaten_id'=>1,
          'kecamatan_id'=>2,
          'nama_desa'=>'Pemecutan Kaja',
          'nama_bendesa'=>'I Gede Bawa',
          'no_telp'=>'0826532653',
          'afiliasi_partai'=>'PDI Perjuangan'
      ]);
      Desa::create([
          'kabupaten_id'=>2,
          'kecamatan_id'=>5,
          'nama_desa'=>'Sibang Kaja',
          'nama_bendesa'=>'I Nyoman Murda',
          'no_telp'=>'0826532653',
          'afiliasi_partai'=>'Demokrat'
      ]);
    }

}
