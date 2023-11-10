<?php
session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    $workerid = $_GET["id"];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/request.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <title>Document</title>
    </head>

    <body>
        <div id="progress">
            <div id="progress-bar"></div>
            <ul id="progress-num">
                <li class="step active"></li>
                <li class="step">1</li>
            </ul>
        </div><br>
        <div class="container">
            <h1>Request Form</h1>
            <form action="./incldes/request.inc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="uid" value="<?php echo $userid; ?>">
                <input type="hidden" name="wid" value="<?php echo $workerid; ?>">
                <input type="text" name="address" placeholder="Project location" required>
                <input type="number" name="Room-Number" placeholder="Room Number" required>
                <div class="select-wrapper">
                    <select name="Room-type[]" class="Room-type" multiple>
                        <option value="Bedroom">Bedroom</option>
                        <option value="Living room">Living room</option>
                        <option value="Kitchen">Kitchen</option>
                        <option value="Roof">Roof</option>
                        <option value="Dining room">Dining room</option>
                        <option value="Garden">Garden</option>
                        <option value="Washroom">Washroom</option>
                        <option value="Basement">Basement</option>
                    </select>
                </div>
                <input type="date" name="sdate" required>
                <div class="file-input-wrapper">
                    <input type="file" name="Your-design" id="Your-design" required>
                    <label for="Your-design">Upload a design</label>
                    <div class="file-name">No file selected</div>
                </div>
                <textarea name="Massage" placeholder="Special instructions"></textarea>
                <input type="submit" name="request" value="Submit" class="button">
            </form>
        </div>
        <!-- <div id="alert">
        <div class="message">Your request has been sent successfully.<br><br> Return to home page.</div><br>
        <a class="yes" href="./index.php">OK</a>
     </div> -->
        <script src="./js/request.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.Room-type').select2({
                    placeholder: 'Select room type(s)',
                    allowClear: true
                });
                $('#Your-design').change(function() {
                    var fileName = $(this).val().split('\\').pop();
                    if (fileName) {
                        $(this).siblings('.file-name').text('Uploaded: ' + fileName);
                    } else {
                        $(this).siblings('.file-name').text('No file selected');
                    }
                });
            });
        </script>
    </body>

    </html>
    </body>

    </html>
<?php } else {
    echo 'sign in first';
} ?>