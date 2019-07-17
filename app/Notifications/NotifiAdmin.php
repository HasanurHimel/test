<?php

namespace App\Notifications;

use App\Models\Blog;
use App\Models\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifiAdmin extends Notification
{
//    use Queueable;implements ShouldQueue

public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog =$blog;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
//        $existingImage = Media::where('model_id', $this->blog->id)
//            ->where('collection_name', 'blog')
//            ->first();
        return [
            'author_name'=>$this->blog->author_name,
            'blog_title'=>$this->blog->blog_title,
            'photo'=>$this->blog->getFirstMediaUrl('blog'),
        ];
    }
}
