<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Modules\Enrolment\Entities\InvoiceLog;

class StudentResetPassword extends Notification
{
    use Queueable;

    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        //Mail::to($email)->send(new SendNetaMail($content, $subject));
       // $url = url(config('app.url').route('password.reset', $this->token, false));
       $url = route('student.password.reset.token', $this->token);

       $invoice_log = InvoiceLog::create([
        'enrolment_id' =>1,
        'student_id' =>2,
        'full_name' => 'fdsaf',
        'subject' => 'fsdfda',
        'description' => 'fkdjfaljkd',
        'redirect_url' => route('student-hub'),
        'end_line' => 'Thank you for enrolling!',
        'invoice_file' => 'fsdf.pdf',
    ]);

        return (new MailMessage)
                    ->line('You are receiving this email because we received a password reset request for your account.')
                    ->action('Reset Password', $url)
                    ->line('If you did not request a password reset, no further action is required.');
                    $invoice_log->update(['status' => 1]);
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