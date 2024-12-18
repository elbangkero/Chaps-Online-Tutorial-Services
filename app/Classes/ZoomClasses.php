<?php

namespace App\Classes;


class ZoomClasses
{
    public function deleteMeeting($accessToken, $meeting_id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.zoom.us/v2/meetings/' . $meeting_id . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $accessToken . '',
                'Cookie: __cf_bm=weK5M51t6cJ3y5ytzMiGc5ASJECyKuGvofEmXFZ9DOM-1734340856-1.0.1.1-4xCJqO1LFpC1SizgRJmtJX8N85DSoJtr6wGjr33JCKoDjtM2sFDqZh00luYnfqN66KBDYwsc70RttNghBa8XlQ; _zm_csp_script_nonce=vUW8s5GISFqdT3kqmIQ7AQ; _zm_currency=PHP; _zm_mtk_guid=1780351cab80422fbd805354b0e15d6a; _zm_page_auth=us05_c_XoeUYrLKQD6etakIsf3lrg; _zm_ssid=us05_c_T_EN4xM_Tu6jzQKT7hIQeQ; _zm_visitor_guid=40fd1047f8b84122bbdb40539fe4860d; cred=7EA8347DCD562E22E053ACAD91B43337'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function createMeeting($accessToken, $payload)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.zoom.us/v2/users/me/meetings',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $accessToken . '',
                'Cookie: __cf_bm=Nb016T5SciRl8j9SsHOivSzedqpnag38lECj4FJ1C7M-1734321164-1.0.1.1-XyP4kEsQTpoGZgfkueaJYUxliQHeoOL6TUrhKj5iFjNqQeD7ED6rq.N6E3prtNAVUIKYDJeD6fYIRi7d5cVePg; _zm_chtaid=685; _zm_csp_script_nonce=vUW8s5GISFqdT3kqmIQ7AQ; _zm_ctaid=Lyjx7Cc_Rj-39QNq1g4gCA.1734321164179.cc3771046f2a16502313f4f4018c6c92; _zm_currency=PHP; _zm_mtk_guid=1780351cab80422fbd805354b0e15d6a; _zm_page_auth=us05_c_XoeUYrLKQD6etakIsf3lrg; _zm_ssid=us05_c_T_EN4xM_Tu6jzQKT7hIQeQ; _zm_visitor_guid=40fd1047f8b84122bbdb40539fe4860d; cred=547D6F9BA88EA0E17F285328C08F2873'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function endMeeting($accessToken, $meeting_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.zoom.us/v2/meetings/' . $meeting_id . '/status',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => '{
            "action": "end"
          }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $accessToken . '',
                'Content-Type: application/json',
                'Cookie: __cf_bm=Ai5kwU8M_5OQCAKXJnRxHbZqgVxZjb0DazL39Qu2SCM-1734418835-1.0.1.1-z6E9POl4_kbmjr2IijThHhToZRQA6IVw1p9Gtgwt0qtAOhHhCjd0lV2HpDY7f7PI2bULVCYpX0OmS.tONY58zg; _zm_mtk_guid=1780351cab80422fbd805354b0e15d6a; _zm_visitor_guid=40fd1047f8b84122bbdb40539fe4860d; cred=4FC8C195D995DF18B52118FC447142CE'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
    public function createAccessToken()
    {
        $api_client = env('ZOOM_CLIENT_ID');
        $api_secret = env('ZOOM_CLIENT_SECRET');
        $encoded = base64_encode($api_client . ':' . $api_secret);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://zoom.us/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type=account_credentials&account_id=JsVWrX9XSAicqkfr2WsVtA',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ' . $encoded . '',
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: __cf_bm=Nb016T5SciRl8j9SsHOivSzedqpnag38lECj4FJ1C7M-1734321164-1.0.1.1-XyP4kEsQTpoGZgfkueaJYUxliQHeoOL6TUrhKj5iFjNqQeD7ED6rq.N6E3prtNAVUIKYDJeD6fYIRi7d5cVePg; _zm_chtaid=685; _zm_csp_script_nonce=vUW8s5GISFqdT3kqmIQ7AQ; _zm_ctaid=Lyjx7Cc_Rj-39QNq1g4gCA.1734321164179.cc3771046f2a16502313f4f4018c6c92; _zm_currency=PHP; _zm_mtk_guid=1780351cab80422fbd805354b0e15d6a; _zm_page_auth=us05_c_XoeUYrLKQD6etakIsf3lrg; _zm_ssid=us05_c_T_EN4xM_Tu6jzQKT7hIQeQ; _zm_visitor_guid=40fd1047f8b84122bbdb40539fe4860d; cred=C71AE59490C21F945FABA21B60FA6A26'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
