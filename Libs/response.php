<?php
    class Response {
        private $finished = false;// Indica si la respuesta ya fue enviada

        // Método público para verificar si la respuesta ya fue enviada
        public function hasFinished() {
            return $this->finished;
        }
        // Método público para enviar una respuesta JSON
         public function json($data, $status = 200) {
            // Configura las cabeceras HTTP y envía la respuesta JSON
            header("Content-Type: application/json");
            // Configura el código de estado HTTP
            $statusText = $this->_requestStatus($status);
            header("HTTP/1.1 $status $statusText");
            echo json_encode($data);
            $this->finished = true;
        }
        // Metdodo privado para obtener el texto del estado HTTP
        private function _requestStatus($code) {
            $status = array(
                200 => "OK",
                201 => "Created",
                204 => "No Content",
                400 => "Bad Request",
                401 => "Unauthorized",
                403 => "Forbidden",
                404 => "Not Found",
                500 => "Internal Server Error"
            );
            // Si el código no está definido, se usa 500 por defecto
            if(!isset($status[$code])) {
                $code = 500;
            }
            return $status[$code];
        }
    }