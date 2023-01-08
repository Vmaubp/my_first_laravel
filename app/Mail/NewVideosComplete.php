<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

//導入"指定寄信人地址"填寫功能(預設沒加)
use Illuminate\Mail\Mailables\Address;

class NewVideosComplete extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(

            //加入寄信人地址填寫(預設沒加)
            // from: new Address('jeffrey@example.com', 'Jeffrey Way'),

            //這裡填寫信件主旨
            subject: '您上傳了一部新影片!',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(

            //這裡是信件"內容"，改寫成你的edm位置
            //注意現在不用加副檔名blade.php了!
            view: 'email.upload-complete',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
