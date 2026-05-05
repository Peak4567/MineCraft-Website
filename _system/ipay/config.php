<?php
date_default_timezone_set("Asia/Bangkok");

/*===== config เติมเงิน =====*/
$_CONFIG['api']['endpoint'] = 'https://api.ipayverify.com'; //api url ดูได้ที่หน้า ตัวอย่าง api
$_CONFIG['api']['username'] = 'puttipong2934'; //username ที่ใช้ login เว็บ ipayverify
$_CONFIG['api']['password'] = 'Puttipong19227'; //password ที่ใช้ login เว็บ ipayverify
$_CONFIG['api']['key'] = '97102928-88de-0831-2aaa-9ba69ae78c17'; //api key ดูได้ที่หน้า ตัวอย่าง api
$_CONFIG['api']['bank']['account_name'] = 'พุฒิพงศ์ มณีโชติ'; //ชื่อบัญชี
$_CONFIG['api']['bank']['account'] = '1121426656'; //เลขบัญชี ถ้าเป็นพร้อมเพลจะขึ้นเป็น QR Code ให้สเกนได้เลย
$_CONFIG['api']['bank']['bank'] = 'kbank'; //ตัวย่อธนาคารดูได้ด้านล่าง (ถ้าใส่เป็น promptpay จะขึ้นเป็น QR ให้สเกนจ่ายได้เลย แต่ต้องยืนยันสลิปเหมือนเดิม)

// มูลค่าโอนเงินสด
$_CONFIG['scb']['amount'][0] = 1;
$_CONFIG['scb']['amount'][1] = 40;
$_CONFIG['scb']['amount'][2] = 90;
$_CONFIG['scb']['amount'][3] = 150;
$_CONFIG['scb']['amount'][4] = 300;
$_CONFIG['scb']['amount'][5] = 500;
$_CONFIG['scb']['amount'][6] = 1000;
$_CONFIG['scb']['amount'][7] = 3000;
$_CONFIG['scb']['amount'][8] = 5000;
$_CONFIG['scb']['amount'][9] = 10000;

// ข้อมูลแคชที่จะได้รับ
$_CONFIG['scb']['cash'][0] = 1;
$_CONFIG['scb']['cash'][1] = 600;
$_CONFIG['scb']['cash'][2] = 1080;
$_CONFIG['scb']['cash'][3] = 1800;
$_CONFIG['scb']['cash'][4] = 3600;
$_CONFIG['scb']['cash'][5] = 6000;
$_CONFIG['scb']['cash'][6] = 12000;
$_CONFIG['scb']['cash'][7] = 36000;
$_CONFIG['scb']['cash'][8] = 60000;
$_CONFIG['scb']['cash'][9] = 120000;

// ข้อมูลแคชโบนัสที่จะได้รับ
$_CONFIG['scb']['cashbonus'][0] = 1;
$_CONFIG['scb']['cashbonus'][1] = 50;
$_CONFIG['scb']['cashbonus'][2] = 90;
$_CONFIG['scb']['cashbonus'][3] = 150;
$_CONFIG['scb']['cashbonus'][4] = 300;
$_CONFIG['scb']['cashbonus'][5] = 500;
$_CONFIG['scb']['cashbonus'][6] = 1000;
$_CONFIG['scb']['cashbonus'][7] = 3000;
$_CONFIG['scb']['cashbonus'][8] = 5000;
$_CONFIG['scb']['cashbonus'][9] = 10000;

/*====================*/
// lv ที่ได้ตามยอดเงินสะสม
$_CONFIG['scb']['lv'][0] = 1;
$_CONFIG['scb']['lv'][1] = 9999999999;
$_CONFIG['scb']['lv'][2] = 9999999999;
$_CONFIG['scb']['lv'][3] = 9999999999;
$_CONFIG['scb']['lv'][4] = 9999999999;
$_CONFIG['scb']['lv'][5] = 9999999999;
$_CONFIG['scb']['lv'][6] = 9999999999;
$_CONFIG['scb']['lv'][7] = 9999999999;

//ไม่ต้องแก้
$_CONFIG["bank"]['promptpay']="พร้อมเพย์";
$_CONFIG["bank"]['bbl']="กรุงเทพ";
$_CONFIG["bank"]['kbank']="กสิกรไทย";
$_CONFIG["bank"]['ktb']="กรุงไทย";
$_CONFIG["bank"]['ttb']="ทหารไทยธนชาต";
$_CONFIG["bank"]['scb']="ไทยพาณิชย์";
$_CONFIG["bank"]['bay']="กรุงศรีอยุธยา";
$_CONFIG["bank"]['kkp']="เกียรตินาคินภัทร";
$_CONFIG["bank"]['cimb']="ซีไอเอ็มบีไทย";
$_CONFIG["bank"]['tsco']="ทิสโก้";
$_CONFIG["bank"]['uob']="ยูโอบี";
$_CONFIG["bank"]['tcrb']="ไทยเครดิตเพื่อรายย่อย";
$_CONFIG["bank"]['lhb']="แลนด์ แอนด์ เฮ้าส์ ";
$_CONFIG["bank"]['icbc']="ไอซีบีซี (ไทย)";
$_CONFIG["bank"]['baac']="เพื่อการเกษตรและสหกรณ์การเกษตร";
$_CONFIG["bank"]['gsb']="ออมสิน";
$_CONFIG["bank"]['ghb']="อาคารสงเคราะห์ ";
$_CONFIG["bank"]['isbt']="อิสลามแห่งประเทศไทย";
?>