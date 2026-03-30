<?php $__env->startComponent('mail::message'); ?>
# New Contact Form Submission

You have received a new message from your website contact form.

**Name:** <?php echo new \Illuminate\Support\EncodedHtmlString($data['fname']); ?> <?php echo new \Illuminate\Support\EncodedHtmlString($data['lname']); ?>


**Email:** <?php echo new \Illuminate\Support\EncodedHtmlString($data['email']); ?>


**Phone:** <?php echo new \Illuminate\Support\EncodedHtmlString($data['phone']); ?>


**Message:**

<?php echo new \Illuminate\Support\EncodedHtmlString($data['message']); ?>


---

This is an automated message from your Peekaboo Daycare website contact form.

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64_3.3.4\www\projects\peekaboo\resources\views/emails/contact-form.blade.php ENDPATH**/ ?>