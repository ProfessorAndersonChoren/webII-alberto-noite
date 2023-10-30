<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
</head>

<body>
    <form method="post" action="index.php">
        <label for="input_celsius">Celsius:</label>
        <input type="number" id="input_celsius" name="input_celsius">
        <button type="submit">Converter</button>
    </form>
    <?php
    if (!empty($_POST)) {
        $grau_celsius = $_POST["input_celsius"];

        $grau_fahrenheit = $grau_celsius * 1.8 + 32;
        $grau_kelvin = $grau_celsius + 273.15;
        $grau_rankine = $grau_celsius * 1.8 + 491.67;

        print "<p style='font-size:20px;font-weight:bold;'>$grau_celsius °C é $grau_fahrenheit °F</p>";
        print "<p style='font-size:20px;font-weight:bold'>$grau_celsius °C é $grau_kelvin K</p>";
        print "<p style='font-size:20px;font-weight:bold;'>$grau_celsius °C é $grau_rankine °Ra</p>";
    }
    ?>
</body>

</html>