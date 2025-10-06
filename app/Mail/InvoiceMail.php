<?php 

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;
    public $invoice;
    public $pdfPath;

    public function __construct($emailData, $invoice, $pdfPath)
    {
        $this->emailData = $emailData;
        $this->invoice = $invoice;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        // dd($this->emailData);
        return $this->from('ankitkashyap523523@gmail.com')
                    ->subject($this->emailData['subject'])
                    ->view('admin_panel.module.customerinvoice.submodule.invoice-email-template-body')
                    ->with([
                        'invoice' => $this->invoice,
                        'emailData' => $this->emailData
                    ])
                    ->attach($this->pdfPath, [
                        'as' => 'invoice_' . $this->invoice->invoice_number . '.pdf', // Attachment name
                        'mime' => 'application/pdf',
                    ]);
    }
}
