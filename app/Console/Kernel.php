<?php

namespace App\Console;

use App\Jobs\PostSchedule;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('telescope:prune')->daily();

        $posts = Post::query()->where('status', 'SCHEDULE')->get();

        foreach ($posts as $post) {
            $schedule->job(new PostSchedule($post->id))->when(fn()=> Carbon::parse($post->published_at)->isPast());
        }
        // PostSchedule::dispatch(28)->delay(Carbon::now()->addMinutes(1));
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
