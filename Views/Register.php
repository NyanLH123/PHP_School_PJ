<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-neutral-100 flex items-center justify-center px-4">

  <div class="w-full max-w-md bg-white rounded-xl shadow-lg border border-neutral-200">
    <div class="p-8">
      
      <!-- Header -->
      <div class="mb-8 text-center">
        <h1 class="text-2xl font-semibold text-neutral-900">
          Create Account
        </h1>
        <p class="mt-2 text-sm text-neutral-500">
          Join us in just a few steps
        </p>
      </div>

      <!-- Form -->
      <form class="space-y-5" action="../Public/Index.php?action=register" method="POST">

        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">
            Full Name
          </label>
          <input
            type="text"
            name="name"
            placeholder="John Doe"
            class="w-full rounded-lg border border-neutral-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-1 focus:ring-neutral-600 focus:border-neutral-900"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">
            Email Address
          </label>
          <input
            type="email"
            name="email"
            placeholder="you@example.com"
            class="w-full rounded-lg border border-neutral-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-1 focus:ring-neutral-600 focus:border-neutral-900"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">
            Password
          </label>
          <input
            type="password"
            name="password"
            placeholder="••••••••"
            class="w-full rounded-lg border border-neutral-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-1 focus:ring-neutral-600 focus:border-neutral-900"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">
            Confirm Password
          </label>
          <input
            type="password"
            name="confirm_password"
            placeholder="••••••••"
            class="w-full rounded-lg border border-neutral-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-1 focus:ring-neutral-600 focus:border-neutral-900"
          />
        </div>

        <!-- Button -->
        <button
          type="submit"
          class="w-full rounded-lg bg-neutral-900 py-3 text-sm font-medium text-white transition hover:bg-neutral-800 focus:outline-none focus:ring-1 focus:ring-neutral-600 focus:ring-offset-2"
        >
          Create Account
        </button>

      </form>

      <!-- Footer -->
      <p class="mt-6 text-center text-sm text-neutral-500">
        Already have an account?
        <a href="Login.php" class="font-medium text-neutral-900 hover:underline">
          Sign in
        </a>
      </p>

    </div>
  </div>

</body>
</html>
