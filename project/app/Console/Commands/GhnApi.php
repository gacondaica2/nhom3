<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Model\District;
use App\Model\Province;
use App\Model\Ward;

class GhnApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GhnApi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $client = new Client([
                'headers' => ['Content-Type' => 'application/json', 'token' => 'd53afbd0-f0b2-11ea-84ad-96345611fc28']
            ]);
            $response_provide = $client->post('https://online-gateway.ghn.vn/shiip/public-api/master-data/province', [
                'body' => json_encode([])
            ]);
            $records_provide = json_decode($response_provide->getBody()->getContents());
            if ($records_provide->message == "Success" && !empty($records_provide->data)) {
                foreach ($records_provide->data as $value) {
                    $province               = new Province();
                    $province->name         = $value->ProvinceName;
                    $province->ghn_id       = $value->ProvinceID;
                    $province->save();
                    $response_district = $client->post('https://online-gateway.ghn.vn/shiip/public-api/master-data/district', [
                        'body' => json_encode([
                            'province_id' => (int)$value->ProvinceID
                        ])
                    ]);
                    $records_district = json_decode($response_district->getBody()->getContents());
                    if ($records_district->message == "Success" && !empty($records_district->data)) {
                        foreach ($records_district->data as $value_district) {

                            $district = new District();
                            $district->ghn_id           = $value_district->DistrictID;
                            $district->name             = $value_district->DistrictName;
                            $district->province_id      = $province->id;
                            $district->save();
                            $response_ward = $client->post('https://online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id', [
                                'body' => json_encode([
                                    'district_id' => (int)$value_district->DistrictID
                                ])
                            ]);
                            $records_ward = json_decode($response_ward->getBody()->getContents());
                            if ($records_ward->message == "Success" && !empty($records_ward->data)) {
                                foreach ($records_ward->data as $value_ward) {
                                    $ward               = new Ward();
                                    $ward->name         = $value_ward->WardName;
                                    $ward->ghn_id       = $value_ward->WardCode;
                                    $ward->district_id  = $district->id;
                                    $ward->save();
                                }
                            }
                        }
                    }
                }
            }
            print("Thêm id GHN cho Tỉnh, quận, huyện thành công!");
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
