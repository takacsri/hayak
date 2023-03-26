
<!-- Configuration-->

<?php require_once("../resources/config.php"); ?>


<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>




         <!-- Contact Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading">Contactează-ne</h2>
                    <hr>
                    <h3 class="section-subheading text-muted">
                        <?php display_message(); ?>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form name="sentMessage" id="contactForm" method="post">
                        <?php send_message(); ?>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Numele tău *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Adresa ta de email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subiect*" id="subject" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Mesajul tău *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            
                                <button name="submit" type="submit" class="btn btn-xl">Trimite mesajul</button>
                    </form>
                </div>
                <div class="col-md-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10878.681634408429!2d23.906271!3d47.0270742!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4749bda34e75e811%3A0x33463cf8e52759b2!2sHayak%20Pub%20%26%20Caffe!5e0!3m2!1sen!2sro!4v1679434465866!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
         
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>