<?php

namespace Database\Seeders;

use App\Models\Ebook;
use Illuminate\Database\Seeder;

class EbooksTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $ebook = new Ebook;
        $ebook->title = 'Macbeth';
        $ebook->author = 'William Shakespeare';
        $ebook->description = 'Romeo and Juliet.';
        $ebook->save();

        $ebook = new Ebook;
        $ebook->title = 'Manusia Setengah Salmon';
        $ebook->author = 'Raditya Dika';
        $ebook->description = 'Buku dari Raditya Dika yang menggambarkan kisah cintanya.';
        $ebook->save();

        $ebook = new Ebook;
        $ebook->title = 'Manusia Seutuhnya Salmon';
        $ebook->author = 'Daditya Rika';
        $ebook->description = 'Buku parodi dari Manusia Setengah Salmon yang ditulis kembarannya Raditya Dika, Daditya Rika.';
        $ebook->save();

        $ebook = new Ebook;
        $ebook->title = '1+1 = 2 for babies';
        $ebook->author = 'Orang';
        $ebook->description = 'Buku yang tepat untuk mengajarkan bayi anda matematika sejak dini.';
        $ebook->save();

        $ebook = new Ebook;
        $ebook->title = 'Binusian Handbook';
        $ebook->author = 'Binus University';
        $ebook->description = 'Panduan perkuliahan lengkap di Binus University.';
        $ebook->save();
    }
}
