{{-- Parent Portal Sidebar Navigation (shared partial) --}}
<a href="{{ route('parent.dashboard') }}" class="nav-link {{ request()->routeIs('parent.dashboard') ? 'active' : '' }}">
    <i class="fas fa-home"></i> Dashboard
</a>
<a href="{{ route('parent.children') }}" class="nav-link {{ request()->routeIs('parent.children') && !request()->routeIs('parent.children.show') ? 'active' : '' }}">
    <i class="fas fa-child"></i> My Children
</a>
<a href="{{ route('parent.calendar') }}" class="nav-link {{ request()->routeIs('parent.calendar') ? 'active' : '' }}">
    <i class="fas fa-calendar-alt"></i> Calendar
</a>
<a href="{{ route('parent.newsletters') }}" class="nav-link {{ request()->routeIs('parent.newsletters') ? 'active' : '' }}">
    <i class="fas fa-newspaper"></i> Newsletters
</a>
<a href="{{ route('parent.gallery') }}" class="nav-link {{ request()->routeIs('parent.gallery') ? 'active' : '' }}">
    <i class="fas fa-images"></i> Photo Gallery
</a>

<div class="nav-section-title">Billing</div>
<a href="{{ route('parent.fees') }}" class="nav-link {{ request()->routeIs('parent.fees') ? 'active' : '' }}">
    <i class="fas fa-file-invoice-dollar"></i> Fee Schedule
</a>
<a href="{{ route('parent.fees.statements') }}" class="nav-link {{ request()->routeIs('parent.fees.statements') ? 'active' : '' }}">
    <i class="fas fa-receipt"></i> Statements
</a>

<div class="nav-section-title">My Child</div>
<a href="{{ route('parent.documents') }}" class="nav-link {{ request()->routeIs('parent.documents') ? 'active' : '' }}">
    <i class="fas fa-folder-open"></i> Document Vault
</a>
<a href="{{ route('parent.reports') }}" class="nav-link {{ request()->routeIs('parent.reports') ? 'active' : '' }}">
    <i class="fas fa-chart-line"></i> School Reports
</a>
<a href="{{ route('parent.activities') }}" class="nav-link {{ request()->routeIs('parent.activities') ? 'active' : '' }}">
    <i class="fas fa-running"></i> Activities
</a>

<div class="nav-section-title">Services</div>
<a href="{{ route('parent.holiday-care') }}" class="nav-link {{ request()->routeIs('parent.holiday-care') ? 'active' : '' }}">
    <i class="fas fa-umbrella-beach"></i> Holiday Care
</a>
<a href="{{ route('parent.extra-murals') }}" class="nav-link {{ request()->routeIs('parent.extra-murals') ? 'active' : '' }}">
    <i class="fas fa-futbol"></i> Extra Murals
</a>
<a href="{{ route('parent.sleepover') }}" class="nav-link {{ request()->routeIs('parent.sleepover*') ? 'active' : '' }}">
    <i class="fas fa-moon"></i> Sleepover
</a>
<a href="{{ route('parent.snack-box') }}" class="nav-link {{ request()->routeIs('parent.snack-box') ? 'active' : '' }}">
    <i class="fas fa-apple-alt"></i> Snack Box
</a>

<div class="nav-section-title">Communication</div>
<a href="{{ route('parent.messages') }}" class="nav-link {{ request()->routeIs('parent.messages') ? 'active' : '' }}">
    <i class="fas fa-comments"></i> Messages
</a>

<div class="nav-section-title">Account</div>
<a href="{{ route('parent.profile') }}" class="nav-link {{ request()->routeIs('parent.profile') ? 'active' : '' }}">
    <i class="fas fa-user-cog"></i> Profile
</a>


