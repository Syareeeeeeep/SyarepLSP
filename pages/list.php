<?php

    session_start();

    if(isset($_POST["logout"])) {
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
                        <a href="#" class="flex items-center gap-1 bg-transparent w-[full] text-black p-2 rounded-full hover:bg-[#eeeaff] transition-all">
                            <i class='bx bx-user-circle text-2xl'></i>
                            <span class="hidden md:inline">Account</span>
                        </a>
                    </li>
                    
                </ul>
                <ul class="flex flex-col mb-2">
                    <li>
                        <a href="#" class="flex items-center gap-1 bg-[#eeeaff] w-[full] text-black p-2 rounded-xl hover:bg-[#eae5ff] transition-all mb-8 md:mb-4 shadow-sm md:shadow-none">
                            <i class='bx bx-plus text-2xl'></i>
                            <span class="hidden md:inline">Add list</span>
                        </a>
                    </li>
                    <!-- Mobile -->
                    <li class="fixed right-5 bottom-5 md:hidden flex items-center justify-center">
                        <a href="#" class="flex items-center justify-center gap-1 bg-[#F7F5FF] text-black p-2 rounded-full hover:bg-[#eae5ff] w-16 h-16 transition-all shadow-sm">
                            <i class='bx bx-plus text-2xl'></i>
                        </a>
                    </li>
                    <li>
                        <form action="index.php" method="POST">
                            <button name="logout" class="flex items-center gap-1 translate-x-1 cursor-pointer">
                                <i class='bx bx-log-out text-2xl'></i>
                                <span class="hidden md:inline">Logout</span>
                            </button>
                        </form>
                        <!-- <a href="#" class="flex items-center gap-1 bg-transparent w-[full] text-black p-2 rounded-full hover:bg-[#eeeaff] transition-all">
                            <i class='bx bx-user-circle text-2xl'></i>
                            <span class="hidden md:inline">Account</span>
                        </a> -->
                    </li>
                </ul>
            </div>
            
        </nav>
    </header>
    <main class="ml-[80px] md:ml-[250px]">

        <!-- <h1 class="text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem perferendis omnis blanditiis sit cumque expedita quasi iusto quae quibusdam deserunt natus dolorem aut ducimus voluptatibus ad, quos vitae ipsum reiciendis reprehenderit itaque deleniti facilis harum. Eligendi perspiciatis, officiis cupiditate voluptatum iusto veniam labore incidunt corrupti? Voluptatibus, consequuntur fugiat commodi ex accusamus, cupiditate et libero cumque fugit aut ad velit? Totam minus dolores quibusdam excepturi quia laudantium nulla ullam voluptates nostrum accusamus non vitae beatae distinctio quaerat eum delectus nobis asperiores omnis, sequi neque aut corrupti voluptatem possimus. Aut, rerum suscipit! Fugit incidunt minus rem eius qui provident non, architecto velit blanditiis nulla maiores molestias possimus tempora quasi! Beatae id vitae officiis qui repellendus eveniet doloribus, facilis eos, nihil ducimus incidunt consequatur ut quibusdam odio iste rerum illum optio itaque similique cumque, deleniti pariatur assumenda aliquam. Atque delectus natus fugit dicta cumque. Doloremque earum, voluptate reiciendis rerum illum ex ipsum beatae rem asperiores blanditiis reprehenderit magni nemo neque quibusdam, sint obcaecati iusto, quia dolorum provident consequuntur! Omnis ut labore debitis pariatur corporis tempore nemo fuga? Minus neque aliquam necessitatibus quis laboriosam nulla sapiente eum rem cupiditate, natus vitae totam quibusdam ea nesciunt non eveniet unde labore! Maxime, ratione in. Maxime magni dolore labore, quos consectetur in? Fugiat ratione provident repudiandae nesciunt, itaque culpa atque ipsum aliquam. Suscipit veritatis iure minima distinctio ab nulla quas dolor ipsam! Ratione repellendus, molestiae reprehenderit quidem velit recusandae repellat eligendi architecto dolorem corrupti error illum cupiditate, minima tempore natus sunt mollitia temporibus illo tenetur vel non, quas blanditiis quasi? Pariatur vel odio eum eaque fugiat commodi consequuntur eveniet ratione, voluptatibus corrupti numquam sed illo, amet sequi, provident a porro. Atque molestias excepturi mollitia quo, quaerat ipsam a necessitatibus dolores ab, eveniet cum vitae quibusdam harum repellat, repudiandae cumque! Totam quo dicta quas aut accusamus quae ut minus, laboriosam, fugiat in praesentium velit voluptate odit eligendi ducimus enim tempora dolorem, laudantium debitis dignissimos eius? Nobis debitis quis, explicabo deleniti dolorum ullam ipsa consequuntur a quidem velit iste, laboriosam nesciunt aut! Rerum nemo tempore quod quaerat doloribus eos! Illo eveniet quae nisi amet. Doloremque facilis sint inventore corrupti nostrum quibusdam sapiente, atque tempora aspernatur quos maiores iste, dolorum, optio ducimus quae id earum nam provident officiis eveniet aut cumque dolores. Odio, accusantium aperiam animi dicta alias soluta temporibus odit ex, perspiciatis nisi id. Voluptatem necessitatibus nostrum quam at iusto pariatur similique harum, ducimus laudantium magni. Sequi, labore omnis.</h1> -->
    </main>
</body>
</html>