<?php 
/**
 * @author Alicia <aliciamm81@gmail.com>
 * @version ${1:1.0.0}
 */
class Eltiempo{
   
    /**
     * función que dada una url llama a la funcion que devuelve los datos en json y los almacena en un array. 
     * @param mixed $url dirección url con el contenido de la API
     * @return array $dataToArray devuelve un array con los datos
     */
    public function getTiempo($url)
    {
        $curlData = $this->ejecutarCurl($url);
        $dataToArray = json_decode($curlData, true);

        return $dataToArray;

    }
    /**
     * Función que dada una url inicia una sesión cURL pide los datos, los almacena en una variable y cierra la sesión.
     * @param mixed $url dirección url con el contenido de la API 
     * @return mixed devuelve un fichero json 
     */
    public function ejecutarCurl($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        return $data;
    }
}

?>