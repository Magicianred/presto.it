<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AddLogo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $srcPath;


    public function __construct($srcPath)
    {

        $this->srcPath = $srcPath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $image = Image::load($this->srcPath);
        $w = 150;
        $h = 88;


        // $i = AnnouncementImage::find($this->announcement_image_id);
        // if (!$i) {
        //     return;
        // }
        // $image = file_get_contents(storage_path('/app/' . $i->file));
        // $srcPath = storage_path('/app/' . $i->file);
        // $image = file_get_contents($srcPath);
        
        // $image = Image::load($srcPath);

        $image->watermark(base_path('resources/media/logo/logo-presto-bianco.png'))
            ->watermarkOpacity(50)
            ->watermarkPosition('bottom-right')
            ->watermarkPadding(10, 10)
            ->watermarkWidth($w, Manipulations::UNIT_PIXELS)
            ->watermarkHeight($h, Manipulations::UNIT_PIXELS)
            ->watermarkFit(Manipulations::FIT_STRETCH);
        $image->save($this->srcPath);
    }
}
