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
        $comic = \Project4\Comic::firstOrCreate(['comic_id' => 41530]);
        $comic->title = 'Ant-Man: So (Trade Paperback)';
        $comic->thumbnail_url = 'http://i.annihil.us/u/prod/marvel/i/mg/c/30/4fe8cb51f32e0.jpg';
        $comic->marvel_url = 'http://marvel.com/comics/collection/41530/ant-man_so_trade_paperback?utm_campaign=apiRef&utm_source=3955c81150716cd1f39158b80925e978';
        $comic->description = "It's the origin of the original Avenger, Ant-Man! Hank Pym has been known by a variety of names - including Ant-Man, Giant-Man, Goliath and Yellowjacket - he's been an innovative scientist, a famed super hero, an abusive spouse and more. What demons drive a man like Hank Pym? And how did he begin his heroic career?";
        $comic->on_sale_date = date('Y-m-d',strtotime('2020-12-31T00:00:00-0500'));
        $comic->isbn = '978-0-7851-6390-9';
        $comic->save();

        $comic = \Project4\Comic::firstOrCreate(['comic_id' => 58530]);
        $comic->title = 'Miracleman by Gaiman & Buckingham: The Silver Age (2016) #2';
        $comic->thumbnail_url = 'http://i.annihil.us/u/prod/marvel/i/mg/6/a0/56e6d107692cc.jpg';
        $comic->marvel_url = 'http://marvel.com/comics/issue/58530/miracleman_by_gaiman_buckingham_the_silver_age_2016_2?utm_campaign=apiRef&utm_source=3955c81150716cd1f39158b80925e978';
        $comic->description = "Miracleman has his old friend back, but Young Miracleman has never felt more alone. Where can a hero from a simpler time call home in this brave new world? The tensions building underneath Miracleman and Young Miracleman’s relationship explode in “When Titans Clash!” Remastered with stunning new artwork by Mark Buckingham! Including material originally presented in MIRACLEMAN (1985) #24, plus bonus content.";
        $comic->on_sale_date = date('Y-m-d',strtotime('2016-09-28T00:00:00-0400'));
        $comic->isbn = '';
        $comic->save();

        $comic = \Project4\Comic::firstOrCreate(['comic_id' => 56205]);
        $comic->title = 'The Unbeatable Squirrel Girl (2015) #10';
        $comic->thumbnail_url = 'http://i.annihil.us/u/prod/marvel/i/mg/9/20/5717e054ade2c.jpg';
        $comic->marvel_url = 'http://marvel.com/comics/issue/56205/the_unbeatable_squirrel_girl_2015_10?utm_campaign=apiRef&utm_source=3955c81150716cd1f39158b80925e978';
        $comic->description = "Mole Man has fallen in love with Squirrel Girl, and he’s holding the world hostage until she goes on a date with him! MOLE MEN, am I right?? Watch as Squirrel Girl gains the help of an unlikely ally! Thrill as two people kiss! BUT WHICH TWO?? You’ll have to buy the issue to find out, so all I’ll say right now is this: IN THIS ISSUE THERE IS A NON-ZERO CHANCE FOR EVERY MARVEL SHIP TO BECOME CANON!! “Ship” is short for “relationship,” in case you thought I was talking about, like, Galactus’ “Star Sphere” or Mr. Fantastic’s “Fantasticship” or whatever. Anyway, enjoy!!";
        $comic->on_sale_date = date('Y-m-d',strtotime('2016-07-27T00:00:00-0400'));
        $comic->isbn = '';
        $comic->save();


    }
}
