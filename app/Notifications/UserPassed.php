<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserPassed extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $content;
    public $result;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->result = 'Your Scores are referral:'.' '.$this->user->referral_score.', story response score: '.$this->user->story_score.', total score: '.$this->user->total_score;
        $this->content= 'Congratulation' . ' ' . $this->user->name . ' ' . 'you have completed level' . $this->user->level_number . ' ' . 'and meet all the conditions to get a certificate';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->view('frontend.emails.result-notification-mail',[
                'name' => $this->user->name,
                'content' => $this->content,
                'result' => $this->result
            ]);
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return
     */
    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->user->name,
            'content' => $this->content,
            'result' => $this->result
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
