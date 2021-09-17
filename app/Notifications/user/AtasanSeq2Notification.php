<?php

namespace App\Notifications\user;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class AtasanSeq2Notification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->data['a_seq'] = 2;
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
        $urlApprove = route('user.pengajuanBarang.atasan.seq2.approve', ['kode_reg' => $this->data['p_reg'], 'p_token' => $this->data['p_token'], 'a_seq' => $this->data['a_seq']]);
        $urlReject = route('user.pengajuanBarang.atasan.reject', ['kode_reg' => $this->data['p_reg'], 'p_token' => $this->data['p_token']]);
        return (new MailMessage)
            ->subject($this->data['subject'])
            ->line('The introduction to the notification.')
            ->line('Nama atasan : '. $this->data['p_atsn'])
            ->line('Nama  : '. $this->data['p_nmusr'])
            ->line('No Reg : '. $this->data['p_reg'])
            ->line('Keterangan : '. $this->data['p_desk'])
            ->action('Approve', $urlApprove)
            //->action('reject', $urlReject)
            ->line(new HtmlString(',<center><button class="btn bg-red waves-effect"> <a href="'.$urlReject.'" style="display:block; margin: 0 auto; width: 130px;">No Approve</a> </button></center>'))
            ->line('Thank you for using our application!');
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
