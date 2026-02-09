<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Food Recipes</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-neutral-100 min-h-screen">

  <!-- Navbar -->
  <header class="bg-white border-b border-neutral-200">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <h1 class="text-xl font-semibold text-neutral-900">FoodRecipes</h1>
      <nav class="space-x-6 text-sm text-neutral-600">
        <a href="#" class="hover:text-neutral-900">Home</a>
        <a href="#" class="hover:text-neutral-900">Recipes</a>
        <a href="#" class="hover:text-neutral-900">Login</a>
      </nav>
    </div>
  </header>

  <!-- Hero -->
  <section class="max-w-7xl mx-auto px-6 py-12 text-center">
    <h2 class="text-3xl font-semibold text-neutral-900">
      Simple & Delicious Recipes
    </h2>
    <p class="mt-3 text-neutral-500">
      Discover hand-picked recipes made for everyday cooking
    </p>
  </section>

  <!-- Recipe Grid -->
  <section class="max-w-7xl mx-auto px-6 pb-16">
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

      <!-- Recipe Card -->
      <div class="bg-white rounded-xl border border-neutral-200 shadow-sm overflow-hidden">
        <img
          src="https://source.unsplash.com/600x400/?pasta"
          alt="Pasta"
          class="h-48 w-full object-cover"
        />
        <div class="p-5">
          <h3 class="text-lg font-medium text-neutral-900">
            Creamy Pasta
          </h3>
          <p class="mt-2 text-sm text-neutral-500">
            A rich and creamy pasta recipe ready in 30 minutes.
          </p>
          <a
            href="#"
            class="inline-block mt-4 text-sm font-medium text-neutral-900 hover:underline"
          >
            View Recipe →
          </a>
        </div>
      </div>

      <!-- Recipe Card -->
      <div class="bg-white rounded-xl border border-neutral-200 shadow-sm overflow-hidden">
        <img
          src="https://source.unsplash.com/600x400/?burger"
          alt="Burger"
          class="h-48 w-full object-cover"
        />
        <div class="p-5">
          <h3 class="text-lg font-medium text-neutral-900">
            Classic Beef Burger
          </h3>
          <p class="mt-2 text-sm text-neutral-500">
            Juicy beef burger with fresh vegetables and sauce.
          </p>
          <a
            href="#"
            class="inline-block mt-4 text-sm font-medium text-neutral-900 hover:underline"
          >
            View Recipe →
          </a>
        </div>
      </div>

      <!-- Recipe Card -->
      <div class="bg-white rounded-xl border border-neutral-200 shadow-sm overflow-hidden">
        <img
          src="https://source.unsplash.com/600x400/?salad"
          alt="Salad"
          class="h-48 w-full object-cover"
        />
        <div class="p-5">
          <h3 class="text-lg font-medium text-neutral-900">
            Fresh Green Salad
          </h3>
          <p class="mt-2 text-sm text-neutral-500">
            Light, healthy salad with a refreshing dressing.
          </p>
          <a
            href="#"
            class="inline-block mt-4 text-sm font-medium text-neutral-900 hover:underline"
          >
            View Recipe →
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t border-neutral-200">
    <div class="max-w-7xl mx-auto px-6 py-6 text-center text-sm text-neutral-500">
      © 2026 FoodRecipes. All rights reserved.
    </div>
  </footer>

</body>
</html>
