<?php

namespace App\Console\Commands;

use FFMpeg\Format\Video\X264;
use Illuminate\Console\Command;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VideoEncode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video-encode:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Video Encoding';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $low = (new X264('aac'))->setKiloBitrate(500);
        $high = (new x264('aac'))->setKiloBitrate(1000);

        FFMpeg::fromDisk('videos-temp')
        ->open('sample.mp4')
        ->exportForHLS()
        ->addFormat($low, function($filters){
            $filters->resize(640,480);
        }) ->addFormat($high, function($filters){
            $filters->resize(1280,720);
        })->onProgress(function($progress){
            $this->info("Progress= {$progress}%");
        })
        ->toDisk('videos-temp')
        ->save('/test/file.m3u8');

        // $lowBitrate = (new X264)->setKiloBitrate(250);
        // $midBitrate = (new X264)->setKiloBitrate(500);
        // $highBitrate = (new X264)->setKiloBitrate(1000);
        // $superBitrate = (new X264)->setKiloBitrate(1500);

                
        // FFMpeg::fromDisk('videos-temp')
        // ->open('sample.mp4')
        //     ->exportForHLS()
        //     ->addFormat($lowBitrate, function($media) {
        //         $media->addFilter('scale=640:480');
        //     })
        //     ->addFormat($midBitrate, function($media) {
        //         $media->scale(960, 720);
        //     })
        //     ->addFormat($highBitrate, function ($media) {
        //         $media->addFilter(function ($filters, $in, $out) {
        //             $filters->custom($in, 'scale=1920:1200', $out); // $in, $parameters, $out
        //         });
        //     })
        //     ->addFormat($superBitrate, function($media) {
        //         $media->addLegacyFilter(function ($filters) {
        //             $filters->resize(new \FFMpeg\Coordinate\Dimension(2560, 1920));
        //         });
        //     })->toDisk('videos-temp')
        // ->save('/test/file.m3u8');
    }
}
