<?php
function style_scripts(){
	wp_enqueue_style( 'inquiry-style', get_stylesheet_uri(), array(), '20190509' );

	wp_deregister_script( 'jquery' );

		wp_register_script( 'jquery', get_template_directory_uri() . '/lib/jquery.js', '20151215', true, '' );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script(
		'bootstrap_js',
		get_template_directory_uri() . '/lib/bootstrap.min.js',
		'20151215',
		true);
	

	/*wp_enqueue_script(
		'jquery_min',
		get_template_directory_uri() . '/lib/jquery.min.js',
		'20151215',
		true
	);*/

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/lib/bootstrap.css', '1.0' );
}
add_action('wp_enqueue_scripts','style_scripts');

/********************** SHORTCODE FOR FORM ************************/
function form(){
	global $wpdb;
	//$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix .'inquiry';
	if( $wpdb->get_var("SHOW TABLES LIKE '".$table_name."'") != $table_name ){
		$sql = "CREATE TABLE {$wpdb->base_prefix}inquiry ( 
			Name varchar(50) NOT NULL,
			Surname varchar(50) NOT NULL,
			email varchar(50) NOT NULL,
			Gender varchar(50) NOT NULL,
			Hobbies varchar(50) NOT NULL )";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}

	echo'
	<form method="post" class="form-group" action="">
		<h3 style="text-align : center; margin-bottom : 10px;">Inquiry Form</h3>
		<b>Name</b></br><input type="text" name="Name" required></br>
		<b>Surname</b></br><input type="text" name="Surname" re0quired></br>
		<b>email</b></br><input type="text" name="email" required></br>
		<b>Gender</b></br><input type="radio" name="gender" value="Male" >Male &nbsp<input type="radio" name="gender" value="Female" >Female </br>
		<b>Hobbies</b></br><input type="checkbox" name="Hobbies[]" value="Cricket">Cricket &nbsp<input type="checkbox" name="Hobbies[]" value="Music" >Music &nbsp<input type="checkbox" name="Hobbies[]" value="Dance" >Dance &nbsp</br>
		<input type="submit" class="btn btn-primary" value="Submit">

	</form>';
	if(!function_exists("run")){
		function run(){
			global $wpdb;
			$table_name = $wpdb->prefix .'inquiry';
			$hobiie = $_POST['Hobbies'];
			$Hobbies = implode(", ", $hobiie);
				$data = array(
				'Name' => $_POST['Name'] ,
				'Surname' => $_POST['Surname'],
				'email' => $_POST['email'],
				'Gender' => $_POST['gender'],
				'Hobbies' => $Hobbies);

				$format = array('%s','%s','%s','%s','%s' );
				$success = $wpdb->insert($table_name, $data,$format);
				if($success){
					echo '
							<div class="col-sm-10 col-sm-offset-2" >
								<div class="alert alert-success">Successfull</div>
							</div>
						 ';
				}

		}
	}
	if(!empty($_POST)){
		run();
	}
	
}
add_shortcode('inquiry_form','form');