<?php
session_start();

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header('location: ../index.php');
}

// SESSION
include("../session/session_user.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <title>Proyek LSP</title>
</head>
<body class="font-[Quicksand] font-medium bg-[#e7e1ff]">
    <header class="fixed md:w-[250px] h-screen p-1 md:p-2 z-[999]">
        <nav class="w-full bg-[#F7F5FF] h-full rounded-lg shadow-lg p-3 md:p-5 flex flex-col">
            <div class="flex items-center gap-2 mb-12">
                <div class="bg-[#13111D] rounded-full w-10">
                    <img src="../assets/img/rep_desk.png" alt="Logo">
                </div>
                <span class="text-lg font-bold hidden md:block">RepDesk</span>
            </div>
            <div class="flex flex-col justify-between h-full">
                <!-- Search Input -->
                

                <!-- Menu List -->
                <ul id="navMenu" class="flex flex-col gap-2">
                    <input type="text" id="searchInput" name="search" placeholder="Search" class="mb-4 p-2 rounded-md border border-gray-300 outline-none focus:ring-2 focus:ring-[#8271FF] transition-all" />
                    <li class="nav-item">
                        <a href="#" class="flex items-center gap-1 bg-[#8271FF] text-white p-2 rounded-full">
                            <!-- <i class='bx bx-dashboard text-2xl'></i> -->
                            <i class='bx bx-dashboard text-white text-2xl'></i>
                            <span class="hidden md:inline">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="list.php" class="flex items-center gap-1 text-black p-2 rounded-full hover:bg-[#eeeaff] transition-all">
                            <i class='bx bx-notepad text-2xl -translate-y-[2px]'></i>
                            <span class="hidden md:inline">List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="account.php" class="flex items-center gap-1 text-black p-2 rounded-full hover:bg-[#eeeaff] transition-all">
                            <i class='bx bx-user-circle text-2xl'></i>
                            <span class="hidden md:inline">Account</span>
                        </a>
                    </li>
                </ul>

                <!-- Bottom Buttons -->
                <ul class="flex flex-col mb-2">
                    <li>
                        <a href="addlist.php" class="flex items-center gap-1 bg-[#eeeaff] text-black p-2 rounded-xl hover:bg-[#eae5ff] transition-all mb-8 md:mb-4 shadow-sm md:shadow-none">
                            <i class='bx bx-plus text-2xl'></i>
                            <span class="hidden md:inline">Add list</span>
                        </a>
                    </li>

                    <!-- Mobile Floating Add Button -->
                    <li class="fixed right-5 bottom-5 md:right-10 md:bottom-10 flex items-center justify-center">
                        <a href="addlist.php" class="flex items-center justify-center gap-1 bg-[#F7F5FF] text-black p-2 rounded-full hover:bg-[#eae5ff] w-16 h-16 transition-all shadow-sm">
                            <i class='bx bx-plus text-2xl'></i>
                        </a>
                    </li>

                    <!-- Logout -->
                    <li>
                        <form action="index.php" method="POST">
                            <button name="logout" class="flex items-center gap-1 translate-x-1 cursor-pointer mt-4 text-black hover:text-red-500 transition">
                                <i class='bx bx-log-out text-2xl'></i>
                                <span class="hidden md:inline">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="ml-[80px] md:ml-[250px] p-5">
        <!-- Konten utama -->
        <h1 class="text-2xl font-bold">Selamat datang di dashboard!</h1>
    </main>

    <!-- Script untuk Search Filter -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const navItems = document.querySelectorAll('#navMenu .nav-item');

        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase();

            navItems.forEach(item => {
                const linkText = item.textContent.toLowerCase();
                item.style.display = linkText.includes(query) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
