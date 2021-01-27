<?php


namespace App\Http\Controllers;

require_once (__DIR__.'/../../../vendor/rmccue/Requests/library/Requests.php');
use Illuminate\Http\Request;
use Requests;

class CredimaxController extends Controller
{
    public function index()
    {
        return view('credimax');
    }

    public function checkout()
    {
//        require_once "vendor/rmccue/requests/library/Requests.php";
        Requests::register_autoloader();

        $headers = array();
        $data = array(
            'apiOperation' => 'CREATE_CHECKOUT_SESSION',
            'apiPassword' => '470b61dc064faa3ed24fb188c46b1a35',
            'apiUsername' => 'merchant.E16175950',
            'merchant' => '16175950',
            'interaction.operation' => 'AUTHORIZE',
            'order.id' => 'asdfeqerscz341234aeasdf',
            'order.amount' => '100.00',
            'order.currency' => 'BHD'
        );
        $response = Requests::post('https://credimax.gateway.mastercard.com/api/nvp/version/57', $headers, $data);
        $session_id = $response->body;

        return view('checkout', compact('session_id'));
    }
}
