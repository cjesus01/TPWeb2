<?php 

    class ApiClothingView{
        public function response($data, $status){
            header("Content-Type: application/json");
            header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
            echo json_encode($data);
        }
        public function requestStatus($status){
            $request=[
                200=>'OK',
                291=>'Created',
                400=>'Bad Request',
                404=>'Not found',
                500=>'Server Error'
            ];
            if(isset($request[$status])){
                return $request[$status];
            }
            else{
                return $request[500];
            }
        }
    }