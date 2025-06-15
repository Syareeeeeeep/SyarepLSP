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
    <title>Home</title>
    <style>
        @keyframes hehe {
            0% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        .apa {
            position: absolute;
            top: -100px;
            left: 0%;
            z-index: -1;
            width: 600px;
            height: 300px;
            border-radius: 50%;
            background-color: #8271FF;
            animation: hehe 5s ease-in-out infinite;
        }

        @media (min-width: 768px) {
            .apa {
                position: absolute;
                top: -140vh;
                left: 0;
                z-index: -1;
                border-radius: 50%;
                background-color: #8271FF;
                animation: hehe 5s ease-in-out infinite;
                width: 3000px;
                height: 1200px;
            }
        }

        .wrapper {
            backdrop-filter: blur(100px);
        }
    </style>
</head>
<body class="bg-black overflow-hidden h-screen w-screen font-[quicksand]">
    <div class="w-full overflow-hidden relative">
        <div class="apa"></div>
        <div class="wrapper w-full h-screen bg-[#8271ff48] flex flex-col items-center justify-center gap-4">
            <div class="flex flex-col md:flex-row items-center">
                <img src="assets/img/rep_desk.png" alt="logo_rep_desk" class="w-30 md:w-28">
                <span class="text-white inline text-3xl md:text-5xl font-semibold">RepDesk</span>
            </div>
            <div class="w-[70vw] md:w-[700px]">
                <p class="text-white text-center opacity-70 hidden md:block">"Jangan biarkan ide brilianmu hilang begitu saja! Gunakan aplikasi Catatan kami untuk mencatat, menyimpan, dan mengatur semuanya dengan praktis dan aman."</p>
                <p class="text-white text-center opacity-70 block md:hidden">"Satu aplikasi, semua catatan. Simpan ide dan aktivitas harianmu tanpa ribet!"</p>
            </div>
            <div class="mt-4 flex justify-center gap-4">
                <a href="form_signup.php" class="text-white text-lg px-10 py-2 border-1 border-white rounded-lg hover:bg-[#8271FF] hover:border-[#8271FF] transition-all">Sign Up</a>
                <a href="form_login.php" class="text-white text-lg px-10 py-2 border-1 border-white rounded-lg hover:bg-[#8271FF] hover:border-[#8271FF] transition-all">Log In</a>
            </div>
        </div>
    </div>
</body>
</html>