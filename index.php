<?php
// เชื่อมต่อฐานข้อมูล
require_once 'config/conn.php';

// ดึงข้อมูลข่าวสาร
$query = "SELECT * FROM news";
$newsItems = $conn->query($query);

// ดึงข้อมูลข่าวสาร
$query = "SELECT * FROM skilled";
$skilledItems = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- site metas -->
   <title>BANNAPRUE</title>
   <link rel="icon" type="image/x-icon" href="./images/logo.png">
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Include Tailwind CSS -->
   <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
   <script src="https://cdn.tailwindcss.com"></script>

   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>

<body class="bg-gray-100 font-sans w-full h-full">
   <!-- header section start -->
   <?php
   include_once('header.php')
   ?>
   <!-- header section end -->

   <!-- News Section Start -->
   <section class="py-1 bg-white">
      <h2 class="text-3xl font-bold text-center mb-3 mt-16">ข่าวสารล่าสุดจากชุมชนบ้านนาปรือ</h2>
      <div class="swiper-container mySwiper mt-16">
         <div class="swiper-wrapper">
            <!-- Dynamic News Items Here -->
            <?php while ($item = $newsItems->fetch(PDO::FETCH_ASSOC)) : ?>
               <div class="swiper-slide">
                  <div class="group relative">
                     <div class="w-full h-72 bg-cover bg-center rounded-lg" style="background-image: url('..\..\uploads<?php echo htmlspecialchars($item['images']); ?>');">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900 rounded-lg"></div>
                     </div>
                     <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-xl font-bold text-white"><?php echo htmlspecialchars($item['title']); ?></h3>
                        <p class="text-base text-gray-400"><?php echo htmlspecialchars(substr($item['description'], 0, 100)) . '...'; ?></p>
                        <a href="news_detail.php?id=<?php echo $item['id']; ?>" class="inline-block mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">อ่านเพิ่มเติม</a>
                     </div>
                  </div>
               </div>
            <?php endwhile; ?>
         </div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
      </div>
   </section>
   <!-- News Section End -->
   <!-- About Section -->
   <section class="py-16 bg-white">
      <div class="container mx-auto px-4 max-w-screen-xl">
         <div class="flex flex-wrap -mx-4">
            
            <div class="w-full md:w-1/2 px-4">
               <h2 class="text-4xl font-semibold text-gray-800 mb-5">เราขอนำเสนอระบบ Virtual Exhibition การจัดนิทรรศการที่เสมือนจริง</h2>
               <p class="text-lg text-gray-600 mb-8">
               Virtual Exhibition คือ แพลตฟอร์มนิทรรศการเสมือนจริงแบบ 2D & 3D สำหรับกิจกรรมออนไลน์ของคุณโดยเฉพาะ เป็นการจัดนิทรรศการออนไลน์ที่มีแพลตฟอร์มเหตุการณ์เสมือนจริงที่ดีที่สุด ไม่ว่าจะเป็น งานแสดงสินค้า งานนิทรรศการ งานอีเว้นท์ งานประกวดเสมือนจริง รวมไปถึงมีการนำเสนอทั้งสถานที่ คอนเทนต์งาน จำนวนผู้เข้าชม ชมวีดีโอนำเสนองาน ที่เสมือนจริงในทุก ๆ ด้าน และ มีการสำรวจความพึงพอใจ การให้คะแนนเว็บไซต์อีกต่างหาก
               </p>
               <a href="./output/index.php" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-5 rounded-lg transition-colors duration-300">
                  เริ่มใช้งาน
               </a>
            </div>
            <div class="w-full md:w-1/2 px-4 flex justify-center mb-6 lg:mb-0">
               <img src="images/fairs-exhibition-banner.png" alt="Vex" class="max-w-sm h-52 rounded-lg shadow-lg" />
            </div>
         </div>
      </div>
   </section>

   <!-- About Section End -->
   <!-- About Section -->
   <section class="py-16 bg-white">
      <div class="container mx-auto px-4 max-w-screen-xl">
         <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 px-4 flex justify-center mb-6 lg:mb-0">
               <img src="images/about-img.jpg" alt="About Us" class="max-w-sm h-52 rounded-lg shadow-lg" />
            </div>
            <div class="w-full md:w-1/2 px-4">
               <h2 class="text-4xl font-semibold text-gray-800 mb-5">เกี่ยวกับเรา</h2>
               <p class="text-lg text-gray-600 mb-8">
                  เทศบาลตำบลบ้านนาปรือเป็นองค์กรที่ใส่ใจในการพัฒนาและเสริมสร้างคุณภาพชีวิต...
               </p>
               <a href="about.php" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-5 rounded-lg transition-colors duration-300">
                  อ่านเพิ่มเติม
               </a>
            </div>
         </div>
      </div>
   </section>

   <!-- About Section End -->


   <!-- Heroes Section Start -->
   <section class="py-16 bg-green-100">
      <div class="container mx-auto px-4">
         <!-- Section Heading -->
         <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-green-800">บุคคลทรงคุณค่า</h1>
            <p class="mt-4 text-xl font-light text-green-600">วีรบุรุษในท้องถิ่นของเราและเรื่องราวของพวกเขา</p>
         </div>

         <!-- Cards Container -->
         <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php while ($item = $skilledItems->fetch(PDO::FETCH_ASSOC)) : ?>
               <div class="overflow-hidden rounded-lg shadow-lg transition duration-300 ease-in-out hover:shadow-xl">
                  <!-- Image -->
                  <div class="w-full h-56 bg-cover bg-center rounded-lg" style="background-image: url('..\..\uploads<?php echo htmlspecialchars($item['images']); ?>');">

                  </div>

                  <!-- Content -->
                  <div class="px-6 py-4 bg-white">
                     <h3 class="mb-3 text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($item['name']); ?></h3>
                     <p class="mb-4 text-base text-gray-600"><?php echo htmlspecialchars(substr($item['description'], 0, 100)) . '...'; ?></p>
                     <!-- Read More Button -->
                     <a href="skilled_detail.php?id=<?php echo $item['id']; ?>" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-300">อ่านเพิ่มเติม</a>
                  </div>
               </div>
            <?php endwhile; ?>
         </div>
      </div>
   </section>
   <!-- Heroes Section End -->



   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
   <script>
      var mySwiper = new Swiper('.mySwiper', {
         // Default parameters
         slidesPerView: 1,
         spaceBetween: 2,
         loop: true,
         pagination: {
            el: '.swiper-pagination',
            clickable: true,
         },
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
         },
         // Responsive breakpoints
         breakpoints: {
            640: {
               slidesPerView: 2,
               spaceBetween: 20,
            },
            768: {
               slidesPerView: 3,
               spaceBetween: 30,
            },
            1024: {
               slidesPerView: 3,
               spaceBetween: 40,
            },
         }
      });
   </script>
   <?php
   include_once('footer.php')
   ?>
</body>

</html>