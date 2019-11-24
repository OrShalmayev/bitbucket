<!-- HEAD -->
<?php require(APPROOT . '/views/inc/head.php'); ?>
    <!-- Title -->
    <h1 class="text-center my-5"><?php echo $data['title']; ?></h1>
    
    <!-- Error message -->
    <?php if(strlen($data['error_msg']) > 0): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $data['error_msg'] ?>
        </div>
    <?php endif; ?>
    
    <!-- Login Form -->
    <form method="POST" action="<?php echo URLROOT; ?>admins/login" class="form-signin" id="id_login_form">

        <!-- Email -->
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="id_e" name="email" class="form-control" placeholder="Email address" required autofocus>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="id_p" name="password" class="form-control" placeholder="Password" required>
        </div>

        <!-- Sign in Button -->
        <div class="form-group">
            <button id="id_b" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>
    </form>
    
    <script>
        // Making variables restricted
        (function(){
            // Form
            const f = document.getElementById('id_login_form');
            const e = f.id_e;
            const p = f.id_p;
            const b = f.id_b;

            let formIsValid = false;
            // Disable the button from submittion
            b.disabled = true;
            f.addEventListener('input', (event)=>{
                event.preventDefault();

                // if email and password is valid then allow submittion
                if(validateEmail(e.value) && validatePassword(p.value)){
                    buttonCondition(b, false);

                }else{
                    buttonCondition(b, true);
                }

            });

            // f.addEventListener('submit', (event)=>{
            //     event.preventDefault(); 

            //     $.ajax('/user/processlogin', {
            //         type: 'POST',  // http method
            //         data: { e: e.value, p: p.value },  // data to submit
            //         success: function (data, status, xhr) {
            //             $('p').append('status: ' + status + ', data: ' + data);
            //         },
            //         error: function (jqXhr, textStatus, errorMessage) {
            //                 $('p').append('Error' + errorMessage);
            //         }
            //     });//ajax

            // });//submit listener

            /** Helper Functions **/

            function validateEmail(email){
                let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            function validatePassword(password){
                let re = /[a-z0-9]{6,}/gi;
                return re.test(password)
            }

            function buttonCondition(button, disabledAttr = true){
                button.disabled = disabledAttr;
            }


            /* Debug */
            console.log(f,e,p, b);
        })();


    </script>
<!-- FOOTER -->
<?php require(APPROOT . '/views/inc/footer.php'); ?>
