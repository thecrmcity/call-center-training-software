
<div class="loader" id="loader"></div>
<footer>
	<div class="ft-bar">
		<p>Silaris Information Pvt Ltd. &copy; 2021 | All Rights Reserved <a href="policy.php">(ISMS Policy)</a></p>
	</div>
</footer>
<script type="text/javascript">
$(document).ready(function(){
	$('#mview').click(function()
	{
		$('.side-menu').show();
		
	});
	$('#closebtn').click(function(){
		$('.side-menu').hide();
	});

});
$(window).on('load',function(){
	$('#loader').fadeOut(1000);
});

</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();

 
});
</script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.js"></script>
</body>
</html>