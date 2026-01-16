@extends('layouts.portal')

@section('title', 'Messages')
@section('portal-name', 'Parent Portal')
@section('page-title', 'Messages')

@section('sidebar-nav')
<a href="{{ route('parent.dashboard') }}" class="nav-link">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('parent.children') }}" class="nav-link">
    <i class="fas fa-child"></i> My Children
</a>
<a href="{{ route('parent.calendar') }}" class="nav-link">
    <i class="fas fa-calendar-alt"></i> Calendar
</a>
<a href="{{ route('parent.newsletters') }}" class="nav-link">
    <i class="fas fa-newspaper"></i> Newsletters
</a>
<a href="{{ route('parent.gallery') }}" class="nav-link">
    <i class="fas fa-images"></i> Photo Gallery
</a>

<div class="nav-section-title">Billing</div>
<a href="{{ route('parent.fees') }}" class="nav-link">
    <i class="fas fa-file-invoice-dollar"></i> Fee Schedule
</a>
<a href="{{ route('parent.statements') }}" class="nav-link">
    <i class="fas fa-receipt"></i> Statements
</a>

<div class="nav-section-title">Services</div>
<a href="{{ route('parent.holiday-care') }}" class="nav-link">
    <i class="fas fa-umbrella-beach"></i> Holiday Care
</a>
<a href="{{ route('parent.extra-murals') }}" class="nav-link">
    <i class="fas fa-futbol"></i> Extra Murals
</a>
<a href="{{ route('parent.snack-box') }}" class="nav-link">
    <i class="fas fa-apple-alt"></i> Snack Box
</a>

<div class="nav-section-title">Communication</div>
<a href="{{ route('parent.messages') }}" class="nav-link active">
    <i class="fas fa-comments"></i> Messages
    <span class="badge bg-danger ms-auto">2</span>
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('parent.profile') }}" class="nav-link">
    <i class="fas fa-user-cog"></i> Profile
</a>
@endsection

@section('content')
<div class="row g-4">
    <div class="col-lg-4">
        <div class="portal-card h-100">
            <div class="portal-card-header d-flex justify-content-between align-items-center">
                <span>Conversations</span>
                <button class="btn btn-sm btn-portal btn-portal-primary" data-bs-toggle="modal" data-bs-target="#newMessageModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="portal-card-body p-0">
                @php
                    $conversations = [
                        ['teacher' => 'Sarah van der Merwe', 'class' => 'Preschool', 'last_message' => 'Emma had a wonderful day painting...', 'time' => '2 hours ago', 'unread' => 2, 'avatar' => 1],
                        ['teacher' => 'Thandi Nkosi', 'class' => 'Toddlers', 'last_message' => 'Just a reminder about tomorrow\'s outing', 'time' => 'Yesterday', 'unread' => 0, 'avatar' => 2],
                        ['teacher' => 'Admin Office', 'class' => 'General', 'last_message' => 'Your January statement is ready', 'time' => '3 days ago', 'unread' => 0, 'avatar' => 3],
                    ];
                @endphp
                @foreach($conversations as $conv)
                <div class="p-3 border-bottom conversation-item {{ $loop->first ? 'active' : '' }}" style="cursor: pointer;">
                    <div class="d-flex gap-3">
                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; flex-shrink: 0;">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h6 class="mb-0 fw-semibold">{{ $conv['teacher'] }}</h6>
                                @if($conv['unread'] > 0)
                                <span class="badge bg-danger rounded-pill">{{ $conv['unread'] }}</span>
                                @endif
                            </div>
                            <small class="text-muted d-block mb-1">{{ $conv['class'] }}</small>
                            <p class="small text-muted mb-0 text-truncate">{{ $conv['last_message'] }}</p>
                            <small class="text-muted">{{ $conv['time'] }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="portal-card h-100 d-flex flex-column">
            <div class="portal-card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                        <i class="fas fa-user text-primary"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-semibold">Sarah van der Merwe</h6>
                        <small class="text-muted">Preschool Teacher</small>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-archive me-2"></i> Archive</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-bell-slash me-2"></i> Mute</a></li>
                    </ul>
                </div>
            </div>

            <div class="portal-card-body flex-grow-1" style="max-height: 500px; overflow-y: auto;">
                @php
                    $messages = [
                        ['sender' => 'teacher', 'text' => 'Good morning! Just wanted to let you know that Emma had a fantastic day today. She participated beautifully in our art class and made a lovely painting.', 'time' => '2 hours ago'],
                        ['sender' => 'teacher', 'text' => 'I\'ve attached a photo of her artwork. She was very proud of it!', 'time' => '2 hours ago', 'image' => true],
                        ['sender' => 'parent', 'text' => 'Thank you so much Sarah! We\'re so happy to hear this. Can\'t wait to see the painting.', 'time' => '1 hour ago'],
                        ['sender' => 'parent', 'text' => 'Quick question - what time is the parent meeting next week?', 'time' => '1 hour ago'],
                        ['sender' => 'teacher', 'text' => 'The parent meeting is scheduled for Wednesday at 4pm. Looking forward to seeing you there!', 'time' => '30 mins ago'],
                    ];
                @endphp
                @foreach($messages as $msg)
                <div class="mb-3 d-flex {{ $msg['sender'] == 'parent' ? 'justify-content-end' : 'justify-content-start' }}">
                    <div style="max-width: 70%;">
                        <div class="p-3 rounded-3 {{ $msg['sender'] == 'parent' ? 'bg-primary text-white' : 'bg-light' }}">
                            {{ $msg['text'] }}
                            @if(isset($msg['image']))
                            <div class="mt-2">
                                <img src="{{ asset('assets/img/testimonial/testi-1-1.jpg') }}" alt="Artwork" class="rounded" style="max-width: 200px;">
                            </div>
                            @endif
                        </div>
                        <small class="text-muted d-block mt-1 {{ $msg['sender'] == 'parent' ? 'text-end' : '' }}">{{ $msg['time'] }}</small>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="border-top p-3">
                <form>
                    <div class="input-group">
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fas fa-paperclip"></i>
                        </button>
                        <input type="text" class="form-control" placeholder="Type your message..." style="border-left: 0; border-right: 0;">
                        <button type="submit" class="btn btn-portal btn-portal-primary">
                            <i class="fas fa-paper-plane"></i> Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- New Message Modal -->
<div class="modal fade" id="newMessageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">New Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">To</label>
                        <select class="form-select">
                            <option value="">Select recipient...</option>
                            <option>Sarah van der Merwe (Preschool)</option>
                            <option>Thandi Nkosi (Toddlers)</option>
                            <option>Admin Office</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Subject</label>
                        <input type="text" class="form-control" placeholder="What's this about?">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea class="form-control" rows="5" placeholder="Type your message here..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-portal btn-portal-primary">
                    <i class="fas fa-paper-plane me-2"></i> Send Message
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .conversation-item:hover {
        background: #f8f9fa;
    }
    .conversation-item.active {
        background: #e7f3ff;
        border-left: 3px solid var(--primary);
    }
</style>
@endpush
