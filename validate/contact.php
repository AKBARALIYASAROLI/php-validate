<?php include 'contact1.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Info</title>
    <link rel="stylesheet" href="Portfolio.css">
  </head>
  <body>
    <div id="contact-main">
      <h3 class="contact-form">Contact Us</h3>
      
      <div id="contact-info-form" style="width: 900px;height: 240px;">
        
        <form name="contact-info" method="post" onsubmit="return validateForm(this)">

        <div class="input-1">
          <div class="form-input <?php echo $nameErr!="" ? "error": 'success'; ?>">
            <input id="Name" type="text"  name="Name" placeholder="Name" oninput="validateName(this, 'Name')" value="" />
            <p class="errormessage">&nbsp;<?php echo $nameErr;?></p>
          </div>

          <div class="form-input">
            <input id="phone-number" type="text" name="phone-number" placeholder="Phone Number" oninput="validatePhone(this, 'Phone number')" onkeypress="return digitKeyOnly(event)" value="" />
            <p class="errormessage">&nbsp;<?php echo $phonenumberErr;?></p>
          </div>
        </div>
        
        <div class="input-2">
        
          <div class="form-input">
            <input id="email" type="text" name="email" placeholder="Email" oninput="validateEmail(this, 'Email')" value="" />
            <p class="errormessage">&nbsp;<?php echo $emailErr;?></p>
          </div>
          
          <div class="form-input">
            <input id="location" type="text" name="location" placeholder="Location" oninput="validateLocation(this, 'Location')" value="" />
            <p class="errormessage">&nbsp;<?php echo $locationErr;?></p>
          </div>
        </div>

        <div id="submit-but">
          <button type="submit">Submit</button>
       </div>
      </form>
    </div>
  </div>
    <script src="validate.js"></script>
  </body>
</html>