<?php
session_start();
if(isset($_SESSION['user'])){
    header("location:../public/index.php");
}


$error = isset($_SESSION['error']) ? $_SESSION['error'] : [];

$name = $email = $password = "";



extract(isset($_SESSION['old']) ? $_SESSION['old'] : []);
// print_r($error);

$_SESSION['old'] = null;
$_SESSION['error'] = null;
?>
<?php include_once __DIR__ . '/layouts/header.php'; ?>

<section class="bg-black dark:bg-gray-900">
    <div class="flex justify-center min-h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/5" style="background-image: url('https://images.unsplash.com/photo-1494621930069-4fd4b2e24a11?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=715&q=80')">
        </div>

        <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-white capitalize dark:text-white">
                    Welcome Back!
                </h1>

                

                <p class="mt-4 text-gray-300 dark:text-gray-400">
                    Please enter your credentials to access your account.
                </p>

                <form class="grid grid-cols-1 gap-6 mt-8" action="/YouDemy/router/web.php" method="POST">
                    <input type="hidden" name="url" value="logIn">
                    <div>
                        <label class="block mb-2 text-sm text-gray-300 dark:text-gray-200">Email Address</label>
                        <input type="email" name="email" placeholder="you@example.com" class="block w-full px-5 py-3 mt-2 text-white placeholder-gray-400 bg-gray-800 border border-gray-600 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-red-400 dark:focus:border-red-400 focus:ring-red-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>
                        <h1 class='text-red-600'><?=isset($error['email'])?$error['email']:"" ?></h1>
                    <div>
                        <label class="block mb-2 text-sm text-gray-300 dark:text-gray-200">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" class="block w-full px-5 py-3 mt-2 text-white placeholder-gray-400 bg-gray-800 border border-gray-600 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-red-400 dark:focus:border-red-400 focus:ring-red-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <button
                        name="submit"
                        class="flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-red-500 rounded-lg hover:bg-red-400 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-50">
                        <span>Login</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
                <div class="flex justify-between mt-4">
                    <a href="/YouDemy/public/index.php" class="text-red-500 hover:underline">Go to Home</a>
                    <p class="text-white capitalize">Don't have an account? <a href="./signUp.php" class="text-red-500 hover:underline">Sign up now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>