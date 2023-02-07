<?php 
    /* Template Name: Form Template */
    get_header();
?>
<div class="container">
    <div class="title-div">
        <p>Custom Form</p>
    </div>
    <div class="inner-section">
        <form method="post" action="" class="form-class" id="form-id">
            <div class="first-name-field">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="first-name-class"/>
            </div>
            <div class="last-name-field">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="last-name-class"/>
            </div>
            <div class="email-field">
                <label for="email">Email</label>
                <input type="email" name="email" class="email-class"/>
            </div>
            <div class="amount-field">
                <label for="amount">Amount (In USD)</label>
                <input type="text" name="amount" class="amount-class"/>
            </div>
            <div class="zipcode-field">
                <label for="zipcode">Zip Code</label>
                <input type="text" name="zipcode" class="zipcode-class"/>
            </div>
            <div class="phone-number-field">
                <label for="phone_number">Phone number</label>
                <input type="text" name="phone_number" class="phone-number-class"/>
            </div>
            <input type="submit" value="Submit" name="button_submit" class="submit-class"/>
        </form>
    </div>
</div>
    
 
<?php
    get_footer();
?>
