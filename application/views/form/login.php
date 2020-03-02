    <?= $title?>
    <div class="jumbotron" style="width:85%">
            <form name="home_form" id="home_form">
            
                <div class="form-group row">
                    <label class="col-3" for="email">EMAIL</label>
                    <input class="form-control col-7" type="email" name="email" id="email">
                    <!-- <div id="email-error" class="text-danger error"></div> -->
                </div>

                <div class="form-group row">
                    <label class="col-3" for="number">Contact Number</label>
                    <input class="form-control col-7" type="text" name="number" id="number">
                    <!-- <div id="number-error" class="text-danger error"></div> -->
                </div>
                <input type="submit" class="btn <?= $btn_class;?>  float-right" value="<?=$submit;?>" id="submit">
            </form>
        </div>
    </div>

    <script>
        $( document ).ready(function() {
            $('form').validate({
                rules: {
                    email: { required: true, email: true },
                    number: { required: true, number: true }
                },
                messages: {
                    email: {
                        required: "We need your email address to verify you",
                        email: "Your email address must be in the format of name@domain.com"
                    },
                    number: {
                        required: "We need your number to verify you",
                        number: "Please enter valid number"
                    }
                },
            submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/user/form/login",
                        data: $(form).serializeArray(),
                        success : function(res){
                            console.log(res);
                        }
                    })
                },
                errorElement: 'div',
                errorLabelContainer: '.errorTxt'
            });
        });
    </script>