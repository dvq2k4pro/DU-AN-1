<?php
function orderCheckout()
{
    $view = 'order';
    $title = 'Đặt hàng';
    $categories = listAll('the_loai');

    require_once PATH_VIEW . 'layouts/master.php';
}



function orderPurchase()
{
    if (isset($_POST['cash-payment']) && !empty($_SESSION['cart'])) {
        // Xử lý lưu vào bảng don_hang và chi_tiet_don_hang
        $data = [
            "ten_nguoi_dung" => $_POST['ten_nguoi_dung'],
            "dia_chi" => $_POST['dia_chi'],
            "email" => $_POST['email'],
            "so_dien_thoai" => $_POST['so_dien_thoai'],
            "id_nguoi_dung" => $_SESSION['user']['id'],
            "tong_tien" => calculatorTotalOrder(),
            "trang_thai_van_chuyen" => STATUS_DELIVERY_WFC,
            "trang_thai_thanh_toan" => STATUS_PAYMENT_UNPAID,
        ];


        $orderId = insertGetLastId('don_hang', $data);

        foreach ($_SESSION['cart'] as $bookId => $item) {
            $orderItem = [
                'id_don_hang' => $orderId,
                'id_sach' => $bookId,
                'so_luong' => $item['quantity'],
                'gia' => $item['gia'],
            ];

            insert('chi_tiet_don_hang', $orderItem);
            decreaseQuantity($bookId, $item['quantity']);
        }

        // Xử lý hậu điều kiện
        deleteCartItemByCartId($_SESSION['cart-id']);
        delete('gio_hang', $_SESSION['cart-id']);

        unset($_SESSION['cart']);
        unset($_SESSION['cart-id']);

        header('location: ' . BASE_URL . '?act=order-complete');
        exit();
    } else if (isset($_POST['payUrl']) && !empty($_SESSION['cart'])) {
        // Xử lý lưu vào bảng don_hang và chi_tiet_don_hang
        $data = [
            "ten_nguoi_dung" => $_POST['ten_nguoi_dung'],
            "dia_chi" => $_POST['dia_chi'],
            "email" => $_POST['email'],
            "so_dien_thoai" => $_POST['so_dien_thoai'],
            "id_nguoi_dung" => $_SESSION['user']['id'],
            "tong_tien" => calculatorTotalOrder(),
            "trang_thai_van_chuyen" => STATUS_DELIVERY_WFC,
            "trang_thai_thanh_toan" => STATUS_PAYMENT_UNPAID,
        ];

        $orderId2 = insertGetLastId('don_hang', $data);

        foreach ($_SESSION['cart'] as $bookId => $item) {
            $orderItem = [
                'id_don_hang' => $orderId2,
                'id_sach' => $bookId,
                'so_luong' => $item['quantity'],
                'gia' => $item['gia'],
            ];

            insert('chi_tiet_don_hang', $orderItem);
            decreaseQuantity($bookId, $item['quantity']);
        }

        // Xử lý thanh toán online
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data)
                )
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }


        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = calculatorTotalOrder() . "";
        $orderId = time() . "";
        $redirectUrl = BASE_URL . '?act=order-complete';
        $ipnUrl = BASE_URL . '?act=order-complete';
        $extraData = "";

        $partnerCode = $partnerCode;
        $accessKey = $accessKey;
        $serectkey = $secretKey;
        $orderId = $orderId; // Mã đơn hàng
        $orderInfo = $orderInfo;
        $amount = $amount;
        $ipnUrl = $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;

        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $dataPayment = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = execPostRequest($endpoint, json_encode($dataPayment));
        $jsonResult = json_decode($result, true);  // decode json
        //Just a example, please check more in there

        updatePaymentStatus($orderId2);
        header('Location: ' . $jsonResult['payUrl']);

        // Xử lý hậu điều kiện
        deleteCartItemByCartId($_SESSION['cart-id']);
        delete('gio_hang', $_SESSION['cart-id']);

        unset($_SESSION['cart']);
        unset($_SESSION['cart-id']);
        exit();
    }

    header('location: ' . BASE_URL);
}

function orderComplete()
{
    $view = 'order-complete';
    $title = 'Đặt hàng thành công';
    $categories = listAll('the_loai');

    require_once PATH_VIEW . 'layouts/master.php';
}
