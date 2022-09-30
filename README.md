# ajax-in-wordpress
Proper Way to use ajax in wordpress

## Step 1 
Put this code inside `<head></head>` in __header.php __.

```
<script type="text/javascript">
var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
```
