<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use PDF;
use App\Modules\Enrolment\Entities\InvoiceLog;

class ResendEnrolmentPaymentInvoice extends Notification
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
        InvoiceLog::where('id',$this->data['id'])->update(['status' => 1]);

        return (new MailMessage)
            ->greeting('Dear ' . $this->data['full_name'])
            ->subject($this->data['subject'])
            ->line($this->data['description'])
            ->action('My Courses',$this->data['redirect_url'])
            ->line('Thank you for enrolling!')
           // ->cc('accounts@nursingeta.com')
            ->attach(public_path('invoices/'.$this->data['invoice_file']));
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
