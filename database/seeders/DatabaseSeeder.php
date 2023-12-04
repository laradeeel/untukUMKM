<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Menu;
use App\Models\User;
use App\Models\Menu_category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => 1
        ]);
        User::create([
            'id' => 2,
            'nama' => 'pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('pelanggan'),
            'is_admin' => 1
        ]);

        Menu::create([
            'menu_category_id' => 1, 
            'nama_menu' => 'Pempek Kecil lenjer',
            'slug' => 'pempek1',
            'gambar' => 'assets/img/default.jpg',
            'deskripsi_menu' => 'Sate Ayam adalah hidangan yang terbuat dari potongan daging ayam yang ditusuk dengan bambu, kemudian dipanggang hingga matang sempurna. Daging ayam yang lembut dan bumbu rempah yang khas memberikan cita rasa yang gurih dan pedas. Sate Ayam sering disajikan dengan bumbu kacang yang kental dan sedikit pedas, serta dilengkapi dengan irisan bawang merah dan timun segar sebagai pelengkap.',
            'harga' => '2500'
        ]);
        Menu::create([
            'menu_category_id' => 1, 
            'nama_menu' => 'Pempek Kecil Kapal Selam',
            'slug' => 'pempek2',
            'gambar' => 'assets/img/default.jpg',
            'deskripsi_menu' => 'Sate Ayam adalah hidangan yang terbuat dari potongan daging ayam yang ditusuk dengan bambu, kemudian dipanggang hingga matang sempurna. Daging ayam yang lembut dan bumbu rempah yang khas memberikan cita rasa yang gurih dan pedas. Sate Ayam sering disajikan dengan bumbu kacang yang kental dan sedikit pedas, serta dilengkapi dengan irisan bawang merah dan timun segar sebagai pelengkap.',
            'harga' => '2500'
        ]);
        Menu::create([
            'menu_category_id' => 1, 
            'nama_menu' => 'Pempek Besar Kapal Selam',
            'slug' => 'pempek3',
            'gambar' => 'assets/img/default.jpg',
            'deskripsi_menu' => 'Sate Ayam adalah hidangan yang terbuat dari potongan daging ayam yang ditusuk dengan bambu, kemudian dipanggang hingga matang sempurna. Daging ayam yang lembut dan bumbu rempah yang khas memberikan cita rasa yang gurih dan pedas. Sate Ayam sering disajikan dengan bumbu kacang yang kental dan sedikit pedas, serta dilengkapi dengan irisan bawang merah dan timun segar sebagai pelengkap.',
            'harga' => '12000'
        ]);
        Menu::create([
            'menu_category_id' => 1, 
            'nama_menu' => 'Pempek Besar Lenjer',
            'slug' => 'pempek4',
            'gambar' => 'assets/img/default.jpg',
            'deskripsi_menu' => 'Sate Ayam adalah hidangan yang terbuat dari potongan daging ayam yang ditusuk dengan bambu, kemudian dipanggang hingga matang sempurna. Daging ayam yang lembut dan bumbu rempah yang khas memberikan cita rasa yang gurih dan pedas. Sate Ayam sering disajikan dengan bumbu kacang yang kental dan sedikit pedas, serta dilengkapi dengan irisan bawang merah dan timun segar sebagai pelengkap.',
            'harga' => '12000'
        ]);
        Menu::create([
            'menu_category_id' => 2, // category = minuman
            'nama_menu' => 'Es Teh Tawar',
            'slug' => 'es-teh1',
            'gambar' => 'assets/img/default.jpg',
            'deskripsi_menu' => 'Es Teh Tawar adalah minuman yang terdiri dari teh hitam atau teh hijau yang diseduh dan didinginkan dengan es batu. Rasanya yang segar dan tawar menjadikan minuman ini pilihan yang populer untuk menghilangkan dahaga dan menyejukkan tenggorokan. Es Teh Tawar biasanya disajikan dengan irisan lemon atau jeruk nipis untuk memberikan aroma segar.',
            'harga' => '2000'
        ]);
        Menu::create([
            'menu_category_id' => 2,
            'nama_menu' => 'Es Teh Manis',
            'slug' => 'es-teh2',
            'gambar' => 'assets/img/default.jpg',
            'deskripsi_menu' => 'Air Putih adalah minuman yang paling sederhana dan alami, terdiri dari air tanpa tambahan apapun. Air putih tidak memiliki rasa atau aroma khusus, tetapi memberikan manfaat penting bagi tubuh dalam menjaga kecukupan hidrasi dan menghilangkan dahaga.',
            'harga' => '5000'
        ]);
        Menu::create([
            'menu_category_id' => 2,
            'nama_menu' => 'Jus Jeruk',
            'slug' => 'jus',
            'gambar' => 'assets/img/default.jpg',
            'deskripsi_menu' => 'Jus Jeruk adalah minuman segar yang terbuat dari perasan buah jeruk segar yang kaya akan vitamin C. Rasanya yang manis asam dan segar sangat menggugah selera, serta memberikan banyak nutrisi yang baik untuk kesehatan. Jus Jeruk dapat dinikmati dingin atau dengan tambahan es batu untuk sensasi kesegaran yang lebih terasa.',
            'harga' => '7000'
        ]);
        Menu_category::create([
            'nama_category' => 'Makanan',
            'slug' => 'makanan-category'
        ]);
        Menu_category::create([
            'nama_category' => 'Minuman',
            'slug' => 'minuman-category'
        ]);
    }
}
