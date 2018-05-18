<?php
 if(isset($_POST["upload"])){
   updateAPK($id);
}
?>

<form method="POST" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="application">Select APK :</label>
		<input type="file" name="application" id="application" class="form-control" required/>
		<div align="center">
			<button type="submit" name="upload" value="upload" class="btn btn-default">upload</button>
		</div>
	</div>
</form>
<script type="text/javascript" src="updateAPK.js"></script>


