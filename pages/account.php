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

    // username
    $id_user = $_SESSION['id'];
    // echo $id_user;
    $username = $_SESSION['username'];
    // echo $username;

    $sql = "SELECT * FROM tasks WHERE user_id='$id_user'";
    $result = $db->query($sql);
    $list = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $list[] = $row;
    }

    // jumlah list
    $jumlah_list = count($list);
    // echo $jumlah_list;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <a href="#" class="flex items-center gap-1 bg-[#8271FF] w-[full] text-[#F7F5FF] p-2 rounded-full">
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
                <span class="p-1">PROFILE</span>
                <div class="bg-[#f4f1ff] rounded-sm flex flex-col items-center p-6">
                    <i class='bx bxs-user-circle text-6xl text-[#00000079]'></i>
                    <span class="text-lg"><?= $username ?></span>
                    <a href="account_setting.php" class="flex items-center justify-between bg-[#8271FF] rounded-full py-2 pl-5 pr-3 gap-1 mt-4">
                        <span class="text-[#f4f1ff]">Detail Akun</span>
                        <i class='bx bx-chevron-right text-2xl text-[#f4f1ff]'></i>
                    </a>
                </div>
            </div>
            <!-- isi -->
            <div class="w-full">
                <span class="p-1">LIST</span>
                <a href="list.php" class="bg-[#f4f1ff] hover:bg-[#f1edff] rounded-sm flex flex-col items-center p-4">
                    <div class="w-full flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <i class='bx bx-notepad text-2xl -translate-y-[2px]'></i>
                            <span><?= $jumlah_list ?></span>
                        </div>
                        <i class='bx bx-chevron-right text-2xl'></i>
                    </div>
                </a>
            </div>
            <!-- logout -->
            <div class="w-full">
                <span class="p-1">LOGOUT</span>
                <form action="index.php" method="POST">
                    <button name="logout" class="w-full bg-[#f4f1ff] hover:bg-[#f1edff] rounded-sm flex gap-2 items-center p-4 cursor-pointer">
                        <i class='bx bx-log-out text-2xl -translate-y-[1px] -translate-x-[2px]'></i>
                        <span class="inline -translate-x-[2px]">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>