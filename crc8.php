<?php
include_once 'crcstructs.php';
class Crc8 {

    public function ComputeCrc($crcParams, $data) {
        $crc = $crcParams->Init;

        foreach ($data as $d) {
            $crc = $crcParams->Array[$d ^ $crc];
        }

        $crc = $crc ^ $crcParams->XorOut;

        $result = new CrcResult();
        $result->Crc = $crc & 0xFF;

        return $result;
    }
}

include_once './crc8/crc_8.php';
include_once './crc8/crc_8_cdma2000.php';
include_once './crc8/crc_8_darc.php';
include_once './crc8/crc_8_dvb_s2.php';
include_once './crc8/crc_8_ebu.php';
include_once './crc8/crc_8_i_code.php';
include_once './crc8/crc_8_itu.php';
include_once './crc8/crc_8_maxim.php';
include_once './crc8/crc_8_rohc.php';
include_once './crc8/crc_8_wcdma.php';


$crcList = array(
    $CRC_8_,
    $CRC_8_CDMA2000_,
    $CRC_8_DARC_,
    $CRC_8_DVB_S2_,
    $CRC_8_EBU_,
    $CRC_8_I_CODE_,
    $CRC_8_ITU_,
    $CRC_8_MAXIM_,
    $CRC_8_ROHC_,
    $CRC_8_WCDMA_,
);