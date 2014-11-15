<div class="col-sm-4">

  <h1 class="text-center">Register</h1>

  <form role="form" action="index.php?page=Users&action=add" method="post">

    <!-- Email Already Registered -->
    <div class="form-group">
        <?php if (isset($errors['clone']) && $errors['clone'] === true ) : ;?>
            <p><span style="color:red;">You remail has already been registered. Are you sure you're not a clone?</span></p>
        <?php endif; ?>
    </div>


    <!--  Email  -->
    <div class="form-group">
        <label for="email">Email
            <?php if ( isset($errors['email']) && $errors['email']) : ; ?>
                <span style="color:red;">Your email is not valid!</span>
            <?php endif; ?>
        </label>
        <input <?php if ( isset($data['email'])) echo 'value = \''.$data['email'].'\''; ?> type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
    </div>


    <!-- Password -->
    <div class="form-group">
        <label for="password">Password
            <?php if ( isset($errors['password']) && $errors['password']) : ; ?>
                <span style="color:red;">Your password must include 1 lowercase letter, 1 uppercase letter, and 1 digit.</span>
            <?php endif; ?>
        </label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
    </div>


    <!-- Confirm Password -->
    <div class="form-group">
        <label for="re_password">Confirm Password
            <?php if ( isset($errors['re_password']) && $errors['re_password']) : ; ?>
                <span style="color:red;">Your passwords did not match!</span>
            <?php endif; ?>
        </label>
        <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Confirm Password" required>
    </div>


    <!-- Real Name -->
    <div class="form-group">
        <label for="name">Real Name
            <?php if ( isset($errors['name']) && $errors['name']) : ; ?>
                <span style="color:red;">Your name is not valid!</span>
            <?php endif; ?>
        </label>
        <input <?php if ( isset($data['name'])) echo 'value = \''.$data['name'].'\''; ?> type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
    </div>

    <label>Gender</label>


    <!-- Gender Options -->
    <div class="form-group">
        <label class="radio-inline">
            <input <?php if ( isset($data['gender']) && $data['gender'] === 'male') echo 'checked'; ?> type="radio" name="gender" value="male" id="male"> Male
        </label>
        <label class="radio-inline">
            <input <?php if ( isset($data['gender']) && $data['gender'] === 'female') echo 'checked'; ?> type="radio" name="gender" value="female" id="female"> Female
        </label>
    </div>


    <!-- Birthday selector -->
    <div class="controlls form-inline form-group">
        <label>
            <select name="birth_day" id="birth_day"></select> Day
        </label>
        <label>
            <select name="birth_month" id="birth_month"></select> Month
        </label>
        <label>
            <select name="birth_year" id="birth_year"></select> Year
        </label>
    </div>


    <!-- Captcha -->
    <label for="email">
        <?php if ( isset($errors['captcha']) && $errors['captcha']) : ; ?>
            <span style="color:red;">Your captcha is not the most valid thing I've ever seen...</span>
        <?php endif; ?>
    </label>

    <?php
        echo \core\wrapper\CaptchaWrapper::createCaptcha(__ENVIRONMENT__)->html();
     ?>

    <!-- Birthday selector script -->
    <script type="text/javascript">

        var currentYear = 2014;

        var months = [
            {'name' : 'January', 'length' : 31 },
            {'name' : 'February', 'length' : 28},
            {'name' : 'March', 'length' : 31},
            {'name' : 'April', 'length' : 30},
            {'name' : 'May', 'length' : 31},
            {'name' : 'June', 'length' : 30},
            {'name' : 'July', 'length' : 31},
            {'name' : 'August', 'length' : 30},
            {'name' : 'September', 'length' : 31},
            {'name' : 'October', 'length' : 30},
            {'name' : 'November', 'length' : 31},
            {'name' : 'December', 'length' : 30},
        ];

        var dayElement = document.getElementById('birth_day');
        var monthElement = document.getElementById('birth_month');
        var yearElement = document.getElementById('birth_year');

        var data = '';
        for ( var x in months ) {
            data +='<option value=\'' + (parseInt(x)+1).toString() + '\'>' + months[x].name + '</option>';
        }
        monthElement.innerHTML = data;
        monthElement.addEventListener('change', change);

        data = '';
        for ( var i = currentYear ; i >= 1900 ; i -- ) {
            data += '<option>' + parseInt(i).toString() + '</option>';
        }
        yearElement.innerHTML = data;

        change ();

        function change()
        {
            var data = '';
            var maxDay = months[monthElement.selectedIndex].length;

            for ( var i = 1; i <= maxDay ; i++ ) {
                data += '<option>' + parseInt(i).toString() + '</option>';
            }

            dayElement.innerHTML = data;
        }
    </script>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>