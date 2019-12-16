<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserFailed extends Notification implements ShouldQueue
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
        $this->content = 'We are deeply sorry' . ' ' . $this->user->name . ' ' . 'you were not able to meet the criteria to complete' . $this->user->level_number.', we advice you try again in another season';
        $this->result = 'Your Scores are referral:'.' '.$this->user->referral_score.', story response score: '.$this->user->story_score.', total score: '.$this->user->total_score;
        // $this->result = '200';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
