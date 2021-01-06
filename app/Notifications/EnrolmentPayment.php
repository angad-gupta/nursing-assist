<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use PDF;

class EnrolmentPayment extends Notification
{
    use Queueable;

    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        $pdf = PDF::loadView('enrolment::mail.invoice', $data);

        return (new MailMessage)
            ->greeting('Dear ' . $this->data['full_name'])
            ->subject($this->data['subject'])
            ->line($this->data['mail_desc'])
            ->action('My Courses', route('student-hub'))
            ->line('Thank you for enrolling!')
            ->cc('accounts@nursingeta.com')
            ->attachData($pdf->output(), 'invoice_oba_' . date('Y-m-d') . '.pdf');
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
