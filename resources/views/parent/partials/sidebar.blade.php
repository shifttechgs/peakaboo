{{-- Parent Portal Sidebar Navigation --}}
<div class="sb-heading">Overview</div>
<a href="{{ route('parent.dashboard') }}" class="sb-link {{ request()->routeIs('parent.dashboard') ? 'active' : '' }}">
    <i class="fas fa-th-large"></i> Dashboard
</a>

<div class="sb-heading">My Family</div>
<a href="{{ route('parent.children') }}" class="sb-link {{ request()->routeIs('parent.children*') ? 'active' : '' }}">
    <i class="fas fa-child"></i> My Children
</a>
<a href="{{ route('parent.documents') }}" class="sb-link {{ request()->routeIs('parent.documents') ? 'active' : '' }}">
    <i class="fas fa-folder-open"></i> Document Vault
</a>

{{-- TODO: add back later --}}
{{--
<a href="{{ route('parent.calendar') }}" class="sb-link {{ request()->routeIs('parent.calendar') ? 'active' : '' }}">
    <i class="fas fa-calendar-alt"></i> Calendar
</a>
<a href="{{ route('parent.newsletters') }}" class="sb-link {{ request()->routeIs('parent.newsletters') ? 'active' : '' }}">
    <i class="fas fa-newspaper"></i> Newsletters
</a>
<a href="{{ route('parent.gallery') }}" class="sb-link {{ request()->routeIs('parent.gallery') ? 'active' : '' }}">
    <i class="fas fa-images"></i> Photo Gallery
</a>
--}}

<div class="sb-heading">Billing</div>
<a href="{{ route('parent.fees') }}" class="sb-link {{ request()->routeIs('parent.fees') ? 'active' : '' }}">
    <i class="fas fa-file-invoice-dollar"></i> Fee Schedule
</a>
<a href="{{ route('parent.fees.statements') }}" class="sb-link {{ request()->routeIs('parent.fees.statements') ? 'active' : '' }}">
    <i class="fas fa-receipt"></i> Statements
</a>

{{-- TODO: add back later --}}
{{--
<div class="sb-heading">My Child</div>
<a href="{{ route('parent.reports') }}" class="sb-link {{ request()->routeIs('parent.reports') ? 'active' : '' }}">
    <i class="fas fa-chart-line"></i> School Reports
</a>
<a href="{{ route('parent.activities') }}" class="sb-link {{ request()->routeIs('parent.activities') ? 'active' : '' }}">
    <i class="fas fa-running"></i> Activities
</a>

<div class="sb-heading">Services</div>
<a href="{{ route('parent.holiday-care') }}" class="sb-link {{ request()->routeIs('parent.holiday-care') ? 'active' : '' }}">
    <i class="fas fa-umbrella-beach"></i> Holiday Care
</a>
<a href="{{ route('parent.extra-murals') }}" class="sb-link {{ request()->routeIs('parent.extra-murals') ? 'active' : '' }}">
    <i class="fas fa-futbol"></i> Extra Murals
</a>
<a href="{{ route('parent.sleepover') }}" class="sb-link {{ request()->routeIs('parent.sleepover*') ? 'active' : '' }}">
    <i class="fas fa-moon"></i> Sleepover
</a>
<a href="{{ route('parent.snack-box') }}" class="sb-link {{ request()->routeIs('parent.snack-box') ? 'active' : '' }}">
    <i class="fas fa-apple-alt"></i> Snack Box
</a>

<div class="sb-heading">Communication</div>
<a href="{{ route('parent.messages') }}" class="sb-link {{ request()->routeIs('parent.messages') ? 'active' : '' }}">
    <i class="fas fa-comments"></i> Messages
</a>
--}}

<div class="sb-heading">Account</div>
<a href="{{ route('parent.profile') }}" class="sb-link {{ request()->routeIs('parent.profile') ? 'active' : '' }}">
    <i class="fas fa-user-cog"></i> Profile
</a>

<div class="sb-divider"></div>
<a href="{{ route('home') }}" class="sb-link" target="_blank">
    <i class="fas fa-external-link-alt"></i> View Website
</a>
