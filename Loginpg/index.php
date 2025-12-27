<?php require "auth.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login & Signup</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-indigo-600 to-blue-500 flex items-center justify-center min-h-screen">

<div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-2xl">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Welcome</h2>

    <?php if(!empty($message)): ?>
        <div class="mb-4 bg-yellow-100 text-yellow-700 px-3 py-2 rounded">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="flex mb-4 border rounded-lg overflow-hidden">
        <button onclick="showForm('login')" id="loginBtn"
                class="w-1/2 py-2 text-center bg-indigo-600 text-white font-semibold">
            Sign In
        </button>
        <button onclick="showForm('signup')" id="signupBtn"
                class="w-1/2 py-2 text-center bg-gray-200 text-gray-700 font-semibold">
            Sign Up
        </button>
    </div>

    <!-- LOGIN FORM -->
    <form method="POST" id="loginForm" class="space-y-4">
        <input type="hidden" name="action" value="login">
        <input type="text" name="username" placeholder="Username"
               class="w-full border rounded px-3 py-2" required>
        <input type="password" name="password" placeholder="Password"
               class="w-full border rounded px-3 py-2" required>
        <button class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
            Login
        </button>
    </form>

    <!-- SIGNUP FORM -->
    <form method="POST" id="signupForm" class="space-y-4 hidden">
        <input type="hidden" name="action" value="signup">
        <input type="text" name="username" placeholder="Choose Username"
               class="w-full border rounded px-3 py-2" required>
        <input type="password" name="password" placeholder="Create Password"
               class="w-full border rounded px-3 py-2" required>
        <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
            Create Account
        </button>
    </form>
</div>

<script>
function showForm(type) {
    const loginForm = document.getElementById("loginForm");
    const signupForm = document.getElementById("signupForm");
    const loginBtn = document.getElementById("loginBtn");
    const signupBtn = document.getElementById("signupBtn");

    if (type === "login") {
        loginForm.classList.remove("hidden");
        signupForm.classList.add("hidden");
        loginBtn.classList.add("bg-indigo-600","text-white");
        signupBtn.classList.remove("bg-indigo-600","text-white");
        signupBtn.classList.add("bg-gray-200","text-gray-700");
    } else {
        signupForm.classList.remove("hidden");
        loginForm.classList.add("hidden");
        signupBtn.classList.add("bg-indigo-600","text-white");
        loginBtn.classList.remove("bg-indigo-600","text-white");
        loginBtn.classList.add("bg-gray-200","text-gray-700");
    }
}
</script>

</body>
</html>
