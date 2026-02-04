<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Get values from the submitted form
	$name  = isset($_POST["name"]) ? trim($_POST["name"]) : "";
	$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";

	// Basic validation
	if ($name === "" || $email === "") {
		$error = "Please fill in both Name and Email.";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = "Please enter a valid email address.";
	}
} else {
	$error = "Invalid request method. Please submit the form from Form.html.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Submission Result</title>
</head>
<body>
	<h1>Form Submission Result</h1>

	<?php if (isset($error)) : ?>
		<p style="color: red; font-weight: bold;">
			<?php echo htmlspecialchars($error); ?>
		</p>
		<p><a href="Form.html">Go back to the form</a></p>
	<?php else : ?>
		<p>Thank you for submitting your details.</p>
		<p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
		<p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
		<p><a href="Form.html">Submit another response</a></p>
	<?php endif; ?>
</body>

</html>
