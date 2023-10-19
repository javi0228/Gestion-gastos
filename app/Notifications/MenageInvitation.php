<?php

namespace App\Notifications;

use App\Models\Menage;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MenageInvitation extends Notification
{
    use Queueable;

    /**
     * Menage invited to
     */
    private Menage $menage;

    /**
     * User who invites
     */
    private User $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(Menage $menage, User $user)
    {
        $this->menage = $menage;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'menage_name' => $this->menage->name,
            'menage_id' => $this->menage->id,
            'from_user_name' => $this->user->name,
            'from_user_email' => $this->user->email,
        ];
    }
}