<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrders(Request $request)
    {
        $search = $request->input('search', false);
        $status = $request->input('status');

        // Fetch the currency symbol for the authenticated user's restaurant
        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->value('currency_symbol');

        // Initialize the base query for orders
        $orders = Order::with('customer')->whereRestaurantId(Auth::user()->restaurant_id)
                    ->when($search, function ($query, $search) {
                        return $query->whereHas('customer', function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        });
                    })
                    ->when($status != '', function ($query) use ($status) {
                        if ($status == 0) {
                            return $query->where('finished', 0)->whereNull('start_at');
                        } else if ($status == 1) {
                            return $query->where('finished', 1)->whereNotNull('start_at');
                        } else if ($status == 2) {
                            return $query->whereNotNull('cancelled_by');
                        } else if ($status == 3) {
                            return $query->where('finished', 0)->whereNotNull('start_at');
                        }
                    })->latest('id')->paginate(10);

        // Return the response as JSON
        return response()->json(['setting' => $setting, 'orders' => $orders]);
    }


    public function getOrder(Order $order) {

        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->first(['currency_code', 'currency_symbol']);

        $order->load([
            'customer',
            'orderPayment',
            'kots.kotProducts.product.productRestaurantLanguagesFirst',
            'kots.kotProducts.kotProductVariation.variation.variationRestaurantLanguagesFirst',
            'floorShiftHistory',
            'tableShiftHistory'
        ]);

        return response()->json(['setting' => $setting, 'order' => $order]);
    }

    public function deleteOrder(Order $order) {

        $order->delete();

        return response()->json(['success' => true, 'message' => "order successfully delete."]);
    }

    public function getTransactions(Request $request) {
        $search = $request->input('search', false);
        $status = $request->input('status', false);

        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->value('currency_symbol');
        
        $transaction = OrderPayment::with('order.customer')
            ->whereHas('order', function ($query) {
                $query->whereRestaurantId(Auth::user()->restaurant_id);
            })
                ->when($search, function ($query, $search) {
                    return $query->whereHas('order.customer', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
                })
                ->when($status, function ($query, $status) {
                    return $query->where('payment_type', 'like', '%' . $status . '%');
                })
                    ->paginate(10);

        return response()->json(['setting' => $setting, 'transaction' => $transaction]);
    }

    public function deleteTransaction(OrderPayment $transaction) {

        $transaction->delete();

        return response()->json(['success' => true, 'message' => "Transaction successfully delete."]);
    }

}
