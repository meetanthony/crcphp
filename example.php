<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRC Example</title>
</head>
<body>
    <?php
    include "crc8.php";

    // init
    $crc8 = new Crc8();
    $algoParams = $CRC_8_;
    $algoName = $algoParams->Name;
    print "Name: ".$algoName."<br/>";
    $check = $algoParams->Check;
    print "Check:  0x".dechex($check)."<br/>";

    // for string
    $byteArray = unpack('C*', '123456789');
    $result = $crc8->ComputeCrc($algoParams, $byteArray);
    print "Text Result: 0x".dechex($result->Crc)."<br/>";

    // for file
    $filename = "./test.dat";
    $contents = file_get_contents($filename);
    $byteArray = unpack("C*", $contents);
    $result = $crc8->ComputeCrc($algoParams, $byteArray);
    print "File Result: 0x".dechex($result->Crc)."<br/>";
    print "File data (HEX): <br/>";

    for ($i = 1; $i < count($byteArray); $i++) {
        print "0x".substr("00".dechex($byteArray[$i]), -2);
        if ($i > 0) {
            if (($i + 1) % 16 == 0) {
                print "<br>";
                continue;
            }
            if (($i + 1) % 8 == 0) {
                print "&nbsp;&nbsp;";
                continue;
            }
        }

        print "&nbsp;";
    }
    ?>
</body>
</html>