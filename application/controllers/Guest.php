<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{
    private $apiKey = "66ba7e7b3a2531644c7a85663940c5ee";
    private $cost_url = "https://api.rajaongkir.com/starter/cost";
    private $city_url = "https://api.rajaongkir.com/starter/city";
    public function index()
    {
        $data['title'] = 'Landing Page';

        $this->load->view('templates/user_header', $data);
        $this->load->view('guest/index', $data);
        $this->load->view('templates/user_footer');
    }

    public function cekongkir()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->city_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: {$this->apiKey}"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $kota = json_decode($response, true);
            $data['kota'] = $kota;
        }
        function getCost($asal, $dest, $kurir, $berat, $cost_url, $apiKey)
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $cost_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "origin=$asal&destination=$dest&weight=$berat&courier=$kurir",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: {$apiKey}"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $cost = json_decode($response, TRUE);
                return $cost;
            };
        }


        $asal = $this->input->post('kota_asal', true);
        $dest = $this->input->post('kota_tujuan', true);
        $kurir = $this->input->post('kurir', true);
        $berat = $this->input->post('berat', true);
        $data['hasil'] = getCost($asal, $dest, $kurir, $berat, $this->cost_url, $this->apiKey);
        $data['title'] = 'Cek Ongkir';

        $this->load->view('templates/user_header', $data);
        $this->load->view('guest/cekongkir', $data);
        $this->load->view('templates/user_footer');
    }
}
