<?php
$x = "welcome to Ha Noi";
// Câu 1
echo "Số ký tự là: " , strlen($x);
// câu 2
echo "Số từ là: ", str_word_count($x);
// Câu 3
echo "$x sau khi đảo ngược là: ", strrev($x);
// Câu 4
echo "Vị trí từ to là: ", strpos($x, "to");
// Câu 5
echo "Thay thế chuỗi 'welcome to Quy Nhon': ", str_replace("Ha Noi", "Phu Yen", $x);
// Câu 6
function startsWith($x, $prefix) {
    return strncmp($x, $prefix, strlen($prefix)) === 0;
}
echo startsWith($x, "welcome") ? "Có" : "Không";
// Câu 7
echo "Chuyển thành chữ in hoa: ", strtoupper($x);
// Câu 8
echo "Chuyển thành chữ thường: ", strtolower($x);
// Câu 9
echo "Chuyển đổi chuỗi có chữ đầu tiên in hoa: ", ucwords($x);
// Câu 10
echo "Chuỗi khi xóa khoảng trắng: ", trim("    hello world  .h   "); 
// Câu 11
echo "Loại bỏ kí tự đầu tiên: ", ltrim($x, "welcome");
// Câu 12
echo "Loại bỏ kí tự cuối cùng: ", rtrim($x, "Nhon");
// Câu 13
$string = "PHP;MySQL;HTML;CSS;JavaScript";
$delimiter = ";";
$array = explode($delimiter, $string);
print_r($array);
// Câu 14
$array = array("PHP", "MySQL", "HTML", "CSS", "JavaScript");
$delimiter = ", ";
$string = implode($delimiter, $array);
echo "Nối chuỗi: ", $string;
// Câu 15
$y= "Hello ";
$Length = 40;
$z = str_pad($x, $Length, $y, STR_PAD_LEFT);
echo "Chuỗi sau khi thêm: ", $z;
// Câu 16
$y="hihi";
function endsWith($x, $y) {
    return substr($x, -strlen($y)) === $y;
}
if (endsWith($x, $y)) {
    echo "Chuỗi '$x' kết thúc bằng '$y'.";
} else {
    echo "Chuỗi '$x' không kết thúc bằng '$y'.";
}
// Câu 17
$z="Quy";
function contains($x, $z) {
    return strstr($x, $z) !== false;
}
if (contains($x, $z)) {
    echo "Chuỗi '$x' chứa '$z'.";
} else {
    echo "Chuỗi '$x' không chứa '$z'.";
}
// Câu 18
function replaceNonAlphanumeric($string, $replacement = '-') {
    return preg_replace('/[^a-zA-Z0-9]/', $replacement, $string);
}
$input = "Hello, World! 2024.";
$output = replaceNonAlphanumeric($input);
echo $output;
// Câu 19
function isIntegerString($string) {
    $number = intval($string);
    return $number == $string && is_int($number);
}
$input = "1234";
if (isIntegerString($input)) {
    echo "Chuỗi '$input' là một số nguyên.";
} else {
    echo "Chuỗi '$input' không phải là một số nguyên.";
}
// Câu 20
$email = "thuong@gmail.com";
 if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo("$email là địa chỉ email hơp lệ");
 } else {
  echo("$email không là địa chỉ email hơp lệ");
 }
?>