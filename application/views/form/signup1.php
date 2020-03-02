<?= $title ?>
        <div class="jumbotron" style="width:85%">
            <form name="home_form" id="home_form" method = "post">
                <div class="form-group row">
                    <label class="col-3" for="name">First Name</label>
                    <input class="form-control col-7" type="text" id="name" name="name">
                    <!-- <div id="name-error" class="text-danger error"></div> -->
                </div>
                <div class="form-group row">
                    <label class="col-3" for="lastname">Last Name</label>
                    <input class="form-control col-7" type="text" id="lastname" name="lastname">
                    <!-- <div id="lastname-error" class="text-danger error"></div> -->
                </div>

                <div class="form-group row">
                    <label class="col-3" for="city">City</label>
                    <input class="form-control col-7" type="text" id="city" name="city" minlength="2">
                    <!-- <div id="city-error" class="text-danger error"></div> -->
                </div>
                <div class="form-group row">
                    <label class="col-3" for="number">Contact Number</label>
                    <input class="form-control col-7" type="text" name="number" id="number" minlength="10" maxlength="10">
                    <!-- <div id="number-error" class="text-danger error"></div> -->
                </div>

                <div class="form-group row">
                    <label class="col-3" for="email">EMAIL</label>
                    <input class="form-control col-7" type="email" name="email" id="email">
                    <!-- <div id="email-error" class="text-danger error"></div> -->
                </div>
                <input type="submit" class="btn <?= $btn_class ?> float-right" value=<?= $submit ?>  id="submit">
            </form>
        </div>

    </div>
<?php
if(!empty($post_res)){
 echo "<div>
        <table class='table table-dark'>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>City</th>
                <th>Number</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> ". $post_res['name'] ." </td>
                <td> ". $post_res['lastname'] ."</td>
                <td> ". $post_res['city'] ."</td>
                <td> ". $post_res['number'] ."</td>
                <td> ". $post_res['email'] ."</td>
            </tr>
        </tbody>
        </table>
        </div>";
    }   
    ?>
    <script>
        $(document).ready(function(){
            // $('form').validate({
            //     rules: {
            //         name: { required: true, minlength: 2 },
            //         lastname: { required: true, minlength: 2 },
            //         city: { required: true, minlength: 2 },
            //         email: { required: true, email: true },
            //         number: { required: true, number: true , minlength: 10, maxlength:10}
            //     },
            //     messages: {
            //         name: "Please specify your first name",
            //         lastname: "Please specify your last name",
            //         city: "Please specify your city name",
            //         email: {
            //             required: "We need your email address !!",
            //             email: "Your email address must be in the format of name@domain.com"
            //         },
            //         number: {
            //             required: "We need your number !!",
            //             number: "Please enter valid number",
            //             minlength: "Please enter 10 digit mobile number"
            //         }
            //     },
            //     submitHandler: function (form) {
            //         console.log("asda");
            //     }
            // });
        });

    </script>