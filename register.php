<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/resgister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <a href="./index.php" class="back-btn"> <i class="fa-solid fa-chevron-left"></i>Back </a> 
    <div class="white"></div>
    <section class="sign-up-container"> 
            <div class="sign-up-img">
               <h1> Welcome </h1>
               
            </div>
            <div class="sign-up">
                <header>
                        <h1> Register </h1>
                        <p>Plase fill your information bellow</p>
                    </header>
                        <form action="./incldes/signup.inc.php" method="post">
                            <div class="row">
                                <div class="input-text">
                                    <input type="text" name="fname" required="Firstname">
                                    <label for="First name">First name*</label>
                                    <span></span>
                                </div>
                                <div class="input-text">
                                    <input type="text" name="lname" required="lastname">
                                    <label for="Last name">Last name*</label>
                                    <span></span>
                                </div>
                            </div>
                            <div class="input-text">
                                <input type="text" name="email" required="email">
                                <label for="email">Email*</label>
                                <span></span>
                                <i class="fa-solid fa-envelope"></i>
                             </div>
                            <div class="row">
                                <div class="input-text">
                                    <input type="text" name="username" required="username">
                                    <label for="username">Username*</label>
                                    <span></span>
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="input-text">
                                    <input id="pass" type="password" name="password" required="password">
                                    <label for="Password">Password*</label>
                                    <span></span>
                                    <i id="pass-icon" class="fa-solid fa-eye-slash"></i>
                                </div>
                        </div>
                            <div class="row">
                                <div class="input-text">
                                    <input id="cpass" type="password" name="Cpassword" required="Cpassword">
                                    <label for="CPassword">Confirm password*</label>
                                    <span></span>
                                    <i id="cpass-icon" class="fa-solid fa-eye-slash"></i>
                                </div>
                                <div class="input-text">
                                    <input type="tel" name="phone" required="phone">
                                    <label for="phone">Phone*</label>
                                    <span></span>
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-text">
                                    <input type="text" onfocus="this.type='date'"onblur="if(!this.value)this.type='text'" name="dob" required="dob">
                                    <label for="dob">Date of Birth*</label>
                                    <span></span>
                                    <i class="fa-regular fa-calendar"></i>
                                </div>
                                <div class="input-gender">
                                     Gender*:
                                    <label>
                                        <input type="radio" name="gender" value="male" checked>
                                        <span class="design"></span>
                                        <span class="value">Male</span>
                                      </label>
                                      <label>
                                        <input type="radio" name="gender" value="female">
                                        <span class="design"></span>
                                        <span class="value">Female</span>
                                      </label>
                                </div>
                            </div>   
                            <div class="input-text">
                                    <input type="text" name="ssn" required="ssn">
                                    <label for="ssn">Social security number*</label>
                                    <span></span>
                                    <i class="fa-solid fa-phone"></i>
                                </div> 
                            <div class="terms">
                                    <label>
                                        <input type="radio">
                                        <span class="design"></span>
                                        <span class="value"> I Accept tearms and conditions & privacy policy </span>
                                    </label>
                                </div>  
                            <div class="signup-btn">
                                <input type="submit" name="submit" value="Crate account">
                            </div>
                        </form>
                    </div>
    </section>
    <script src="./js/register.js"></script>
</body>
</html>