<?php

include_once 'crcstructs.php';

class Crc32 {

    public function ComputeCrc($crcParams, $data) {
        $crc = $crcParams->Init;

        if ($crcParams->RefOut) {
            foreach ($data as $d) {
                $crc = $crcParams->Array[($d ^ $crc) & 0xFF] ^ ($crc >> 8 & 0xFFFFFF);
            }
        } else {
            foreach ($data as $d) {
                $crc = $crcParams->Array[(($crc >> 24) ^ $d) & 0xFF] ^ ($crc << 8);
            }
        }

        $crc = $crc ^ $crcParams->XorOut;

        $result = new CrcResult();
        $result->Crc = $crc;

        return $result;
    }

}

include_once './crc32/CRC_32.php';
include_once './crc32/CRC_32C.php';
include_once './crc32/CRC_32D.php';
include_once './crc32/CRC_32Q.php';
include_once './crc32/CRC_32_BZIP2.php';
include_once './crc32/CRC_32_JAMCRC.php';
include_once './crc32/CRC_32_MPEG_2.php';
include_once './crc32/CRC_32_POSIX.php';
include_once './crc32/CRC_32_XFER.php';


$crcList = array(
    $CRC_32_,
    $CRC_32_BZIP2_,
    $CRC_32C_,
    $CRC_32D_,
    $CRC_32_MPEG_2_,
    $CRC_32_POSIX_,
    $CRC_32Q_,
    $CRC_32_JAMCRC_,
    $CRC_32_XFER_,
);
