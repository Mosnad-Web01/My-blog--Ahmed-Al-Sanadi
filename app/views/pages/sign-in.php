<section class="grid text-center p-8 bg-gradient-to-b from-white to-blue-50">
  <div class="bg-white shadow-lg rounded-lg border border-blue-300 p-8 mx-auto max-w-[26rem]">
    <h3 class="text-3xl font-semibold mb-2 text-blue-900">Sign In</h3>
    <p class="text-base text-blue-600 mb-8">Enter your email and password to sign in</p>
  
    <form action="/my-blog/handle-sign-in" method="POST" class="text-left">
      <div class="mb-6">
        <label for="email" class="block font-medium text-blue-900 mb-2">Your Email</label>
        <input
          id="email"
          type="email"
          name="email"
          value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
          placeholder="name@mail.com"
          class="w-full h-11 px-3 py-3 text-sm rounded-md border border-blue-300 focus:border-blue-600 focus:ring focus:ring-blue-200 transition duration-200"
        />
        <?php if (!empty($_SESSION['errors']['email'])): ?>
          <p class="text-red-500 text-sm mt-2"><?= $_SESSION['errors']['email'] ?></p>
        <?php endif; ?>
      </div>

      <div class="mb-4">
        <label for="password" class="block font-medium text-blue-900 mb-2">Password</label>
        <div class="relative w-full h-11">
          <input
            type="password"
            name="password"
            id="password"
            placeholder="********"
            class="w-full h-11 px-3 py-3 text-sm rounded-md border border-blue-300 focus:border-blue-600 focus:ring focus:ring-blue-200 transition duration-200 pr-10"
          />
          <div class="absolute inset-y-0 right-3 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-blue-600">
              <!-- Icon for show/hide password can go here -->
            </svg>
          </div>
        </div>
        <?php if (!empty($_SESSION['errors']['password'])): ?>
          <p class="text-red-500 text-sm mt-2"><?= $_SESSION['errors']['password'] ?></p>
        <?php endif; ?>
      </div>

      <button class="w-full py-3.5 bg-blue-900 text-white rounded-lg font-bold uppercase mt-4 hover:bg-blue-800 transition duration-200">
        Sign in
      </button>

      <?php if (!empty($_SESSION['errors']['general'])): ?>
        <p class="text-red-500 text-sm mt-4 text-center"><?= $_SESSION['errors']['general'] ?></p>
      <?php endif; ?>

      <p class="text-sm text-blue-700 mt-4 text-center">
        Not registered? <a href="/my-blog/sign-up" class="font-medium text-blue-900 hover:underline">Create account</a>
      </p>
    </form>
  </div>
</section>

<?php
// Clear errors after displaying
unset($_SESSION['errors']);
?>
