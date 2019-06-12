<?php
namespace  websocketsp;

use WebSocket\Client;

class PubClient{

	private $client = null;
	private $websocket_uri = '';
	private $options = [];

   /**
   * @param string  $uri      A ws/wss-URI
   * @param array   $options
   *   Associative array containing:
   *   - context:      Set the stream context. Default: empty context
   *   - timeout:      Set the socket timeout in seconds.  Default: 5
   *   - headers:      Associative array of headers to set/override.
   */
    public function __construct($uri, $options = array()) 
    {
    	$this->websocket_uri = $uri;
    	$this->options = $options;
    }


    private function getClient()
    {
    	if($this->client == null) $this->client = new Client($this->websocket_uri,$this->options);
        return $this->client;
    }


    public function auth($password = '')
    {
        try{
            $data = [
                'action' => 'check',
                'password' => $password
            ];
            $this->getClient()->send(json_encode($data));
            $res = $this->getClient()->receive();
            $res = json_decode($res,true);
            if(empty($res['code']) || $res['code'] == 500) return false;
            return true;
        }catch (\Exception $exception){
            return false;
        }
    }


    /*
     *      $extra = [

            'src_type'
            'src_id'
            'dest_type'
            'dest_id'
            'src_type_name'
            'dest_name'
        ];
     *
     * */

    public function  publish(string $data,$extra)
    {
        try{
            $extra['sent_at'] = date('Y-m-d h:i:s');

            $data = [
                'action' => 'pub',
                'data' => base64_encode($data),
                'channel' => $extra['dest_id'].$extra['city_id'],
                'extra' => $extra,
            ];
            $this->getClient()-> send(json_encode($data));
            if(empty($res['code']) || $res['code'] == 500) return false;
            return true;
        }catch (\Exception $exception){
            return false;
        }

    }

}