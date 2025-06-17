<?php

    session_start();

    if(isset($_POST["logout"])) {
        session_unset();
        session_destroy();
        header('location: ../index.php');
    }

    // SESSION
    include("../session/session_user.php");

    // KONEKSI
    include("../service/koneksi.php");

    // user
    $id_user = $_SESSION['id'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    // echo $password;
    $panjang_pw = strlen($password);

    $mes_pwval = "";
    $mes_baru = "";

    if(isset($_POST['ganti'])) {
        $password_val = $_POST["pwlama"];
        $password_baru = $_POST["pwbaru"];

        if($password_val === $password) {
            // $mes_pwval = "";
            $sql = "UPDATE users SET password='$password_baru' WHERE id='$id_user'";
            if($db->query($sql)) {
                $mes_baru = "succes";
                // echo 'berhasil';
                // Mengupdate session
                $sql_user = "SELECT * FROM users WHERE id=$id_user";

                $result = $db->query($sql_user);
                $data = $result->fetch_assoc();
                $_SESSION["password"] = $data["password"];
            }else{
                // echo 'gagal';
            }
        }else{
            $mes_pwval = "password lama salah!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=dashboard" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" />
    <title>Proyek LSP</title>
</head>
<body class="font-[Quicksand] font-medium bg-[#e7e1ff]">
    <header class="fixed md:w-[250px] h-screen p-1 md:p-2 z-[999]">
        <nav class="w-full bg-[#F7F5FF] h-full rounded-lg shadow-lg p-3 md:p-5 flex flex-col">
            <div class="flex items-center gap-2 mb-12">
                <div class="bg-[#13111D] rounded-full w-10">
                    <img src="../assets/img/rep_desk.png" alt="">
                </div>
                <span class="text-lg font-bold hidden md:block">RepDesk</span>
            </div>
            <div class="flex flex-col justify-between h-full">
                <ul class="flex flex-col gap-2">
                    <li>
                        <a href="index.php" class="flex items-center gap-1 bg-transparent w-[full] text-[black] p-2 rounded-full hover:bg-[#eeeaff] transition-all">
                            <i class='bx bx-dashboard text-2xl'></i>
                            <span class="hidden md:inline">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="list.php" class="flex items-center gap-1 bg-transparent w-[full] text-black p-2 rounded-full hover:bg-[#eeeaff] transition-all">
                            <i class='bx bx-notepad text-2xl -translate-y-[2px]'></i>
                            <span class="hidden md:inline">List</span>
                        </a>
                    </li>
                    <li>
                        <a href="account.php" class="flex items-center gap-1 bg-[#8271FF] w-[full] text-[#F7F5FF] p-2 rounded-full">
                            <i class='bx bx-user-circle text-2xl'></i>
                            <span class="hidden md:inline">Account</span>
                        </a>
                    </li>
                    
                </ul>
                <ul class="flex flex-col mb-2">
                    <li>
                        <a href="addlist.php" class="flex items-center gap-1 bg-[#eeeaff] w-[full] text-black p-2 rounded-xl hover:bg-[#eae5ff] transition-all mb-8 md:mb-4 shadow-sm md:shadow-none">
                            <i class='bx bx-plus text-2xl'></i>
                            <span class="hidden md:inline">Add list</span>
                        </a>
                    </li>
                    <!-- Fixed add -->
                    <li class="fixed right-5 bottom-5 md:right-10 md:bottom-10 flex items-center justify-center">
                        <a href="addlist.php" class="flex items-center justify-center gap-1 bg-[#F7F5FF] text-black p-2 rounded-full hover:bg-[#f2eeff] w-16 h-16 transition-all shadow-sm">
                            <i class='bx bx-plus text-2xl'></i>
                        </a>
                    </li>
                    <!--  -->
                    <li>
                        <form action="index.php" method="POST">
                            <button name="logout" class="flex items-center gap-1 translate-x-1 cursor-pointer">
                                <i class='bx bx-log-out text-2xl'></i>
                                <span class="hidden md:inline">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            
        </nav>
    </header>
    <main class="ml-[80px] md:ml-[250px]">
        <div class="p-4 pl-2 flex flex-col gap-2">
            <!-- profile -->
            <div class="w-full">
                <a href="account_setting.php" class="flex items-center gap-2 mb-2">
                    <i class='bx bx-arrow-back text-xl'></i>
                    <span class="text-base">Back</span>
                </a>
                <form action="change_password.php" method="POST">
                    <div class="bg-[#f4f1ff] rounded-sm flex flex-col p-6 gap-4">
                        <!-- password lama -->
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="flex items-center gap-2">
                                <i class='bx bxs-lock text-4xl text-[#00000079]'></i>
                                <input type="text" placeholder="Password lama" name="pwlama" class="py-1 px-2 border-1 border-[#00000079] rounded-md" autocomplete="off">
                            </div>
                            <span class="text-red-400 italic text-sm ml-0 md:ml-2"><?= $mes_pwval ?></span>
                        </div>
                        <!-- password baru -->
                        <div class="flex items-center gap-2">
                            <i class='bx bxs-lock text-4xl text-[#00000079]'></i>
                            <input type="text" placeholder="Password Baru" name="pwbaru" class="py-1 px-2 border-1 border-[#00000079] rounded-md" autocomplete="off">
                        </div>

                        <div class="">
                            <button type="submit" name="ganti" class=" w-[180px] flex items-center justify-between bg-[#8271FF] rounded-full py-2 pl-5 pr-3 mt-2 cursor-pointer">
                                <span class="text-[#f4f1ff]">Konfirmasi</span>
                                <i class='bx bx-chevron-right text-2xl text-[#f4f1ff]'></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php if($mes_baru === "succes") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Password berhasil diubah'
            }).then(() => {
                window.location.href = "account.php";
            });
       </script>
    <?php endif; ?>
</body>
</html>