<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/worker-sign.css">
    <script defer src="./js/worker-sign.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="form-control signup-form">
                <form action="./incldes/worker-signup.inc.php" method="post" enctype="multipart/form-data">
                    <h2>Signup</h2>
                    <input type="text" placeholder="First Name" name="fname" required />
                    <input type="text" placeholder="Last Name" name="lname" required />
                    <input type="text" placeholder="Username" name="username" required />
                    <input type="email" placeholder="Email" name="email" required />
                    <input type="password" placeholder="Password" name="pwd" required />
                    <input type="password" placeholder="Confirm password" name="cpwd" required />
                    <div class="checkbok">
                        <div class="checkbok-col1">
                            <label for="Interior design">Interior design <input type="checkbox" id="Interior design" name="profession[]" value="interior design"></label>
                            <label for="Contractor">Contractor<input type="checkbox" id="Contractor" name="profession[]" value="Contractor"></label>
                            <label for="Plumber">Plumber<input type="checkbox" id="plumber" name="profession[]" value="plumber"></label>
                        </div>
                        <div class="checkbok-col2">
                            <label for="Electrician">Electrician<input type="checkbox" id="Electrician" name="profession[]" value="Electrician"></label>
                            <label for="Painter">Painter<input type="checkbox" id="Painter" name="profession[]" value="Painter"></label>
                        </div>
                    </div>
                    <input type="file" accept="image/*" id="file" name="img" required />
                    <label class="file" for="file"><i class="fa-solid fa-user-plus"></i><i class="fa-solid fa-check"></i>
                        <p id="uploadMsg"> Select profile picture </p>
                    </label>
                    <input type="text" placeholder="Area" name="area" required />
                    <input type="date" required name="dob" />
                    <input type="text" placeholder="Phone" name="phone" required />
                    <input type="number" placeholder="Exprience years" name="exp" required />
                    <input type="number" placeholder="Bank account" name="bank" required />
                    <input type="number" placeholder="Social security number" name="ssn" required />
                    <button type="submit" name="submit-sign-up"> Signup </button>
                </form>
            </div>
            <div class="form-control signin-form">
                <form action="./incldes/worker-login.inc.php" method="post" enctype="multipart/form-data">
                    <h2>Signin</h2>
                    <input type="text" placeholder="Username" name="username" required />
                    <input type="password" placeholder="Password" name="pwd" required />
                    <button type="submit" name="submit-sign-in">Signin</button>
                </form>
            </div>
        </div>
        <div class="intros-container">
            <div class="intro-control signin-intro">
                <div class="intro-control__inner">
                    <h2>Welcome back!</h2>
                    <p>
                        Welcome back! We are so happy to have you here. It's great to see you again. We hope you had a safe and enjoyable time away.
                    </p>
                    <button id="signup-btn">No account yet? Signup.</button>
                </div>
            </div>
            <div class="intro-control signup-intro">
                <div class="intro-control__inner">
                    <h2>Come join us!</h2>
                    <p>
                        We are so excited to have you here.If you haven't already, create an account to get access to exclusive offers, rewards, and discounts.
                    </p>
                    <button id="signin-btn">Already have an account? Signin.</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>