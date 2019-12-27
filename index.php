<?php
/**
 * This is index of the page
 *
 * @package Inquiry Form
 */

?>
<?php get_header(); ?>

<body>
	<div class="container">
		<!--<form method="post" action="">
			<b>Name</b></br><input type="text" name="Name" required></br>
			<b>Surname</b></br><input type="text" name="Surname" required></br>
			<b>email</b></br><input type="text" name="email" required></br>
			<b>Gender</b></br><input type="radio" name="gender" value="Male" >Male &nbsp<input type="radio" name="gender" value="Female" >Female </br>
			<b>Hobbies</b></br><input type="checkbox" name="Hobbies" >Cricket &nbsp<input type="checkbox" name="Hobbies" >Music &nbsp<input type="checkbox" name="Hobbies" >Dance &nbsp</br>
			<b></b><input type="submit" class="primary-button" value="Submit">

		</form> -->
		<?php do_shortcode("[inquiry_form]"); ?>
	</div>
</body>