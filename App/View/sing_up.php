<?php
    session_start();
if(isset($_SESSION['user'])){
    header("location:/YouDemy/public/index.php");
}
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/layout/header.php';
$error = isset($_SESSION['error']) ? $_SESSION['error'] : [];

$name = $email = $password = "";



extract(isset($_SESSION['old']) ? $_SESSION['old'] : []);
// print_r($_SESSION);

$_SESSION['old'] = null;
$_SESSION['error'] = null;
?>
<?php include_once __DIR__ . '/layout/header.php'; ?>
<section class="bg-black dark:bg-gray-900">
    <div class="flex justify-center min-h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/5" style="background-image: url('https://images.unsplash.com/photo-1494621930069-4fd4b2e24a11?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=715&q=80')">
        </div>
        <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-white capitalize dark:text-white">
                    Get your free account now.
                </h1>

                <p class="mt-4 text-gray-300 dark:text-gray-400">
                    Let’s get you all set up so you can verify your personal account and begin setting up your profile.
                </p>

                
                <form class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2" action="/YouDemy/router/web.php" method="POST">
                    <input type="hidden" name="url" value="signUp">
                    <div class="mt-6 col-span-2">
                        <h1 class="text-gray-300 dark:text-gray-300">Select type of account</h1>
    
                        <div class="mt-3 md:flex md:items-center md:-mx-2">
                            <label class="flex items-center">
                                <input type="radio" name="accountType" value="student" class="hidden peer" id="student" />
                                <span class="flex items-center justify-center w-full px-6 py-3 text-red-500 border border-red-500 rounded-lg cursor-pointer md:w-auto md:mx-2 dark:border-red-400 dark:text-red-400 hover:bg-red-500 hover:text-white transition duration-200 peer-checked:bg-red-500 peer-checked:text-white">
                                    <span class="mx-2">Student</span>
                                </span>
                            </label>
                            
                            <label class="flex items-center mt-4 md:mt-0">
                                <input type="radio" name="accountType" value="teacher" class="hidden peer" id="teacher" />
                                <span class="flex items-center justify-center w-full px-6 py-3 text-red-500 border border-red-500 rounded-lg cursor-pointer md:w-auto md:mx-2 dark:border-red-400 dark:text-red-400 hover:bg-red-500 hover:text-white transition duration-200 peer-checked:bg-red-500 peer-checked:text-white">
                                    <span class="mx-2">Teacher</span>
                                </span>
                            </label>
                        </div>
                    <h1 class="text-red-600"><?php echo $error['role'] ?? ''; ?></h1>

                        </div>
                    <div>
                        <label class="block mb-2 text-sm text-gray-300 dark:text-gray-200">Full Name</label>
                        <input type="text" name="name" value="<?=isset($name)?$name:''?>" placeholder="John" class="block w-full px-5 py-3 mt-2 text-white placeholder-gray-400 bg-gray-800 border border-gray-600 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-red-400 dark:focus:border-red-400 focus:ring-red-400 focus:outline-none focus:ring focus:ring-opacity-40"/>
                    <h1 class="text-red-600"><?php echo $error['name'] ?? ''; ?></h1>

                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-300 dark:text-gray-200">Email Address</label>
                        <input type="text" name="email" value="<?=isset($email)?$email:''?>" placeholder="johnsnow@example.com" class="block w-full px-5 py-3 mt-2 text-white placeholder-gray-400 bg-gray-800 border border-gray-600 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-red-400 dark:focus:border-red-400 focus:ring-red-400 focus:outline-none focus:ring focus:ring-opacity-40"/>
                        <h1 class="text-red-600"><?php echo $error['email'] ?? ''; ?></h1>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-300 dark:text-gray-200">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" class="block w-full px-5 py-3 mt-2 text-white placeholder-gray-400 bg-gray-800 border border-gray-600 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-red-400 dark:focus:border-red-400 focus:ring-red-400 focus:outline-none focus:ring focus:ring-opacity-40"/>
                    <h1 class="text-red-600"><?php echo $error['password'] ?? ''; ?></h1>

                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-300 dark:text-gray-200">Confirm Password</label>
                        <input type="password" name="pswComfirmation" placeholder="Re-enter your password" class="block w-full px-5 py-3 mt-2 text-white placeholder-gray-400 bg-gray-800 border border-gray-600 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-red-400 dark:focus:border-red-400 focus:ring-red-400 focus:outline-none focus:ring focus:ring-opacity-40"/>
                    </div>
                    
                    <div class="flex items-center w-full col-span-2 gap-2">
                        <button name="submit"
                            class="w-1/2 flex items-center justify-between px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-red-500 rounded-lg hover:bg-red-400 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-50">
                            <span>Sign Up</span>
                        </button>
                    </div>
                    
                    <div class="flex justify-between col-span-2 mt-4">
                        <p class="text-white capitalize">I have an account? <a href="./logIn.php" class="text-red-500 hover:underline">Login</a></p>
                        <a href="/YouDemy/public/index.php" class="items-center justify-between px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-red-500 rounded-lg hover:bg-red-400 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-50">
                            Back to Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>