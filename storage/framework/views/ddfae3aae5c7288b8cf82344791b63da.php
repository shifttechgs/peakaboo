<tr>
<td class="header">
<a href="<?php echo new \Illuminate\Support\EncodedHtmlString($url); ?>" style="display: inline-block;">
<?php if(trim($slot) === 'Laravel'): ?>
<img src="<?php echo new \Illuminate\Support\EncodedHtmlString(asset('assets/img/peekaboo/peekaboo_logo.png')); ?>" class="logo" alt="Peekaboo Daycare">
<?php else: ?>
<?php echo new \Illuminate\Support\EncodedHtmlString($slot); ?>

<?php endif; ?>
</a>
</td>
</tr>
<?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/vendor/mail/html/header.blade.php ENDPATH**/ ?>