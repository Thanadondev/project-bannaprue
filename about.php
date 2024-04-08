<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Basic Meta Tags -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
   <!-- Site Meta Data -->
   <title>About</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">

   <!-- Include Tailwind CSS -->
   <script src="https://cdn.tailwindcss.com"></script>
   <!-- DaisyUI for component styles -->
   <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-relaxed">
<?php include_once('header.php'); ?>
   <!-- About Section Start -->
   <div class="min-h-screen py-16 flex flex-col justify-center">
      <div class="container mx-auto px-4">
         <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Text Section -->
            <div class="md:pr-4">
               <h1 class="text-4xl font-bold text-gray-800 mb-4">เกี่ยวกับเรา</h1>
               <p class="text-gray-600 text-lg">เทศบาลตำบลบ้านนาปรือ ตั้งอยู่ในตำบลเนินหอม อำเภอเมืองปราจีนบุรี จังหวัดปราจีนบุรี
                   เดิมเป็นเขตสุขาภิบาลชื่อ "เขตสุขาภิบาลบ้านนาปรือ" ต่อมาได้เปลี่ยนจากเขตสุขาภิบาลมาเป็นเขตเทศบาลภายใต้
                   พระราชบัญญัติการเปลี่ยนเขตสุขาภิบาลเป็นเทศบาล พ.ศ. พ.ศ. 2542 เมื่อวันที่ 25 พฤษภาคม พ.ศ. 2542 เทศบาลตำบลบ้านนาปรือตั้งอยู่ที่
                   ทางตอนเหนือของจังหวัดปราจีนบุรี ห่างจากตัวจังหวัดประมาณ 16 กิโลเมตร (ศูนย์บริหารจังหวัดปราจีนบุรี)
                   และห่างจากกรุงเทพฯ ประมาณ 153 กิโลเมตร</p>
            </div>
            
            <!-- Image Section -->
            <div class="mt-4 md:mt-0">
               <img src="images/about-img.jpg" alt="About Us" class="rounded-lg shadow-lg w-full object-cover">
            </div>
         </div>
      </div>
   </div>
   <!-- About Section End -->
<?php include_once('footer.php'); ?>
</body>
</html>
