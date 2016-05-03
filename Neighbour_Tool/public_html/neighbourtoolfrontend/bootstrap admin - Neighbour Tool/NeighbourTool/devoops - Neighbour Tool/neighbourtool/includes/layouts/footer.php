    <div id="footer">Copyright <?php echo date("Y"); ?>, Patrick Urlich</div>

	</body>
</html>
<?php
  // 5. Close database connection
	if (isset($conn)) {
	  mysqli_close($conn);
	}
?>
