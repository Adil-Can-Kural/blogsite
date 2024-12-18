<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon\Carbon;

class UpdatePostStatus extends Command
{
    protected $signature = 'posts:update-status';
    protected $description = 'Oluşturulma süresi 2 günü geçen postların durumunu günceller.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
       
        $twoDaysAgo = Carbon::now()->subDays(2);

        $posts = Post::where('status', 'new') 
                     ->where('updated_at', '<=', $twoDaysAgo) 
                     ->update(['status' => 'published']); 

        $this->info("Güncellenen Post Sayısı: " . $posts);
    }
}
