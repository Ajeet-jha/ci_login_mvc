<?= $title?>
    <div id="dynamic-div">
        <div class="outter-left">
            <div class="jumbotron" style="width:85%">
                <form name="home_form" id="home_form">
                    <div class="form-group row">
                        <label class="col-4" for="name">First Name</label>
                        <input class="form-control col-7" type="text" id="name" name="name">
                        <!-- <div id="name-error" class="text-danger error"></div> -->
                    </div>
                    <div class="form-group row">
                        <label class="col-4" for="lastname">Last Name</label>
                        <input class="form-control col-7" type="text" id="lastname" name="lastname">
                        <!-- <div id="lastname-error" class="text-danger error"></div> -->
                    </div>

                    <div class="form-group row">
                        <label class="col-4" for="city">City</label>
                        <input class="form-control col-7" type="text" id="city" name="city" minlength="2">
                        <!-- <div id="city-error" class="text-danger error"></div> -->
                    </div>
                    <div class="form-group row">
                        <label class="col-4" for="number">Contact Number</label>
                        <input class="form-control col-7" type="text" name="number" id="number" minlength="10" maxlength="10">
                        <!-- <div id="number-error" class="text-danger error"></div> -->
                    </div>

                    <div class="form-group row">
                        <label class="col-4" for="email">EMAIL</label>
                        <input class="form-control col-7" type="email" name="email" id="email">
                        <!-- <div id="email-error" class="text-danger error"></div> -->
                    </div>
                    <div style="display:flex;justify-content:flex-end">
                        <input style="margin-right:2px" type="submit" class="btn
                        <?= $btn_class;?> float-right" value="<?=$submit;?>" id="submit">
                        <input type="reset" class="btn <?= $btn_class;?>
                            float-right" value="<?=$reset;?>" id="reset">
                    </div>
                </form>
            </div>
        </div>
        <div class="outter-right" style="display:none">
            <table class='table table-hover' style="width:85%" id="table-layout">
                <thead class="thead-dark">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>City</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-data">
                    <tr>
                    </tr>
                </tbody>
                <table>
        </div>
    </div>




    <script>
       $(document).ready(function() {

            $('form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    lastname: {
                        required: true,
                        minlength: 2
                    },
                    city: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    number: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    }
                },
                messages: {
                    name: "Please specify your first name",
                    lastname: "Please specify your last name",
                    city: "Please specify your city name",
                    email: {
                        required: "We need your email address !!",
                        email: "Your email address must be in the format of name@domain.com"
                    },
                    number: {
                        required: "We need your number !!",
                        number: "Please enter valid number",
                        minlength: "Please enter 10 digit mobile number"
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/user/form/signupDB",
                        data: $(form).serializeArray(),
                        success: function(res) {
                            console.log(res);
                        }
                    })
                },
                errorElement: 'div',
                errorLabelContainer: '.errorTxt'
            });

        });


    </script>