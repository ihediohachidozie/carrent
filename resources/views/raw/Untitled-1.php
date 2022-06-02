PHP 5.4+ or HHVM 3.3+, and Composer are required.

To get the latest version of Laravel Paystack, simply require it

composer require unicodeveloper/laravel-paystack
Or add the following line to the require block of your composer.json file.

"unicodeveloper/laravel-paystack": "1.0.*"
You'll then need to run composer install or composer update to download it and have the autoloader updated.

Once Laravel Paystack is installed, you need to register the service provider. Open up config/app.php and add the following to the providers key.

'providers' => [
    ...
    Unicodeveloper\Paystack\PaystackServiceProvider::class,
    ...
]
If you use Laravel >= 5.5 you can skip this step and go to configuration

Unicodeveloper\Paystack\PaystackServiceProvider::class
Also, register the Facade like so:

'aliases' => [
    ...
    'Paystack' => Unicodeveloper\Paystack\Facades\Paystack::class,
    ...
]
Configuration
You can publish the configuration file using this command:

php artisan vendor:publish --provider="Unicodeveloper\Paystack\PaystackServiceProvider"
A configuration-file named paystack.php with some sensible defaults will be placed in your config directory:

<?php

return [

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'publicKey' => getenv('PAYSTACK_PUBLIC_KEY'),

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secretKey' => getenv('PAYSTACK_SECRET_KEY'),

    /**
     * Paystack Payment URL
     *
     */
    'paymentUrl' => getenv('PAYSTACK_PAYMENT_URL'),

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => getenv('MERCHANT_EMAIL'),

];
General payment flow
Though there are multiple ways to pay an order, most payment gateways expect you to follow the following flow in your checkout process:

1. The customer is redirected to the payment provider
After the customer has gone through the checkout process and is ready to pay, the customer must be redirected to the site of the payment provider.

The redirection is accomplished by submitting a form with some hidden fields. The form must send a POST request to the site of the payment provider. The hidden fields minimally specify the amount that must be paid, the order id and a hash.

The hash is calculated using the hidden form fields and a non-public secret. The hash used by the payment provider to verify if the request is valid.

2. The customer pays on the site of the payment provider
The customer arrives on the site of the payment provider and gets to choose a payment method. All steps necessary to pay the order are taken care of by the payment provider.

3. The customer gets redirected back to your site
After having paid the order the customer is redirected back. In the redirection request to the shop-site some values are returned. The values are usually the order id, a payment result and a hash.

The hash is calculated out of some of the fields returned and a secret non-public value. This hash is used to verify if the request is valid and comes from the payment provider. It is paramount that this hash is thoroughly checked.

Usage
Open your .env file and add your public key, secret key, merchant email and payment url like so:

PAYSTACK_PUBLIC_KEY=xxxxxxxxxxxxx
PAYSTACK_SECRET_KEY=xxxxxxxxxxxxx
PAYSTACK_PAYMENT_URL=https://api.paystack.co
MERCHANT_EMAIL=unicodeveloper@gmail.com
If you are using a hosting service like heroku, ensure to add the above details to your configuration variables.

Set up routes and controller methods like so:

Note: Make sure you have /payment/callback registered in Paystack Dashboard https://dashboard.paystack.co/#/settings/developer like so:

payment-callback

// Laravel 5.1.17 and above
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
OR

Route::post('/pay', [
    'uses' => 'PaymentController@redirectToGateway',
    'as' => 'pay'
]);
OR

// Laravel 8
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
OR

// Laravel 5.0
Route::get('payment/callback', [
    'uses' => 'PaymentController@handleGatewayCallback'
]);
OR

// Laravel 8
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
Let me explain the fluent methods this package provides a bit here.

/**
 *  This fluent method does all the dirty work of sending a POST request with the form data
 *  to Paystack Api, then it gets the authorization Url and redirects the user to Paystack
 *  Payment Page. We've abstracted all of it, so you don't have to worry about that.
 *  Just eat your cookies while coding!
 */
Paystack::getAuthorizationUrl()->redirectNow();

/**
 * Alternatively, use the helper.
 */
paystack()->getAuthorizationUrl()->redirectNow();

/**
 * This fluent method does all the dirty work of verifying that the just concluded transaction was actually valid,
 * It verifies the transaction reference with Paystack Api and then grabs the data returned from Paystack.
 * In that data, we have a lot of good stuff, especially the `authorization_code` that you can save in your db
 * to allow for easy recurrent subscription.
 */
Paystack::getPaymentData();

/**
 * Alternatively, use the helper.
 */
paystack()->getPaymentData();

/**
 * This method gets all the customers that have performed transactions on your platform with Paystack
 * @returns array
 */
Paystack::getAllCustomers();

/**
 * Alternatively, use the helper.
 */
paystack()->getAllCustomers();


/**
 * This method gets all the plans that you have registered on Paystack
 * @returns array
 */
Paystack::getAllPlans();

/**
 * Alternatively, use the helper.
 */
paystack()->getAllPlans();


/**
 * This method gets all the transactions that have occurred
 * @returns array
 */
Paystack::getAllTransactions();

/**
 * Alternatively, use the helper.
 */
paystack()->getAllTransactions();

/**
 * This method generates a unique super secure cryptographic hash token to use as transaction reference
 * @returns string
 */
Paystack::genTranxRef();

/**
 * Alternatively, use the helper.
 */
paystack()->genTranxRef();


/**
* This method creates a subaccount to be used for split payments
* @return array
*/
Paystack::createSubAccount();

/**
 * Alternatively, use the helper.
 */
paystack()->createSubAccount();


/**
* This method fetches the details of a subaccount
* @return array
*/
Paystack::fetchSubAccount();

/**
 * Alternatively, use the helper.
 */
paystack()->fetchSubAccount();


/**
* This method lists the subaccounts associated with your paystack account
* @return array
*/
Paystack::listSubAccounts();

/**
 * Alternatively, use the helper.
 */
paystack()->listSubAccounts();


/**
* This method Updates a subaccount to be used for split payments
* @return array
*/
Paystack::updateSubAccount();

/**
 * Alternatively, use the helper.
 */
paystack()->updateSubAccount();
A sample form will look like so:

<?php
// more details https://paystack.com/docs/payments/multi-split-payments/#dynamic-splits

$split = [
   "type" => "percentage",
   "currency" => "KES",
   "subaccounts" => [
    [ "subaccount" => "ACCT_li4p6kte2dolodo", "share" => 10 ],
    [ "subaccount" => "ACCT_li4p6kte2dolodo", "share" => 30 ],
   ],
   "bearer_type" => "all",
   "main_account_share" => 70
];
?>
<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    Lagos Eyo Print Tee Shirt
                    ₦ 2,950
                </div>
            </p>
            <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="800"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="3">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            
            <input type="hidden" name="split_code" value="SPL_EgunGUnBeCareful"> {{-- to support transaction split. more details https://paystack.com/docs/payments/multi-split-payments/#using-transaction-splits-with-payments --}}
            <input type="hidden" name="split" value="{{ json_encode($split) }}"> {{-- to support dynamic transaction split. More details https://paystack.com/docs/payments/multi-split-payments/#dynamic-splits --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

            <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

            <p>
                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                </button>
            </p>
        </div>
    </div>
</form>
When clicking the submit button the customer gets redirected to the Paystack site.

So now we've redirected the customer to Paystack. The customer did some actions there (hopefully he or she paid the order) and now gets redirected back to our shop site.

Paystack will redirect the customer to the url of the route that is specified in the Callback URL of the Web Hooks section on Paystack dashboard.

We must validate if the redirect to our site is a valid request (we don't want imposters to wrongfully place non-paid order).

In the controller that handles the request coming from the payment provider, we have

Paystack::getPaymentData() - This function calls the verification methods and ensure it is a valid transaction else it throws an exception.

You can test with these details

Card Number: 4123450131001381
Expiry Date: any date in the future
CVV: 883
Todo
Charge Returning Customers
Add Comprehensive Tests
Implement Transaction Dashboard to see all of the transactions in your laravel app
Contributing
Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

How can I thank you?
Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to follow me on twitter!

Thanks! Prosper Otemuyiwa.

License
The MIT License (MIT). Please see License File for more information.


<!-- Pricing section-->
<section class="bg-light py-5 border-bottom">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Pay as you grow</h2>
            <p class="lead mb-0">With our no hassle pricing plans</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <!-- Pricing card free-->
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-5 mb-xl-0">
                    <div class="card-body p-5">
                        <div class="small text-uppercase fw-bold text-muted">Free</div>
                        <div class="mb-3">
                            <span class="display-4 fw-bold">$0</span>
                            <span class="text-muted">/ mo.</span>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                <strong>1 users</strong>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                5GB storage
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Unlimited public projects
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Community access
                            </li>
                            <li class="mb-2 text-muted">
                                <i class="bi bi-x"></i>
                                Unlimited private projects
                            </li>
                            <li class="mb-2 text-muted">
                                <i class="bi bi-x"></i>
                                Dedicated support
                            </li>
                            <li class="mb-2 text-muted">
                                <i class="bi bi-x"></i>
                                Free linked domain
                            </li>
                            <li class="text-muted">
                                <i class="bi bi-x"></i>
                                Monthly status reports
                            </li>
                        </ul>
                        <div class="d-grid"><a class="btn btn-outline-primary" href="#!">Choose plan</a></div>
                    </div>
                </div>
            </div>
            <!-- Pricing card pro-->
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-5 mb-xl-0">
                    <div class="card-body p-5">
                        <div class="small text-uppercase fw-bold">
                            <i class="bi bi-star-fill text-warning"></i>
                            Pro
                        </div>
                        <div class="mb-3">
                            <span class="display-4 fw-bold">$9</span>
                            <span class="text-muted">/ mo.</span>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                <strong>5 users</strong>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                5GB storage
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Unlimited public projects
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Community access
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Unlimited private projects
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Dedicated support
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Free linked domain
                            </li>
                            <li class="text-muted">
                                <i class="bi bi-x"></i>
                                Monthly status reports
                            </li>
                        </ul>
                        <div class="d-grid"><a class="btn btn-primary" href="#!">Choose plan</a></div>
                    </div>
                </div>
            </div>
            <!-- Pricing card enterprise-->
            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="small text-uppercase fw-bold text-muted">Enterprise</div>
                        <div class="mb-3">
                            <span class="display-4 fw-bold">$49</span>
                            <span class="text-muted">/ mo.</span>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                <strong>Unlimited users</strong>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                5GB storage
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Unlimited public projects
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Community access
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Unlimited private projects
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Dedicated support
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                <strong>Unlimited</strong>
                                linked domains
                            </li>
                            <li class="text-muted">
                                <i class="bi bi-check text-primary"></i>
                                Monthly status reports
                            </li>
                        </ul>
                        <div class="d-grid"><a class="btn btn-outline-primary" href="#!">Choose plan</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials section-->
<section class="py-5 border-bottom">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Customer testimonials</h2>
            <p class="lead mb-0">Our customers love working with us</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <!-- Testimonial 1-->
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                            <div class="ms-4">
                                <p class="mb-1">Thank you for putting together such a great product. We loved working with you and the whole team, and we will be recommending you to others!</p>
                                <div class="small text-muted">- Client Name, Location</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2-->
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                            <div class="ms-4">
                                <p class="mb-1">The whole team was a huge help with putting things together for our company and brand. We will be hiring them again in the near future for additional work!</p>
                                <div class="small text-muted">- Client Name, Location</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>