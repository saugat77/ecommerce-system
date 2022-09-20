<!--main area-->
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
            <div class=" main-content-area">
                <form wire:submit.prevent="placeOrder">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Checkout</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">first name<span>*</span></label>
                                        <input  type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
                                        @error('firstname')<span class="text-danger">{{$message}}</span>@enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lname">last name<span>*</span></label>
                                        <input  type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
                                        @error('lastname')<span class="text-danger">{{$message}}</span>@enderror
                                    
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Email Addreess:</label>
                                        <input  type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Phone number<span>*</span></label>
                                        <input  type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                                        @error('mobile')<span class="text-danger">{{$message}}</span>@enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">District:</label>
                                        <input  type="text" name="add" value="" placeholder="Name of district" wire:model="line1">
                                        @error('line1')<span class="text-danger">{{$message}}</span>@enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">location</label>
                                        <input  type="text" name="add" value="" placeholder="Name of local place" wire:model="line2">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Country<span>*</span></label>
                                        <input  type="text" name="country" value="" placeholder="Nepal" wire:model="country">
                                        @error('country')<span class="text-danger">{{$message}}</span>@enderror
                                    </p>
                                
                                    <p class="row-in-form">
                                        <label for="city">Province<span>*</span></label>
                                        <input  type="text" name="province" value="" placeholder="province" wire:model="province">
                                        @error('province')<span class="text-danger">{{$message}}</span>@enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Town / City<span>*</span></label>
                                        <input  type="text" name="city" value="" placeholder="City name" wire:model="city">
                                        @error('city')<span class="text-danger">{{$message}}</span>@enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Postcode / ZIP:</label>
                                        <input  type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                                        @error('zipcode')<span class="text-danger">{{$message}}</span>@enderror
                                    </p>                          
                                </div>
                            </div> 
                        </div>
                    </div>
                    
                            
                    
            
                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model = "paymentmode">
                                <span>Cash on Delivery <a>( click the radio button to order )</a></span>
                                <span class="payment-desc"> Order now Pay on delivery</span>
                                @if (Session::has('checkout'))

                                <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{Session::get('checkout')['total']}}</span></p>
                                @endif   
                                <button  type="submit"  class="btn btn-medium"> <a href="#">Place order now</a> </button>   
                            </label>
                            <label class="payment-method">
                                <input name="payment-method"  id="payment-method-visa" value="card" type="radio">
                                <span>Paypal</span>
                                <span class="payment-desc">Pay with paypal account</span>
                            </label>
                            @error('paymentmode')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                      
                   
                        <div id="paypal-button-container"></div>

                        <body>
                            <!-- Replace "test" with your own sandbox Business account app client ID -->
                            <script src="https://www.paypal.com/sdk/js?client-id=Ae7ZnGwejVAbjU2lxAK8vQ3GGKa5njSTLp1EamN8H_rvJov8wOX7k97Lbf0vNM-oJdLs9i2_I3WrARog"></script>
                            <!-- Set up a container element for the button -->
                            <div id="paypal-button-container"></div>
                            <script>
                              paypal.Buttons({
                                // Sets up the transaction when a payment button is clicked
                                createOrder: (data, actions) => {
                                  return actions.order.create({
                                    purchase_units: [{
                                      amount: {
                                        value: {{Session::get('checkout')['total']}} // Can also reference a variable or function
                                      }
                                    }]
                                  });
                                },
                                // Finalize the transaction after payer approval
                                onApprove: (data, actions) => {
                                  return actions.order.capture().then(function(orderData) {
                                    // Successful capture! For dev/demo purposes:
                                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                    const transaction = orderData.purchase_units[0].payments.captures[0];
                                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                                    // When ready to go live, remove the alert and show a success message within this page. For example:
                                    // const element = document.getElementById('paypal-button-container');
                                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                    // Or go to another URL:  actions.redirect('thank_you.html');
                                  });
                                }
                              }).render('#paypal-button-container');
                            </script>
                          </body>
        </form>
          

        </div><!--end main content area-->
    
    </div><!--end container-->

</main>
<!--main area-->
