<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-gray-100">
    <?php include_once('header.php'); ?>
    <div class="container mx-auto px-4 py-8">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                <span class="text-xl inline-block mr-5 align-middle">
                    <i class="fas fa-bell" /></i>
                </span>
                <span class="inline-block align-middle mr-8">
                    <b class="capitalize">Error!</b> <?= $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']); ?>
                </span>
            </div>
        <?php endif; ?>
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="md:flex">
                <div class="w-full p-8">
                    <h2 class="block text-gray-800 text-3xl font-bold mb-6 text-center">ติดต่อเรา</h2>
                    <p class="text-gray-600 mb-8">
                    หากคุณมีคำถามใด ๆ โปรดอย่าลังเลที่จะติดต่อเราได้ที่
                        <a href="mailto:admin@bannaprue.go.th" class="text-blue-600 hover:underline">admin@bannaprue.go.th</a>.
                    </p>
                    <form action="submit_contact.php" method="POST" class="space-y-4">
                        <div>
                            <label class="text-gray-600 font-semibold" for="name">ชื่อ</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="text-gray-600 font-semibold" for="email">อีเมลล์</label>
                            <input type="email" name="email" id="email" required class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="text-gray-600 font-semibold" for="subject">หัวข้อ</label>
                            <input type="text" name="subject" id="subject" required class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="text-gray-600 font-semibold" for="message">ข้อความ</label>
                            <textarea rows="4" name="message" id="message" required class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="py-2 px-8 bg-blue-600 text-white font-bold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                ส่ง
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto mt-10">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800 text-center">แผนที่</h2>
            <div class="aspect-w-16 aspect-h-9">
                <iframe class="rounded-lg shadow-lg" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2294.2888680986002!2d101.352228!3d14.176787!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311c531555555555%3A0xcd178c26cfc1b341!2z4Liq4Liz4LiZ4Lix4LiB4LiH4Liy4LiZ4LmA4LiX4Lio4Lia4Liy4Lil4LiV4Liz4Lia4Lil4Lia4LmJ4Liy4LiZ4LiZ4Liy4Lib4Lij4Li34Lit!5e1!3m2!1sth!2sth!4v1712571586913!5m2!1sth!2sth" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>

</html>