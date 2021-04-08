<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use PDF;
use App\Modules\Enrolment\Entities\InvoiceLog;

class EnrolmentInstallmentPayment extends Notification
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
        $pdf = PDF::loadView('enrolment::mail.invoice', $this->data);

        //$invoice_name = 'invoice_'.$this->data['course_program_title'].'_' . date('Y-m-d') . '.pdf';

  /*       $invoice_log = InvoiceLog::create([
            'enrolment_id' => $this->data['enrolment_id'],
            'student_id' => $this->data['student_id'],
            'full_name' => $this->data['full_name'],
            'subject' => $this->data['subject'],
            'description' => $this->data['mail_desc'],
            'redirect_url' => $this->data['pay_url'],
            'end_line' => 'Thank you!',
            'invoice_file' => $invoice_name,
        ]); */

        return (new MailMessage)
            ->greeting('Dear ' . $this->data['full_name'])
            ->subject($this->data['subject'])
            ->line($this->data['mail_desc'])
            ->action('Pay Now', $this->data['pay_url'])
            ->line('Thank you!')
            ->cc('accounts@nursingeta.com');
            //->attachData($pdf->output(), $invoice_name);
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
