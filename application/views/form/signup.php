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
        <div class="outter-right">
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
        var TR = document.getElementById('table-data');
        const TABLE = document.getElementById("table-layout");
        var table = document.getElementById('table-data');
        //var flag=true;
        const outterDIV = document.getElementsByClassName('outter-left');
        const innerDIV = document.getElementsByClassName('outter-right');
        const dynamicRow = document.getElementById('dynamic-div');

        $(document).ready(function() {

            TABLE.setAttribute("style", "display:none");
            /*   var Time = setInterval(function(){if(table.childElementCount == 1){
                   flag = false;
                   clearInterval(Time);
                   TABLE.setAttribute("style","display:none");   
                   outterDIV[0].classList.remove('col-5');
                   innerDIV[0].classList.remove('col-7');
                   dynamicRow.classList.remove('row');
               }},200);*/
            deleteList();


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
                        url: "http://localhost/user/form/index",
                        data: $(form).serializeArray(),
                        success: function(res) {
                            outterDIV[0].classList.add('col-5');
                            innerDIV[0].classList.add('col-7');
                            dynamicRow.classList.add('row');

                            res = JSON.parse(res);
                            var TDs = `<td>${res.name}</td>
                            <td>${res.lastname}</td>
                            <td>${res.city}</td>
                            <td>${res.number}</td>
                            <td>${res.email}</td>
                            <td style="display:flex">                               
                                <button class="btn btn-danger btn-sm del_elem">Delete</button>
                            </td>
                            `;
                            TR.insertAdjacentHTML("afterBegin", TDs);
                            deleteList();
                            TABLE.setAttribute("style", "display:block");
                        }
                    })
                },
                errorElement: 'div',
                errorLabelContainer: '.errorTxt'
            });

        });

        function deleteList() {
            if (document.querySelectorAll('.del_elem')) {
                Array.prototype.slice.call(document.querySelectorAll('.del_elem')).map(ele => {
                    ele.addEventListener('click', del => {
                        del.target.parentElement.parentElement.remove();
                        if (table.childElementCount == 1) {
                            TABLE.setAttribute("style", "display:none");
                            outterDIV[0].classList.remove('col-5');
                            innerDIV[0].classList.remove('col-7');
                            dynamicRow.classList.remove('row');
                        }
                    })
                })
            }
        }
    </script>