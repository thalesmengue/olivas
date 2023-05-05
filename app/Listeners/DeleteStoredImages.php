<?php

namespace App\Listeners;

use App\Events\DeletedUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\File;

class DeleteStoredImages
{
    public function handle(DeletedUser $event): void
    {
        foreach ($event->user->clients as $client) {
            File::delete(public_path('storage/' . $client->image));
        }
    }
}
