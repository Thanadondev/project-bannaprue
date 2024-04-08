<style>
  .navbar-3d {
    background: linear-gradient(145deg, #2f855a, #2c7a7b);
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
  }

  .navbar-3d:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.25);
  }
</style>


<div class="navbar bg-gradient-to-r from-green-500 to-green-700 text-white navbar-3d">
  <div class="container mx-auto flex justify-between items-center py-2 px-4">
    <!-- Logo and Navbar content -->
    <div class="container mx-auto flex justify-between items-center py-2 px-4">
      <!-- Logo on the left -->
      <a href="../index.php" class="text-2xl font-bold text-white flex items-center">
        <!-- <img src="path_to_your_logo.png" alt="Logo" class="h-8 w-8 mr-2"> -->
        BANNAPRUE
      </a>

      <!-- Navigation Links on the right -->
      <div class="hidden md:flex items-center space-x-4">
        <a href="../user/" class="hover:bg-green-800 rounded px-4 py-2 transition duration-300">เข้าสู่หน้าสมาชิก</a>
        <a href="../index.php" class="hover:bg-green-800 rounded px-4 py-2 transition duration-300">หน้าแรก</a>
        <a href="../about.php" class="hover:bg-green-800 rounded px-4 py-2 transition duration-300">เกี่ยวกับเรา</a>
        <a href="../contact.php" class="hover:bg-green-800 rounded px-4 py-2 transition duration-300">ติดต่อเรา</a>
        <!-- Add more links as needed -->
      </div>

      <!-- Mobile Menu Toggle -->
      <div class="md:hidden">
        <button class="text-white hover:text-gray-200 focus:outline-none" onclick="toggleMobileMenu()">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden">
      <a href="./user/login.php" class="block hover:bg-green-800 rounded px-4 py-2 transition duration-300">เข้าสู่หน้าสมาชิก</a>
      <a href="../index.php" class="block hover:bg-green-800 rounded px-4 py-2 transition duration-300">หน้าแรก</a>
      <a href="../about.php" class="block hover:bg-green-800 rounded px-4 py-2 transition duration-300">เกี่ยวกับเรา</a>
      <a href="../contact.php" class="block hover:bg-green-800 rounded px-4 py-2 transition duration-300">ติดต่อเรา</a>
      <!-- Add more mobile links as needed -->
    </div>

  </div>
</div>

<script>
  // JavaScript code remains the same
  function toggleMobileMenu() {
    document.querySelector('.mobile-menu').classList.toggle('hidden');
  }
</script>