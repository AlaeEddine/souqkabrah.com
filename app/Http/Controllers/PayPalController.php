<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\PaymentGateway; 

class PayPalController extends Controller
{

    public function paypal(Request $request)
    {
        $PaymentGateway = PaymentGateway::where('id',1)->where('valide',1)->where('removed',0);
        if($PaymentGateway->count()>0){
            if($PaymentGateway->get()->first()->sandbox_client_id != null):
                $sandbox_client_id = $PaymentGateway->get()->first()->sandbox_client_id;
            else:
                $sandbox_client_id = env('PAYPAL_SANDBOX_CLIENT_ID', '');
            endif;

            if($PaymentGateway->get()->first()->sandbox_client_secret != null):
                $sandbox_client_secret = $PaymentGateway->get()->first()->sandbox_client_secret;
            else:
                $sandbox_client_secret = env('PAYPAL_SANDBOX_CLIENT_SECRET', '');
            endif;
            
            if($PaymentGateway->get()->first()->sandbox_app_id != null):
                $sandbox_app_id = $PaymentGateway->get()->first()->sandbox_app_id;
            else:
                $sandbox_app_id = "APP-80W284485P519543T";
            endif;


            if($PaymentGateway->get()->first()->live_client_id != null):
                $live_client_id = $PaymentGateway->get()->first()->live_client_id;
            else:
                $live_client_id = env('PAYPAL_LIVE_CLIENT_ID', '');
            endif;

            if($PaymentGateway->get()->first()->live_client_secret != null):
                $live_client_secret = $PaymentGateway->get()->first()->live_client_secret;
            else:
                $live_client_secret = env('PAYPAL_LIVE_CLIENT_SECRET', '');
            endif;
            
            if($PaymentGateway->get()->first()->live_app_id != null):
                $live_app_id = $PaymentGateway->get()->first()->live_app_id;
            else:
                $live_app_id = env('PAYPAL_LIVE_APP_ID', '');
            endif;

        }else{
            $sandbox_client_id = env('PAYPAL_SANDBOX_CLIENT_ID', '');
            $sandbox_client_secret = env('PAYPAL_SANDBOX_CLIENT_SECRET', '');
            $sandbox_app_id = "";

            $live_client_id = env('PAYPAL_LIVE_CLIENT_ID', '');
            $live_client_secret = env('PAYPAL_LIVE_CLIENT_SECRET', '');
            $live_app_id = env('PAYPAL_LIVE_APP_ID', '');


        }
        $CONFIG_PAYPAL = [
            'mode'    => 'live', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => $sandbox_client_id,
                'client_secret'     => $sandbox_client_secret,
                'app_id'            => $sandbox_app_id,
            ],
            'live' => [
                'client_id'         => $live_client_id,
                'client_secret'     => $live_client_secret,
                'app_id'            => $live_app_id,
            ],
        
            'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => env('PAYPAL_CURRENCY', 'USD'),
            'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
            'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
        ];
        
        $provider = \PayPal::setProvider();

        //dd($CONFIG_PAYPAL);
        $provider = new PayPalClient;
        $provider->setApiCredentials($CONFIG_PAYPAL);
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success'),
                "cancel_url" => route('paypal.payment.cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);        
        if(isset($response['id']) && $response['id'] != null) {
            foreach($response['links'] as $link) {
                if($link['rel'] == 'approve') {
                    session()->put('product_name', $request->product_name);
                    session()->put('quantity', $request->quantity);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            if (isset($response['error'])) {
                dd($response);
                return redirect()->route('paypal.payment.cancel')->with('error','معلومات حساب البيبال غير صحيحة المرجو التواصل مع الإدارة');
            }else{
                return redirect()->route('paypal.payment.cancel');
            }
        }
    }

    public function paymentCancel() {
        return view('pages.paypal.cancel');
    }

    public function paymentSuccess() {
        return view('pages.paypal.success');
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;


        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);
        if(isset($response['status']) && $response['status'] == 'COMPLETED') {

            // Insert data into database
            $payment = new Payment;
            $payment->payment_id = $response['id'];
            $payment->product_name = session()->get('product_name');
            $payment->quantity = session()->get('quantity');
            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name = $response['payer']['name']['given_name'];
            $payment->payer_email = $response['payer']['email_address'];
            $payment->payment_status = $response['status'];
            $payment->payment_method = "PayPal";
            $payment->save();

            return "Payment is successful";

            unset($_SESSION['product_name']);
            unset($_SESSION['quantity']);

        } else {
            return redirect()->route('paypal.payment.cancel');
        }
    }
    public function cancel()
    {
        return "تم إلغاء الدفع.";
    }
}

