<?php

include_once 'crcstructs.php';

class Crc16 {

    public function ComputeCrc($crcParams, $data) {
        if ($crcParams->RefIn) {
            $crc = $crcParams->InvertedInit;
        } else {
            $crc = $crcParams->Init;
        }
        if ($crcParams->RefOut) {
            foreach ($data as $d) {
                $crc = $crcParams->Array[($d ^ $crc) & 0xFF] ^ ($crc >> 8 & 0xFF);
            }
        } else {
            foreach ($data as $d) {
                $crc = $crcParams->Array[(($crc >> 8) ^ $d) & 0xFF] ^ ($crc << 8);
            }
        }

        $crc = $crc ^ $crcParams->XorOut;

        $result = new CrcResult();
        $result->Crc = $crc & 0xFFFF;

        return $result;
    }

}

include_once './crc16/crc_16_ccitt_false.php';
include_once './crc16/crc_16_arc.php';
include_once './crc16/crc_16_aug_ccitt.php';
include_once './crc16/crc_16_buypass.php';
include_once './crc16/crc_16_cdma2000.php';
include_once './crc16/crc_16_dds_110.php';
include_once './crc16/crc_16_dect_r.php';
include_once './crc16/crc_16_dect_x.php';
include_once './crc16/crc_16_dnp.php';
include_once './crc16/crc_16_en_13757.php';
include_once './crc16/crc_16_genibus.php';
include_once './crc16/crc_16_maxim.php';
include_once './crc16/crc_16_mcrf4xx.php';
include_once './crc16/crc_16_riello.php';
include_once './crc16/crc_16_t10_dif.php';
include_once './crc16/crc_16_teledisk.php';
include_once './crc16/crc_16_tms37157.php';
include_once './crc16/crc_16_usb.php';
include_once './crc16/crc_a.php';
include_once './crc16/crc_16_kermit.php';
include_once './crc16/crc_16_modbus.php';
include_once './crc16/crc_16_x_25.php';
include_once './crc16/crc_16_xmodem.php';


$crcList = array(
    $CRC_16_CCITT_FALSE_,
    $CRC_16_ARC_,
    $CRC_16_AUG_CCITT_,
    $CRC_16_BUYPASS_,
    $CRC_16_CDMA2000_,
    $CRC_16_DDS_110_,
    $CRC_16_DECT_R_,
    $CRC_16_DECT_X_,
    $CRC_16_DNP_,
    $CRC_16_EN_13757_,
    $CRC_16_GENIBUS_,
    $CRC_16_MAXIM_,
    $CRC_16_MCRF4XX_,
    $CRC_16_RIELLO_,
    $CRC_16_T10_DIF_,
    $CRC_16_TELEDISK_,
    $CRC_16_TMS37157_,
    $CRC_16_USB_,
    $CRC_A_,
    $CRC_16_KERMIT_,
    $CRC_16_MODBUS_,
    $CRC_16_X_25_,
    $CRC_16_XMODEM_,
);
