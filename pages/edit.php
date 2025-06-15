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

    $task_id = $_GET["id"];

    $sql = "SELECT * FROM tasks WHERE id='$task_id'";
    $result = $db->query($sql);
    $data = $result->fetch_assoc();
    $judul = $data["title"];
    $deskripsi = $data["description"];

    $notification = "";

    if(isset($_POST["edit"])) {
        $edit_judul = $_POST["judul"];
        $edit_deskripsi = $_POST["deskripsi"];

        $sql_edit = "UPDATE tasks SET title='$edit_judul', description='$edit_deskripsi' WHERE id='$task_id'";

        if($db->query($sql_edit)) {
            // echo "berhasil";
            $notification = "succes";

        }else {
            // echo "gagal";
            $notification = "error";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <a href="index.php" class="flex items-center gap-1 bg-transparent w-[full] text-black p-2 rounded-full hover:bg-[#eeeaff] transition-all">
                            <i class='bx bx-dashboard text-2xl'></i>
                            <span class="hidden md:inline">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="list.php" class="flex items-center gap-1 bg-[#8271FF] w-[full] text-[#F7F5FF] p-2 rounded-full">
                            <i class='bx bx-notepad text-2xl -translate-y-[2px]'></i>
                            <span class="hidden md:inline">List</span>
                        </a>
                    </li>
                    <li>
                        <a href="account.php" class="flex items-center gap-1 bg-transparent w-[full] text-black p-2 rounded-full hover:bg-[#eeeaff] transition-all">
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
    <main class="ml-[80px] md:ml-[250px] p-1 md:p-2">
        <div class="bg-zinc-00 flex justify-start mt-2">
            <div class="flex items-center gap-2 text-zinc-800">
                <span class="text-xl md:text-2xl font-semibold">Edit List</span>
                <i class='bx bx-pencil text-3xl'></i>
            </div>
        </div>
        <div class="mt-2">
            <form action="edit.php?id=<?= $task_id ?>" method="POST">
                <!-- ISI JUDUL -->
                <input type="text" name="judul" placeholder="Judul" value="<?= $judul ?>" class="w-full pt-4 pb-2 text-2xl md:text-3xl focus:outline-none font-medium focus:text-zinc-700" required>
                <div class="w-[50px] h-1 bg-[#8271FF] rounded-full shadow-sm"></div>
                <!-- ISI DESKRIPSI -->
                <textarea name="deskripsi" placeholder="Deskripsi" class="w-full h-[400px] me-1 mt-4 text-lg focus:outline-none focus:text-zinc-700 md:tracking-wide"><?= $deskripsi ?></textarea>
                <!-- TOMBOL SIMPAN -->
                <div class="fixed right-5 bottom-5 md:right-10 md:bottom-10 flex items-center justify-center">
                    <button type="submit" name="edit" class="flex items-center justify-center gap-1 bg-[#F7F5FF] text-black p-2 rounded-full hover:bg-[#8271FF] hover:text-[#F7F5FF] w-16 md:w-36 h-16 transition-all duration-300 shadow-sm cursor-pointer">
                        <i class='bx bx-check text-2xl'></i>
                        <span class="hidden md:inline">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- NOTIFICATION -->
    <?php if($notification === "succes") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'List berhasil diedit'
            }).then(() => {
                window.location.href = "list.php";
            });
       </script>
    <?php endif; ?>

</body>
</html>