<?php
$num1 = filter_input(INPUT_GET, 'num1', FILTER_VALIDATE_FLOAT);
$num2 = filter_input(INPUT_GET, 'num2', FILTER_VALIDATE_FLOAT);
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING);

$errors = [];

if ($num1 === null || $num1 === false) {
	$errors[] = 'Invalid or missing first number.';
}
if ($num2 === null || $num2 === false) {
	$errors[] = 'Invalid or missing second number.';
}
if (!in_array($operation, ['add', 'subtract', 'multiply', 'divide'], true)) {
	$errors[] = 'Invalid operation selected.';
}
$result = null;
if (empty($errors)) {
	switch ($operation) {
		case 'add':
			$result = $num1 + $num2;
			$symbol = '+';
			break;
		case 'subtract':
			$result = $num1 - $num2;
			$symbol = '-';
			break;
		case 'multiply':
			$result = $num1 * $num2;
			$symbol = '×';
			break;
		case 'divide':
			if ($num2 == 0.0) {
				$errors[] = 'Cannot divide by zero.';
			} else {
				$result = $num1 / $num2;
				$symbol = '÷';
			}
			break;
	}
}
?>
