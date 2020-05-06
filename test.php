<html>

<form action="" method="post">
    <input type="checkbox" name="number[]" value="three".<?php echo (in_array("three",$_POST['number']))? "checked": "";?> >three<br />
<input type="submit" name="Submit" value="Preview" />
</form>

</html>

