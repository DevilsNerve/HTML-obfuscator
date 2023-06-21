<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];

    $erp = [];
    for ($i = 0; $i < strlen($text); $i += 4) {
        $tmp = 0;
        for ($j = 0; $j < 4; $j++) {
            if ($i + $j < strlen($text)) {
                $tmp += ord($text[$i + $j]) * pow(256, 3 - $j);
            }
        }
        $erp[] = $tmp;
    }

    $output = 'var erp = new Array;' . PHP_EOL;
    for ($i = 0; $i < count($erp); $i++) {
        $output .= 'erp[' . $i . '] = ' . $erp[$i] . ';' . PHP_EOL;
    }
    $output .= "var em = '';" . PHP_EOL;
    $output .= "for (i = 0; i < erp.length; i++) {" . PHP_EOL;
    $output .= "    tmp = erp[i];" . PHP_EOL;
    $output .= "    if (Math.floor((tmp / Math.pow(256, 3))) > 0) {" . PHP_EOL;
    $output .= "        em += String.fromCharCode(Math.floor((tmp / Math.pow(256, 3))))" . PHP_EOL;
    $output .= "    };" . PHP_EOL;
    $output .= "    tmp = tmp - (Math.floor((tmp / Math.pow(256, 3))) * Math.pow(256, 3));" . PHP_EOL;
    $output .= "    if (Math.floor((tmp / Math.pow(256, 2))) > 0) {" . PHP_EOL;
    $output .= "        em += String.fromCharCode(Math.floor((tmp / Math.pow(256, 2))))" . PHP_EOL;
    $output .= "    };" . PHP_EOL;
    $output .= "    tmp = tmp - (Math.floor((tmp / Math.pow(256, 2))) * Math.pow(256, 2));" . PHP_EOL;
    $output .= "    if (Math.floor((tmp / Math.pow(256, 1))) > 0) {" . PHP_EOL;
    $output .= "        em += String.fromCharCode(Math.floor((tmp / Math.pow(256, 1))))" . PHP_EOL;
    $output .= "    };" . PHP_EOL;
    $output .= "    tmp = tmp - (Math.floor((tmp / Math.pow(256, 1))) * Math.pow(256, 1));" . PHP_EOL;
    $output .= "    if (Math.floor((tmp / Math.pow(256, 0))) > 0) {" . PHP_EOL;
    $output .= "        em += String.fromCharCode(Math.floor((tmp / Math.pow(256, 0))))" . PHP_EOL;
    $output .= "    };" . PHP_EOL;
    $output .= "}" . PHP_EOL;
    $output .= "document.write(em);" . PHP_EOL;

    $randomNumber = mt_rand(100000, 999999);
    $filename = "ajg" . $randomNumber . ".js";

    // Set appropriate headers for file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . strlen($output));

    // Output the generated JavaScript file
    echo $output;
    exit;
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Text Obfuscator</title>
        <!-- Include Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <h1>Text Obfuscator</h1>
        <div class="container">
            <form id="textForm" method="POST">
                <div class="mb-3">
                    <textarea class="form-control" name="text" rows="10" cols="50"
                        placeholder="Enter your text here"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Obfuscate Text</button>
            </form>
        </div>

        <!-- Include Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
