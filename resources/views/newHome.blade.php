<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
</head>
<body class="h-screen">
  
    <main class="w-auto h-full px-[225px] flex-col py-[15%] justify-start items-center gap-6 inline-flex bg-cover" style="background-image : url(https://res.cloudinary.com/zifferent99/image/upload/v1718900593/image1_nbq0hw.png)">
        <div class="self-stretch text-center text-white font-['Catamaran'] font-extrabold text-[42px]">Prioritas Pemenuhan Kebutuhan Sekolah Dalam Situasi Darurat</div>
        <div class="justify-start items-start gap-4 inline-flex">
            <a href="{{url('login-admin')}}" class="px-6 py-2 bg-blue-600 rounded-[55px] justify-center items-center gap-2 flex hover:bg-blue-800">
                <p class="text-white text-base font-bold font-['Lato']">Dinas Pendidikan</p>
            </a>

            <a href="{{url('login-sekolah')}}" class="px-6 py-2 bg-blue-600 rounded-[55px] justify-center items-center gap-2 flex hover:bg-blue-800">
                <p class="text-white text-base font-bold font-['Lato']">Sekolah</p>
            </a>
        </div>
    </main>

    <footer class="absolute bottom-0 w-full">
        <p class="text-center text-sm text-white py-[24px] bg-black">Copyright © SPK Prioritas Bantuan</p>
    </footer>
 
</body>
</html>