<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class EnrolmentApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $applicationId;
    public $pdfPath;
    public $documents;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $applicationId, $pdfPath, $documents = [])
    {
        $this->data = $data;
        $this->applicationId = $applicationId;
        $this->pdfPath = $pdfPath;
        $this->documents = $documents;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Enrolment Application - ' . $this->applicationId,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.enrolment-application',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        $attachments = [];

        // Attach the PDF application
        if ($this->pdfPath && file_exists($this->pdfPath)) {
            $attachments[] = Attachment::fromPath($this->pdfPath)
                ->as('Application-' . $this->applicationId . '.pdf')
                ->withMime('application/pdf');
        }

        // Attach uploaded documents
        foreach ($this->documents as $document) {
            if (file_exists($document['path'])) {
                $attachments[] = Attachment::fromPath($document['path'])
                    ->as($document['name'])
                    ->withMime($document['mime']);
            }
        }

        return $attachments;
    }
}
