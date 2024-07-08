<?php
session_start();
?>
<?php
    $con = mysqli_connect('localhost','root','','coffeestore');
    if($con){
        mysqli_query($con,"SET NAME 'UTF8'");
    }
    $sql= "SELECT * FROM tbl_ttnv";
    $result= mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
       
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <style>
        .table{
            width: 100%;
            text-align: center;
            background-color: #fff;
        }
        .table th{
            background-color: #2dfd7d;
        }
    </style>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

            /* Global Styles */
        body {
            height:100%;
            position: relative;
            background-position: center !important;
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            min-height: 50vh; /* will cover the 100% of viewport */
            overflow: hidden;
            display: block;
            position: relative;
            padding-bottom: 100px; /* height of your footer */
            width: 100%; 
        }

        header {
            position: relative;
            background-color: #0f7f2a;
            padding: 10px 0;
        }

        .top-block {
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
            display: flex;
            padding: 0 20px;
            color: #ffffff;
            padding: 0 20px;
            }
            /*logo*/
        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 5em;
            margin-right: 0.5em;
        }

         .row {
            align-items: center;
         }
         .row img{
            width: 3em;
            margin-bottom: 0;
         }
        
        .shop-info {
            text-align: right;
            margin-top: -2em;
        }

        .actions {
            margin-top: 0;
        }

        .actions a {
            text-decoration: none;
            color: #ffffff;
            font-size: 16;
            margin-right: 1em;
            transition: color 0.3s;
        }

        .actions a:hover {
            color: #fbff00;
        }

        /* Navigation Bar Styles */
        nav {
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
            background-color: #0f7f2a;
            color: #fff;
            display: flex;
            padding: 0 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #fbff00;
        }

        /* Content Block Styles */
        .content-block {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        /* Footer Styles */
        footer {
            border-top: 0;
            bottom: 0;
            background-color: #0f7f2a;
            color: #fff;
            padding: 20px 0;
        }

        .footer img {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-info {
            width: 60%;
        }

        .footer-contact {
            width: 30%;
            text-align: right;
        }

        .footer-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .footer-info p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .footer-info p:last-child {
            margin-bottom: 0;
            margin-left: .25rem;
        }

        .contact-button{
            background-color: #2cb541;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 15px;
            font-family: 'Times New Roman', Times, serif;
        }

        .contact:hover {
            color: #fbff00;
        }

        /* Contact Form Styles */
        .contact-form {
            display: none;
            background-color: #fff;
            border: 1px solid #ccc;
            color: #000000;
            padding: 20px;
            position: absolute;
            bottom: 0;
            right: 120px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .contact-form label {
            text-align: left;
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .contact-form input[type="text"],
        .contact-form textarea {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 0.5em;
            border: 0.05em solid #000000;
            border-radius: 0.1em;
        }

        .contact-form textarea {
            height: 8em;
        }

        .contact-form button {
            background-color: #2cb541;
            color: #fff;
            border: none;
            padding: 0.5em 1em;
            border-radius: 0.2em;
            font-size: 1em;
            cursor: pointer;
            font-family: 'Times New Roman', Times, serif;
        }

        @media screen and (max-width: 800px) {
        nav ul {
            display: none;
        }

        nav ul li {
            display: none;
        }
            /* Menu Button Styles */
        .menu-button {
            font-size: 24px;
            cursor: pointer;
            padding: 0.25em 0.5em;
            background-color: #2cb541;
            border: none;
            color: #ffffff;
            border-radius: 5px;
            margin-left: 95%;
        }

        /* Menu List Styles */
        .menu-list {
            z-index: 2;
            position: fixed;
            left: -200px; /* ẩn menu ban đầu bên trái */
            top: 0;
            bottom: 0;
            background-color: #000000;
            color: #135d24;
            width: 200px;
            overflow-y: auto;
            transition: left 0.3s; /* thời gian hiệu ứng */
        }

        .menu-list a {
            z-index: 2;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            display: block;
        }

        /* Hiển thị menu khi được mở */
        .show-menu .menu-list {
            left: 0;
        }
        }
        @media screen and (min-width: 800px) {
            
        nav ul {
            margin: auto;
            list-style-type: none;
            display: flex;
        }

        nav ul li {
            margin-left: 50px;
        }
        .menu-button {
            display: none;
        }

        /* Menu List Styles */
        .menu-list {
            display: none;
        }

        .menu-list a {
            display: none;
        }

        /* Hiển thị menu khi được mở */
        .show-menu .menu-list {
            display: none;
        }
        }
    </style>
</head>
<body>
    <!-- Header -->
 
<div class="wrapper">
<?php 
if(isset($_SESSION['usernamenhanvien'])){
    // echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchunhanvien.php">Quay lại</a>';
    include'../header/header2.php';

}
else if(isset($_SESSION['usernameadmin'])){
    // echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchuquanly.php">Quay lại</a>';
    include'../header/header1.php';
}
?>
</div>
   
   
    <div class="container">
        <br>
        <h2>Lịch làm việc</h2>
   



      
        
        <!-- <form method="get">
            <input type="text" name="search" placeholder="Nhập tên">
            <input type="submit" value ="Tìm kiếm">
            <input type="submit" value ="Tất cả">
        </form> -->
        <!-- <td><a style="text-decoration:none;color: blue;" href="them.php">Thêm</a></td> -->
        <table class="table" border="1" rules="all" width="1000px">
            <tr>
                <th>Mã nhân viên</th>
                <th>Tên nhân viên</th>
                <th>Công việc</th>
                <th>Làm từ ngày</th>
                <th>Làm đến ngày</th>
                <th>Ca làm</th>
                <th>Tổng giờ làm</th>
                <th colspan="2">Thao tác</th>
            </tr>
            <?php
            $count=1;
            while($row=mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td> <?php echo $row['MaNV']; ?></td>
                    <td> <?php echo $row['HoTen']; ?></td>
                    <?php echo "<td>";
                        switch ($row["CongViec"]) {
                            case 0:
                                echo "Quản lý";
                                break;
                            case 1:
                                echo "Phục vụ";
                                break;
                            case 2:
                                echo "Pha chế";
                                break;
                            default:
                                echo "Không xác định";
                                break;
                        }echo "</td>"; ?>
                    <?php echo" <td>".date('d/m/Y', strtotime($row["TuNgay"]))."</td>"; ?>
                    <?php echo" <td>".date('d/m/Y', strtotime($row["DenNgay"]))."</td>"; ?>
                    <td> <?php echo $row['CaLam']; ?></td>
                    <?php echo "<td>";
                        if(($row["CaLam"])=='Sáng') { 
                            echo "5"; 
                            }
                        else if(($row["CaLam"])=='Chiều') { 
                            echo "5"; 
                            }
                        else if(($row["CaLam"])=='Tối') { 
                            echo "5"; 
                            }
                        else if(($row["CaLam"])=='Sáng,Chiều') { 
                            echo "10"; 
                            }
                        else if(($row["CaLam"])=='Sáng,Tối') { 
                            echo "10"; 
                            }
                        else if(($row["CaLam"])=='Chiều,Tối') { 
                            echo "10"; 
                            }
                        else if(($row["CaLam"])=='Sáng,Chiều,Tối') { 
                            echo "15"; 
                            }
                    echo "</td>"; ?>
                    <td><a style="text-decoration:none;color: blue;" href="sua.php?MaNV=<?php echo $row['MaNV']; ?> ">Sửa</a></td>
                    <td><a style="text-decoration:none;color: blue;" href="xoa.php?MaNV=<?php echo $row['MaNV']; ?> ">Xóa</a></td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
    
    <footer>
        <div class="footer-content">
            <!-- Footer Information Block -->
            <div class="footer-info">
                <h2>Coffee</h2>
                <p>Địa chỉ: Đường Tân Triều, Quận Thanh Xuân, Thành phố Hà Nội</p>
                <p>Số điện thoại: 0123 456 789</p>
                <p>Email: Coffee@email.com</p>
            </div>

            <!-- Contact Button and Form Block -->
            <div class="footer-contact">
                <div class="footer img">
                    <img src="https://t4.ftcdn.net/jpg/05/14/51/79/360_F_514517927_dXLi1DauUmrCaE3AkElsVgJ1jaYZMcSA.jpg" alt="Coffee Shop Logo">
                </div>
                
                
            </div>
        </div>
    </footer>
    <script>
        // Lấy tham chiếu đến menu-toggle và menu-list
        const menuToggle = document.getElementById("menu-toggle");
        const menuList = document.getElementById("menu-list");

        // Khai báo biến để kiểm tra trạng thái menu
        let menuOpen = false;

        // Tạo hàm để hiển thị/ẩn menu
        function toggleMenu() {
            if (menuOpen) {
                menuList.style.left = "-200px"; // Ẩn menu bên trái
            } else {
                menuList.style.left = "0"; // Hiển thị menu
            }
            menuOpen = !menuOpen; // Đảo ngược trạng thái
        }

        // Thêm sự kiện click vào menu-toggle
        menuToggle.addEventListener("click", toggleMenu);
    </script>
    <script>
    function del(name){
        return confirm("Bạn có muốn xóa: "+name+ "?");
    }
    </script>
</body>
</html>