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

    $id_user = $_SESSION["id"];

    $notification = "";

    $sql = "SELECT * FROM tasks WHERE user_id='$id_user'";
    $result = $db->query($sql);
    $list = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $list[] = $row;
    }

    if(isset($_POST["hapus"])) {
        $task_id = $_POST["task_id"];

        $sql_delete = "DELETE FROM tasks WHERE id='$task_id'";
        if($db->query($sql_delete)) {
            $notification = "succes-delete";
        }
    }
    // if(isset($_POST["edit"])) {
    //     $task_id = $_POST["task_id"];
    //     header("location: edit.php");
    // }

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
                        <a href="#" class="flex items-center gap-1 bg-[#8271FF] w-[full] text-[#F7F5FF] p-2 rounded-full">
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
    <main class="ml-[80px] md:ml-[250px] mb-[100px] md:mb-[120px]">
        <div class="px-4 pt-4 flex items-center justify-between">
            <span class="text-3xl font-bold">Lists</span>
            <div class="p-1 gap-[2px] bg-[#f5f3ff] flex rounded-md shadow-sm">
                <a href="#" class="flex items-center rounded-sm bg-[#8271FF]">
                    <i class='bx bx-list-ul text-3xl text-[#f5f3ff]'></i>
                </a>
                <a href="list_tabble.php" class="flex items-center rounded-sm bg-transparent">
                    <i class='bx bx-table text-3xl text-[#8271FF]'></i>
                </a>
            </div>
        </div>
        <div class="flex flex-col gap-4 p-4">
            <?php foreach ($list as $item) : ?>
                <form action="list.php" method="POST" class="w-full md:w- h-[180px] bg-[#f5f3ff] rounded-lg shadow-sm p-4 flex flex-col justify-between relative">
                    <!-- ISI -->
                    <div class="flex flex-col">
                        <!-- id -->
                         <input type="text" name="task_id" value="<?= $item["id"] ?>" class="hidden">
                        <!-- judul -->
                        <input type="text" name="judul" class="text-xl focus:outline-none" value="<?= $item["title"] ?>" readonly>
                        <div class="flex flex-col gap-[2px]">
                            <div class="w-[40px] h-[2px] bg-[#8271FF] rounded-full"></div>
                            <div class="w-[30px] h-[2px] bg-[#8271FF] rounded-full"></div>
                        </div>
                        <!-- deskripsi -->
                         <textarea name="deskripsi" id="" readonly class="mt-1 focus:outline-none h-[110px] text-[#505050]"><?= $item["description"] ?></textarea>
                    </div>
                    <!-- AKSI -->
                    <div class="bg-gray- flex justify-end gap-2 absolute bottom-2 right-2 p-2 bg-[#f5f3ff]">
                        <button name="hapus" class="border-2 border-[#8271FF] hover:bg-[#e7e3fd] text-[#8271FF] flex items-center justify-center w-[36px] h-[36px] md:w-[100px] rounded-md cursor-pointer">
                            <i class='bx bx-trash text-2xl'></i>
                            <span class="hidden md:inline">Hapus</span>
                        </button>
                        <a href="edit.php?id=<?= $item["id"]; ?>" name="edit" class="bg-[#8271FF] hover:bg-[#7562ff] text-[#f5f3ff] flex items-center justify-center w-[36px] h-[36px] md:w-[100px] rounded-md cursor-pointer">
                            <i class='bx bx-edit text-2xl'></i>
                            <span class="hidden md:inline">Edit</span>
                        </a>
                    </div>
                </form>
                
            <?php endforeach; ?>
        </div>
    </main>

    <!-- NOTIFICATION -->
    <?php if($notification === "succes-delete") : ?>
       <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'List berhasil dihapus'
            }).then(() => {
                window.location.href = "list.php";
            });
       </script>
    <?php endif; ?>

</body>
</html>