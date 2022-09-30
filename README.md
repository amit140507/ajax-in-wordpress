# ajax-in-wordpress
Proper Way to use ajax in wordpress

## Step 1

Create A New Page Called **`form.php`**.

```
<?php 
    /* Template Name: payment-template */
    get_header();
?>
<div class="container">
    <div class="payment-page-cooling-text">
    <p>
   Custom Form</p>
</div>
    <div class="payment-inner-section">
    <form method="post" action="" class="field-all-form">
         <div class="email-field">
            <label for="first_name_user">First Name</label>
            <input type="text" name="first_name_user" class="field-name-pay"/>
        </div>
         <div class="email-field">
            <label for="last_name_user">Last Name</label>
            <input type="text" name="last_name_user" class="field-last-pay"/>
        </div>
        <div class="email-field">
            <label for="email_forpay">Email</label>
            <input type="email" name="email_forpay" class="field-email-pay"/>
        </div>
        
        <div class="ammount-field">
            <label for="ammount_forpay">Amount (In USD)</label>
            <input type="text" name="ammount_forpay" class="field-ammount-pay"/>
        </div>
         <div class="email-field">
            <label for="pin_code_forpay">Zip Code</label>
            <input type="text" name="pin_code_forpay" class="field-pin-pay"/>
        </div>
        <div class="email-field">
            <label for="phone_num_forpay">Phone number</label>
            <input type="text" name="phone_num_forpay" class="field-phone-pay"/>
        </div>

        
        <input type="submit" value="Submit" name="btn_forpay" class="btn-submit-pay"/>
            
        <div class="data-output">
            <?php echo $output; ?>
        </div>
        
    </form>
    
</div>
    </div>
    
 
<?php
    get_footer();
?>
```

## Step 2
Put this code inside `<head></head>` in **`header.php`**.

```
<script type="text/javascript">
var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
```
