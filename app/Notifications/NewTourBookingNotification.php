<?php

namespace App\Notifications;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NewTourBookingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Lead $lead) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title'     => 'New Tour Booking',
            'message'   => "{$this->lead->name} has booked a tour for {$this->lead->child_name} on {$this->lead->preferred_date->format('d M Y')} at {$this->lead->preferred_time}.",
            'reference' => $this->lead->reference,
            'lead_id'   => $this->lead->id,
            'url'       => route('admin.crm.leads.show', $this->lead),
            'icon'      => 'calendar-check',
        ];
    }
}
