<?php
    include("service/koneksi.php");
    session_start();

    $login_message = "";

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["id"] = $data["id"];
            $_SESSION["email"] = $data["email"];
            $_SESSION["password"] = $data["password"];
            $_SESSION["is_login"] = "users" ;

            header("location: pages/index.php");
        }else{
            $login_message = "gagal";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Sign Up</title>
</head>
<body>
    <div class="font-[Quicksand] bg-[#e7e1ff] h-screen flex justify-center sm:items-center">
        <div class="bg-[#F7F5FF] flex justify-between h-[520px] sm:h-[80vh] md:h-[50vh] lg:h-[80vh] w-[350px] sm:w-[600px] md:w-[700px] lg:w-[900px] rounded-xl overflow-hidden shadow-lg px-4 sm:px-0 mt-4 sm:mt-0">
            <div class="kiri w-full lg:w-1/2 p-2 sm:p-6">
                <div class="atas flex items-center justify-between w-full mt-2 sm:mt-0">
                    <div class="flex items-center gap-2">
                        <div class="w-10 bg-[#13111D] rounded-full"><img src="assets/img/rep_desk.png" alt="logo-repdesk"></div>
                        <span class="text-lg font-bold">RepDesk</span>
                    </div>
                    <ul class="flex gap-4">
                        <li><a href="#" class="font-medium opacity-50 hover:opacity-100 hidden sm:inline">Login</a></li>
                        <li><a href="form_signup.php" class="font-medium opacity-50 hover:opacity-100 hidden sm:inline">Sign Up</a></li>
                    </ul>
                </div>
                <div class="bawah p-2 sm:p-5 flex flex-col justify-center mt-10">
                    <div>
                        <span class="text-sm font-semibold opacity-50">LOG IN</span>
                        <p class="text-4xl font-bold">Access your account<span class="text-[#8271FF]">.</span></p>
                        <p class="text-sm font-semibold mt-3"><span class="opacity-50">Don't Have an Account?</span> <a href="form_signup.php" class="text-[#8271FF]">Sign Up</a></p>
                    </div>
                    <form action="form_login.php" method="post" class="mt-10 flex flex-col gap-4">
                        <div class="bg-[#ece7ff] px-4 py-[1px] rounded-xl flex justify-between items-center">
                            <div class="w-full pr-2">
                                <div><span class="text-[13px] font-semibold opacity-50 p-0">Username</span></div>
                                <input type="text" name="username" required class="w-full focus:outline-none text-sm font-bold -translate-y-1">
                            </div>
                            <div><i class='bx bxs-user text-2xl opacity-50 translate-y-[2px]'></i></div>
                        </div>
                        <div class="bg-[#ece7ff] px-4 py-[1px] rounded-xl flex justify-between items-center">
                            <div class="w-full pr-2">
                                <div><span class="text-[13px] font-semibold opacity-50 p-0">Password</span></div>
                                <input type="password" name="password" required class="w-full focus:outline-none text-sm font-bold -translate-y-1">
                            </div>
                            <div><i class='bx bxs-lock text-2xl opacity-50 translate-y-[2px]'></i></div>
                        </div>
                        <div class="flex justify-between gap-3 mt-4">
                            <button type="reset" name="cancel" class="text-sm font-semibold w-1/2 rounded-full py-3 bg-[#ece7ff] text-[#797979]">Cancel</button>
                            <button type="submit" name="login" class="text-sm font-semibold w-1/2 rounded-full py-3 bg-[#8271FF] text-[#F7F5FF]">Login</button>
                        </div>
                    </form>
                </div>          
            </div>
            <div class="md:flex hidden kanan h-full lg:w-1/2">
                <img src="assets/img/login.png" alt="gada" class="hidden lg:flex h-full lg:w-full w-0">
            </div>
        </div>
    </div>

    <?php if ($login_message === "gagal") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Data salah, gagal masuk akun.'
            });
        </script>
    <?php endif; ?>

</body>
</html>