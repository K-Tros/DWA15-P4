<?php

namespace Project4\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $offset = 0;
            $now = \Carbon\Carbon::now();
            $request = new Illuminate\Http\Request();
            $request->replace(array('limit' => 100,
                                    'offset' => $offset));

            do {
                $helper = new \Project4\Libraries\MarvelAPIHelper();
                $apiresult = $helper->getComicsFromAPI($request);

                $total = $apiresult['total'];
                $comics = $apiresult['results'];

                foreach ($comics as $comic) {

                    $dbcomic = \Project4\Comic::firstOrCreate(['comic_id' => $comic['id']]);
                    // only update if the comic has been updated in the API in the last 24 hours
                    if ($dbcomic->updated_at->lt($now)) {
                        $dbcomic->title = $comic['title'];
                        $dbcomic->thumbnail_url = $comic['thumbnail']['path'] . '.' . $comic['thumbnail']['extension'];
                        foreach ($comic['urls'] as $url) {
                            if ($url['type'] == 'detail') {
                                $dbcomic->marvel_url = $url['url'];
                            }
                        }
                        $dbcomic->description = $comic['description'];
                        foreach ($comic['dates'] as $date) {
                            if ($date['type'] = 'onsaleDate') {
                                $dbcomic->on_sale_date = date('Y-m-d',strtotime($date['date']));
                            }
                        }
                        $dbcomic->isbn = $comic['isbn'];
                        $dbcomic->save();
                    }
                }

            } while ($offset <= $total + 100);
        })->daily();
    }
}
