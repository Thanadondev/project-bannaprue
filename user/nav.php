<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center text-center">
                <div class="flex-shrink-0">
                    <a href="index.php" class="text-white font-bold text-xl tracking-wider">บริการสมาชิก</a>
                </div>
                <div class="hidden md:flex ml-10 space-x-4">
                    <a href="get_line.php" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition duration-150 ease-in-out">เข้ากลุ่ม LINE</a>
                    <a href="cancel_user.php" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition duration-150 ease-in-out">ยกเลิกการเป็นสมาชิก</a>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <button onclick="navbarToggle()" class="p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="mobile-menu hidden md:hidden">
        <a href="get_line.php" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">เข้ากลุ่ม LINE</a>
        <a href="cancel_user.php" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">ยกเลิกการเป็นสมาชิก</a>
        <a href="logout.php" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">Log out</a>
    </div>
</nav>

<script>
    function navbarToggle() {
        document.querySelector('.mobile-menu').classList.toggle('hidden');
    }
</script>
