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
    <!-- ADMINLTE -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- <link href="../assets/css/styles.css" rel="stylesheet" /> -->
    <!-- table -->
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
                        <a href="addlist.php" class="flex items-center justify-center gap-1 bg-[#F7F5FF] text-black p-2 rounded-full hover:bg-[#f2eeff] w-16 h-16 transition-all shadow-sm border-1 border-[#8271FF]">
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
                <a href="list.php" class="flex items-center rounded-sm bg-transparent">
                    <i class='bx bx-list-ul text-3xl text-[#8271FF]'></i>
                </a>
                <a href="#" class="flex items-center rounded-sm bg-[#8271FF]">
                    <i class='bx bx-table text-3xl text-[#f5f3ff]'></i>
                </a>
            </div>
        </div>
        <div class="flex flex-col gap-4 p-4">
            <div class="w-full">
                <!-- <form action="list_table.php" method="GET"> -->
                    <!-- <input type="text" name="keyword" class="bg-white" autofocus placeholder="cari..." autocomplete="off"> -->
                    <!-- <div class="p-3 bg-[#f5f3ff] rounded-md shadow-sm">
                        <div class="flex justify-between md:justify-start gap-2">
                            <input type="text" name="keyword" class="bg-[#e7e1ff] px-2 py-1 rounded-sm inset-shadow-sm" placeholder="Masukan Keyword..." autocomplete="off">
                            <button type="submit" name="cari" class="border-2 border-[#e7e1ff] w-[100px] flex justify-center items-center gap-2 cursor-pointer hover:bg-[#e7e1ff] transition-all rounded-sm">
                                <i class='bx bx-search'></i>
                                <span>Cari</span>
                            </button>
                        </div>
                        <div>

                        </div>
                    </div> -->
                    <!-- <div class="p-3 mt-3 bg-[#f5f3ff] rounded-md shadow-sm">
                        <table class="w-full">
                            <thead>
                                <tr class="border-1">
                                    <th class="border-1">Aksi</th>
                                    <th class="border-1">Judul</th>
                                    <th class="border-1">Deskripsi</th>
                                    <th class="border-1">Dibuat pada</th>
                                </tr>
                            </thead>
                            <tbody> -->
                                <!-- <?php foreach ($list as $item) : ?> -->
                                    <!-- <tr>
                                        <td class="text-center border-1">
                                            <form action="list_table.php" method="POST">
                                                <input type="hidden" name="task_id" value="<?= $item["id"] ?>">
                                                <button name="hapus">Delete</button>
                                                <a href="edit.php?id=<?= $item["id"]; ?>" name="edit" class="">Edit</a>
                                            </form>
                                        </td>
                                        <td class="p-2 border-1"><?= $item["title"] ?></td>
                                        <td class="p-2 border-1"><?= $item["description"] ?></td>
                                        <td class="p-2 border-1"><?= $item["date"] ?></td>
                                    </tr> -->
                                <!-- <?php endforeach; ?> -->
                            <!-- </tbody>
                        </table>
                    </div> -->
                <!-- </form> -->

                    <!-- Template -->
                    <div class="bg-[#f5f3ff] p-4 rounded-md overflow-scroll">
                        <div class="">
                            <!-- <i class="fas fa-table me-1"></i> -->
                            Daftar
                        </div>
                        <div class="">
                            <table id="datatablesSimple" class="">
                                <thead>
                                    <tr>
                                        <th class="text-sm md:text-base">Nomor</th>
                                        <th class="">Title</th>
                                        <th class="">Deskripsi</th>
                                        <th class="">Dibuat</th>
                                        <th class="">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($list as $item) : ?>
                                    <tr>
                                        <td class="text-sm md:text-base"><?=$i++ ?></td>
                                        <td><?= $item["title"] ?></td>
                                        <td><?=$item['description'] ?></td>
                                        <td><?=$item['date'] ?></td>
                                        <td>
                                            <form action="list_table.php" method="POST">
                                                <input type="hidden" name="task_id" value="<?= $item["id"] ?>">
                                                <button name="hapus">Delete</button>
                                                <a href="edit.php?id=<?= $item["id"]; ?>" name="edit" class="">Edit</a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>                               
                            </tbody>
                            </table>
                        </div>
                    </div>
                
            </div>
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
                window.location.href = "list_table.php";
            });
       </script>
    <?php endif; ?>
        
    <!-- JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/datatables-simple-demo.js"></script>
</body>
</html>