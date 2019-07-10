<?php

namespace App\Notifications;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifiAdmin extends Notification implements ShouldQueue
{
    use Queueable;

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
        return [
            'author_name'=>$this->blog->author_name,
            'blog_title'=>$this->blog->blog_title,
            'time'=>$this->blog->created_at,
        ];
    }
}
