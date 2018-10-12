<div id="footer">Not actually Copyright <?php echo date("Y"); ?>, Alexander Vaughan</div>
</body>
</html>
<?php
if(isset($connection)){
    // 5. Close database connection
    mysqli_close($connection);
}
?>