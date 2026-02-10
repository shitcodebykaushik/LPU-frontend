<?php
$products = [
    'product_a' => ['name' => 'Product A', 'price' => 100],
    'product_b' => ['name' => 'Product B', 'price' => 150],
    'product_c' => ['name' => 'Product C', 'price' => 200],
];

$submitted   = $_SERVER['REQUEST_METHOD'] === 'POST';
$errors      = [];
$quantities  = [];
$lineTotals  = [];
$grandTotal  = 0;

if ($submitted) {
    foreach ($products as $key => $product) {
        $fieldName = 'qty_' . $key;
        $raw       = trim((string)($_POST[$fieldName] ?? '0'));

        if ($raw === '') {
            $raw = '0';
        }

        if (!is_numeric($raw) || (int)$raw < 0) {
            $errors[] = $product['name'] . ' quantity must be a valid non-negative number.';
            $qty = 0;
        } else {
            $qty = (int)$raw;
        }

        $quantities[$key] = $qty;
        $lineTotals[$key] = $qty * $product['price'];
        $grandTotal      += $lineTotals[$key];
    }
} else {
    foreach ($products as $key => $product) {
        $quantities[$key] = 0;
        $lineTotals[$key] = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cart</title>
</head>
<body>
    <h1>Product Cart</h1>

    <form method="post" action="">
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Product</th>
                <th>Price (₹)</th>
                <th>Quantity</th>
            </tr>
            <?php foreach ($products as $key => $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <input
                            type="number"
                            name="<?php echo 'qty_' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>"
                            min="0"
                            value="<?php echo htmlspecialchars((string)($quantities[$key] ?? 0), ENT_QUOTES, 'UTF-8'); ?>"
                        >
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <button type="submit">Calculate Bill</button>
        <button type="reset">Reset</button>
    </form>

    <?php if ($submitted): ?>
        <?php if (!empty($errors)): ?>
            <h3>Errors</h3>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h3>Bill Details</h3>
            <table border="1" cellpadding="8" cellspacing="0">
                <tr>
                    <th>Product</th>
                    <th>Price (₹)</th>
                    <th>Quantity</th>
                    <th>Total (₹)</th>
                </tr>
                <?php foreach ($products as $key => $product): ?>
                    <?php if (($quantities[$key] ?? 0) > 0): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars((string)$quantities[$key], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars((string)$lineTotals[$key], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                <tr>
                    <th colspan="3" style="text-align:right;">Grand Total (₹):</th>
                    <th><?php echo htmlspecialchars((string)$grandTotal, ENT_QUOTES, 'UTF-8'); ?></th>
                </tr>
            </table>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
