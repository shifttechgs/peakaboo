<?php

namespace App\Mail;

use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Invitation $invitation)
    {
        // Ensure application is loaded for context in subject/body
        $this->invitation->loadMissing('application');
    }

    public function envelope(): Envelope
    {
        $subject = $this->invitation->application
            ? "Your Peekaboo parent portal invitation — {$this->invitation->application->child_name}"
            : "You've been invited to join Peekaboo";

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        $invitation = $this->invitation;
        $application = $invitation->application; // null for non-admissions invites

        return new Content(
            view: 'emails.invitation',
            with: [
                'acceptUrl'   => route('invitation.accept', $invitation->token),
                'role'        => ucfirst($invitation->role),
                'expiresAt'   => $invitation->expires_at->format('d M Y'),
                'childName'   => $application?->child_name,
                'programName' => $application?->program_name,
                'parentName'  => $application?->mother_name,
            ],
        );
    }
}
