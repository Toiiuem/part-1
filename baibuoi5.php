// Câu 14 
<?php
$dsn = 'mysql:host=localhost;dbname=testdb;charset=utf8';
$username = 'root';
$password = '';

// Tạo kết nối PDO
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Kết nối thành công!";
} catch (PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
}
?>
<?php
// Giả sử đã có kết nối PDO như ở trên

// Dữ liệu cần thêm
$name = 'John Doe';
$email = 'john@example.com';

// Câu lệnh SQL để thêm dữ liệu
$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";

// Chuẩn bị câu lệnh
$stmt = $pdo->prepare($sql);

// Gán giá trị cho các tham số
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Dữ liệu đã được thêm thành công!";
} else {
    echo "Có lỗi xảy ra khi thêm dữ liệu.";
}
?>
<?php
// Giả sử đã có kết nối PDO như ở trên

// Dữ liệu cần cập nhật
$id = 1;
$newEmail = 'john.doe@example.com';

// Câu lệnh SQL để cập nhật dữ liệu
$sql = "UPDATE users SET email = :email WHERE id = :id";

// Chuẩn bị câu lệnh
$stmt = $pdo->prepare($sql);

// Gán giá trị cho các tham số
$stmt->bindParam(':email', $newEmail);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Dữ liệu đã được cập nhật thành công!";
} else {
    echo "Có lỗi xảy ra khi cập nhật dữ liệu.";
}
?>
<?php
// Giả sử đã có kết nối PDO như ở trên

// ID của người dùng cần xoá
$id = 1;

// Câu lệnh SQL để xoá dữ liệu
$sql = "DELETE FROM users WHERE id = :id";

// Chuẩn bị câu lệnh
$stmt = $pdo->prepare($sql);

// Gán giá trị cho tham số
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Dữ liệu đã được xoá thành công!";
} else {
    echo "Có lỗi xảy ra khi xoá dữ liệu.";
}
?>
<?php
// Giả sử đã có kết nối PDO như ở trên

// Câu lệnh SQL để chọn dữ liệu
$sql = "SELECT id, name, email FROM users";

// Thực thi câu lệnh
$stmt = $pdo->query($sql);

// Lấy dữ liệu
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Hiển thị dữ liệu
foreach ($results as $row) {
    echo "ID: " . $row['id'] . "<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Email: " . $row['email'] . "<br><br>";
}
?>


// Câu 6
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";
?>
<?php
// Giả sử đã có kết nối $conn như ở trên

// Dữ liệu cần thêm
$name = 'John Doe';
$email = 'john@example.com';

// Câu lệnh SQL để thêm dữ liệu
$sql = "INSERT INTO users (name, email) VALUES (?, ?)";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);

// Gán giá trị cho các tham số
$stmt->bind_param("ss", $name, $email);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Dữ liệu đã được thêm thành công!";
} else {
    echo "Có lỗi xảy ra khi thêm dữ liệu: " . $conn->error;
}

// Đóng câu lệnh
$stmt->close();
?>
<?php
// Giả sử đã có kết nối $conn như ở trên

// Dữ liệu cần cập nhật
$id = 1;
$newEmail = 'john.doe@example.com';

// Câu lệnh SQL để cập nhật dữ liệu
$sql = "UPDATE users SET email = ? WHERE id = ?";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);

// Gán giá trị cho các tham số
$stmt->bind_param("si", $newEmail, $id);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Dữ liệu đã được cập nhật thành công!";
} else {
    echo "Có lỗi xảy ra khi cập nhật dữ liệu: " . $conn->error;
}

// Đóng câu lệnh
$stmt->close();
?>
<?php
// Giả sử đã có kết nối $conn như ở trên

// ID của người dùng cần xoá
$id = 1;

// Câu lệnh SQL để xoá dữ liệu
$sql = "DELETE FROM users WHERE id = ?";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);

// Gán giá trị cho tham số
$stmt->bind_param("i", $id);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Dữ liệu đã được xoá thành công!";
} else {
    echo "Có lỗi xảy ra khi xoá dữ liệu: " . $conn->error;
}

// Đóng câu lệnh
$stmt->close();
?>
<?php
// Giả sử đã có kết nối $conn như ở trên

// Câu lệnh SQL để chọn dữ liệu
$sql = "SELECT id, name, email FROM users";

// Thực thi câu lệnh
$result = $conn->query($sql);

// Kiểm tra và hiển thị dữ liệu
if ($result->num_rows > 0) {
    // Lặp qua các hàng dữ liệu
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br><br>";
    }
} else {
    echo "Không có dữ liệu nào.";
}

// Đóng kết nối
$conn->close();
?>

