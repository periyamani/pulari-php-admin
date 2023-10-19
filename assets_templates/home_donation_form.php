<div class="eco_filing_form">
    <!--Eco donation form-->
    <div class="container">
        
        <div class="eco_donation_form">
            <div class="row">
                <div class="col-md-6 col-sm-6 responsive-col-xs">
                    <div class="eco_form_importer">
                        <!--Eco Template Heading-->
                        <div class="eco_headings">
                            <h3><b>MAKE</b> DONATION</h3>
                            <p>Make the payment by scanning the QR code or by transferring the donation amount to the given bank account.</p>
                            <p>Fill the donation form and the donation receipt will be sent through email within 24 hours of receiving the payment.</p>
                            <p style="color:#666;"><b>Bank Account Details:</b><br />Account Holder: PULARI ECO FOUNDATION<br />Account type: Current Account<br />Account Number: 50200078780184<br />IFSC Code: HDFC0003023</p>
                        </div>
                        <!--Eco donation form-->

                        <!--Eco input your detail-->
                        <div class="eco_input_your_detail">                                                           
                            <div class="form-submit-eco-btn">                            	                                
                                <button onclick="location.href = '<?php echo $GLOBALS['webroot']; ?>donations.php';" class="lg-button">donate now</button>
                            </div>                            
                        </div>
                        <!--Eco input your detail ends-->
                    </div>
                </div>
                <?php $select_process_counter = mysqli_query($GLOBALS['conn'], "SELECT id, total_campaign, funds_collection, volunteers, saplings FROM process_counter WHERE id='1'");
				$rs_process_counter = mysqli_fetch_object($select_process_counter); ?> 
                <div class="col-md-6 col-sm-6 responsive-col-xs">
                    <!--Eco Process of count up-->
                    <div class="eco_process_of_counter">
                        <ul class="eco_counter">
                            <li class="left-side">
                                <div class="eco_count_up">
                                    <span><i class="icon icon-nature-3"></i></span>
                                    <h3><span class="counter-up"><?php echo $rs_process_counter->total_campaign; ?></span></h3>
                                    <p>total compaigns</p>
                                </div>
                            </li>
                            <li class="right-side">
                                <div class="eco_count_up">
                                    <span><i class="fa icon icon-arrows fa-2x"></i></span>
                                    <h3><span class="counter-up"><?php echo $rs_process_counter->funds_collection; ?></span><span style="font-size:16px; text-transform:none;">&nbsp;Kgs</span></h3>
                                    <p>Waste Processed</p>
                                </div>
                            </li>
                            <li class="left-side">	
                                <div class="eco_count_up">
                                    <span><i class="icon icon-people"></i></span>
                                    <h3><span class="counter-up"><?php echo $rs_process_counter->volunteers; ?></span></h3>
                                    <p>volenteers</p>
                                </div>
                            </li>
                            
                            <li class="right-side">	
                                <div class="eco_count_up no-margin-bottom">
                                    <span><i class="fa icon icon-helping fa-2x"></i></span>
                                    <h3><span class="counter-up"><?php echo $rs_process_counter->saplings; ?></span></h3>
                                    <p>Sapling's</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--Eco Process of count up ends-->
                </div>
            </div>
        </div>
    </div>
    <!--Eco container ends-->
</div>