<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máy Tính Cá Nhân</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    $result = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $expression = $_POST["display"] ?? '';

        // Kiểm tra biểu thức chỉ chứa số và toán tử hợp lệ (+, -, *, /, .)
        if (preg_match('/^[0-9+\-*\.\\/]+$/', $expression)) {
            try {
                eval("\$result = $expression;");
            } catch (Exception $e) {
                $result = "Lỗi";
            }
        } else {
            $result = "Lỗi cú pháp";
        }
    }
    ?>

    <form class="calculator" method="POST">
        <div class="display" id="display"><?php echo htmlspecialchars($result ?: "0"); ?></div>
        <input type="text" name="display" id="input_display" value="" />
        <div class="buttons">
            <div class="button" onclick="clearDisplay()">C</div>
            <div class="button" onclick="deleteDigit()">DEL</div>
            <div class="button" onclick="input('.')">.</div>
            <div class="button operator" style="color: black;" onclick="input('/')">÷</div>
            <div class="button" onclick="input('7')">7</div>
            <div class="button" onclick="input('8')">8</div>
            <div class="button" onclick="input('9')">9</div>
            <div class="button operator" style="color: black;" onclick="input('*')">×</div>
            <div class="button" onclick="input('4')">4</div>
            <div class="button" onclick="input('5')">5</div>
            <div class="button" onclick="input('6')">6</div>
            <div class="button operator" style="color: black;" onclick="input('-')">−</div>
            <div class="button" onclick="input('1')">1</div>
            <div class="button" onclick="input('2')">2</div>
            <div class="button" onclick="input('3')">3</div>
            <div class="button operator" style="color: black;" onclick="input('+')">+</div>
            <div class="button" onclick="input('0')">0</div>
            <input type="submit" class="equal" value="=" />
        </div>
    </form>

    <script src="./script.js"></script>

</body>
</html>
