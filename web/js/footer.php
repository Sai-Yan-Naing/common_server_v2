<script>
$(document).ready(function(){
    $('.message_box').stop().fadeIn(400).delay(3000).fadeOut(1600); //fade out after 3 seconds
    <?php $_SESSION['error']=false;$_SESSION['message']=null; ?>
});
</script>