<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điểm Của Em</title>
    <link rel="stylesheet" href="./bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Exi css.css">
    <script src="./bootstrap-4.0.0-alpha.6-dist/js/jquery.min.js"></script>
    <script src="./bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f3f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 500px;
            margin: 0 auto;
            border: 1px solid #e3e3e3;
        }

        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 30px;
            font-size: 2.5em;
        }

        #input {
            margin-bottom: 15px;
        }

        #input span {
            font-weight: bold;
            margin-right: 10px;
            font-size: 1.1em;
        }

        input[type="text"],
        select {
            width: calc(100% - 30px);
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
            font-size: 1em;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3;
        }

        #result {
            margin-top: 20px;
            font-size: 1.3em;
            font-weight: bold;
            color: #343a40;
        }

        #honors {
            margin-top: 10px;
            font-size: 1.2em;
            font-weight: bold;
            color: #dc3545; /* Màu đỏ cho thông báo */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bảng Điểm Của Em</h1>

        <form action="bangdiem.php" method="POST">
            <div id="input">
                <span>Semester 1:</span>
                <input type="text" name="semester1" id="text1" size="40" required>
            </div>

            <div id="input">
                <span>Semester 2:</span>
                <input type="text" name="semester2" id="text2" size="40" required>
            </div>

            <div id="form-horizontal">
                <div class="row">
                    <div class="col-sm-2">
                        <span>Year:</span>
                    </div>
                    <div class="col-sm-2">
                        <select style="width: 50px; color: red" id="select" name="year" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-sm-8"></div>
                </div>
            </div>

            <div id="input">
                <input type="submit" value="Calculate">
                <input type="reset" value="Cancel">
            </div>
        </form>

        <?php
            error_reporting(0);
            // Khởi tạo biến
            $result = '';
            $honors = '';

            // Lấy giá trị từ form và kiểm tra
                $hk1 = $_POST['semester1'];
                $hk2 = $_POST['semester2'];
                $year = $_POST['year'];

            // Tính toán kết quả dựa trên giá trị year
            if ($year == 1) {
                $result = ($hk1 + ($hk2 * 3)) / 3;
            } elseif ($year == 2) {
                $result = ($hk1 + ($hk2 * 3)) / 4;
            } else {
                $result = ($hk1 + ($hk2 * 4)) / 5;
            }

            // Xếp loại danh hiệu học sinh
            if ($result >= 9) {
                $honors = "Xuất sắc";
            } elseif ($result >= 8) {
                $honors = "Giỏi";
            } elseif ($result >= 7) {
                $honors = "Khá";
            } elseif ($result >= 5) {
                $honors = "Trung bình";
            } else {
                $honors = "Yếu";
            }

            // Hiển thị kết quả
            echo "<div id='result'>
                    <span>Kết quả:</span> 
                    <input type='text' id='sum' size='40' value='" . $result . "' readonly>
                    </div>";
            echo "<div id='honors' class='alert'>Danh hiệu: " . $honors . "</div>";
        ?>
    </div>
</body>
</html>
