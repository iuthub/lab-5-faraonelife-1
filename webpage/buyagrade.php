<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Buy Your Way to a Better Education!</title>
	<link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php if($_SERVER["REQUEST_METHOD"]=="GET") { ?>

<h1>Buy Your Way to a Better Education!</h1>

<p>The rough economy, along with recent changes in University of Washington policy, now allow us to offer grades for money.  That's right!  All you need to get a 4.0 in this course is cold, hard, cash.</p>

<hr />

<h2>Give Us Your Money</h2>

<form method="post">

	<dl>
		<dt>Name</dt>
		<dd>
			<input type="text" name="Your_name">
		</dd>

		<dt>Section</dt>
		<dd>
			<select name="Degree_section">
				<optgroup label="Select a selection">
					<?php
					        		for($char_for_section=65; $char_for_section<73; $char_for_section++){ ?>
				      	<option value="<?= "M".chr($char_for_section) ?>"><?= "M".chr($char_for_section) ?>
                    </option>
					<?php } ?> </optgroup>
			</select>

		</dd>

		<dt>Credit Card</dt>
		<dd>
			<input type="text" name="Card_Number"/>
		</dd>
		<fieldset>
			<input type="radio" name="Card_type" value="Visa" /> Visa
			<input type="radio" name="Card_type" value="Mastercard" checked="checked"/>  MasterCard
		</fieldset>
		</dd>
	</dl>

	<input type="submit" value="I am a giant sucker.">
</form>

<?php
		}



		else{
		if(($_REQUEST["Your_name"] == "") || ($_REQUEST["Degree_section"] == "")|| ($_REQUEST["Card_type"] == "")||($_REQUEST["Card_Number"] == "")) { ?>
<h1>Sorry</h1>
<p>You didn't fill out the form completely. <a href="buyagrade.php"> Try again?</a></p>

<?php
			}






		else{
			$Yr_Name = $_REQUEST["Your_name"];
			$Degree_sec = $_REQUEST["Degree_section"];
			$Card_type_info = $_REQUEST["Card_type"];
			$Card_number = $_REQUEST["Card_Number"];

			$Allinformation = $Yr_Name.";".$Degree_sec.";".$Card_number.";".$Card_type_info;
			file_put_contents("suckers.txt", "\r\n".$Allinformation,FILE_APPEND);
			?>

<div>
	<h1>Thanks, sucker!</h1>
</div>
<p>Your information has been recorded</p>

<dl>
	<dt>Name</dt>
	<dd><?= $Yr_Name ?></dd>
	<dt>Section</dt>
	<dd><?= $Degree_sec ?></dd>
	<dt>Credit Card</dt>
	<dd><?= $Card_number."(".$Card_type_info.")" ?></dd>
</dl>
<p>Here all the suckers who have submitted here:</p>
<pre><?= file_get_contents("suckers.txt") ?></pre>

<?php }?>









		<?php } ?>
</body>
</html>