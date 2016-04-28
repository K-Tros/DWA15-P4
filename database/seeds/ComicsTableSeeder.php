<?php

use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comic = \App\Comic::firstOrCreate(['comic_id' => 41530]);
        $comic->title = 'Ant-Man: So (Trade Paperback)';
        $comic->thumbnail_url = 'test@gmail.com';
        $comic->marvel_url = 'http://marvel.com/comics/collection/41530/ant-man_so_trade_paperback?utm_campaign=apiRef&utm_source=3955c81150716cd1f39158b80925e978';
        $comic->description = "It's the origin of the original Avenger, Ant-Man! Hank Pym has been known by a variety of names - including Ant-Man, Giant-Man, Goliath and Yellowjacket - he's been an innovative scientist, a famed super hero, an abusive spouse and more. What demons drive a man like Hank Pym? And how did he begin his heroic career?";
        $comic->on_sale_date = date('Y-m-d',strtotime('2020-12-31T00:00:00-0500'));
        $comic->isbn = '978-0-7851-6390-9';
        $comic->save();
    }
}
