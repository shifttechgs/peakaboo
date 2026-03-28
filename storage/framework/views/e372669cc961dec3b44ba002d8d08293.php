
<div class="sb-heading">Overview</div>
<a href="<?php echo e(route('parent.dashboard')); ?>" class="sb-link <?php echo e(request()->routeIs('parent.dashboard') ? 'active' : ''); ?>">
    <i class="fas fa-th-large"></i> Dashboard
</a>

<div class="sb-heading">My Family</div>
<a href="<?php echo e(route('parent.children')); ?>" class="sb-link <?php echo e(request()->routeIs('parent.children*') ? 'active' : ''); ?>">
    <i class="fas fa-child"></i> My Children
</a>
<a href="<?php echo e(route('parent.documents')); ?>" class="sb-link <?php echo e(request()->routeIs('parent.documents') ? 'active' : ''); ?>">
    <i class="fas fa-folder-open"></i> Document Vault
</a>




<div class="sb-heading">Billing</div>
<a href="<?php echo e(route('parent.fees')); ?>" class="sb-link <?php echo e(request()->routeIs('parent.fees') ? 'active' : ''); ?>">
    <i class="fas fa-file-invoice-dollar"></i> Fee Schedule
</a>
<a href="<?php echo e(route('parent.fees.statements')); ?>" class="sb-link <?php echo e(request()->routeIs('parent.fees.statements') ? 'active' : ''); ?>">
    <i class="fas fa-receipt"></i> Statements
</a>




<div class="sb-heading">Account</div>
<a href="<?php echo e(route('parent.profile')); ?>" class="sb-link <?php echo e(request()->routeIs('parent.profile') ? 'active' : ''); ?>">
    <i class="fas fa-user-cog"></i> Profile
</a>

<div class="sb-divider"></div>
<a href="<?php echo e(route('home')); ?>" class="sb-link" target="_blank">
    <i class="fas fa-external-link-alt"></i> View Website
</a>
<?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/parent/partials/sidebar.blade.php ENDPATH**/ ?>