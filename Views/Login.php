<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-neutral-100 flex items-center justify-center px-4">

  <div class="w-full max-w-md bg-white rounded-xl shadow-lg border border-neutral-200">
    <div class="p-8">

      <!-- Header -->
      <div class="mb-8 text-center">
        <h1 class="text-2xl font-semibold text-neutral-900">
          Welcome Back
        </h1>
        <p class="mt-2 text-sm text-neutral-500">
          Sign in to continue
        </p>
      </div>

      <!-- Form -->
      <form class="space-y-5" action="Index.php?action=login" method="POST">

        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">
            Email Address
          </label>
          <input
            type="email"
            name="email"
            placeholder="you@example.com"
            required
            class="w-full rounded-lg border border-neutral-300 px-4 py-2.5 text-sm
                   focus:outline-none focus:ring-1 focus:ring-neutral-600 focus:border-neutral-900"
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
            required
            class="w-full rounded-lg border border-neutral-300 px-4 py-2.5 text-sm
                   focus:outline-none focus:ring-1 focus:ring-neutral-600 focus:border-neutral-900"
          />
        </div>

        <!-- Button -->
        <button
          type="submit"
          class="w-full rounded-lg bg-neutral-900 py-3 text-sm font-medium text-white
                 transition hover:bg-neutral-800
                 focus:outline-none focus:ring-1 focus:ring-neutral-600 focus:ring-offset-2"
        >
          Sign In
        </button>

      </form>

      <!-- Footer -->
      <p class="mt-6 text-center text-sm text-neutral-500">
        Don’t have an account?
        <a href="Register.php" class="font-medium text-neutral-900 hover:underline">
          Create one
        </a>
      </p>

    </div>
  </div>

</body>
</html>
