<?php
namespace PHPDeviceChecker;

/**
 * Class DeviceChecker
 * @package PHPDeviceChecker
 */

class PHPDeviceChecker
{
    protected $isArray=false;
    protected $token;
    protected $result;

    public function __construct($token)
    {
        if(is_array($token)){
            $this->isArray=true;
            for($i=0;$i<count($token);$i++){
                $this->token = $token[$i];
                $this->getOs();
            }
        }else{
            $this->token = $token;
            $this->getOs();
        }
        return $this->result;
    }
    /**
     * returns os
     *
     * @return mixed
     */
    public function Os($token=null)
    {
        if($token){
            return $this->result[$token]?$this->result[$token]?$this->result[$token]["os"]:null:null;
        }else{
            return $this->isArray?$this->result[key($this->result)]["os"]:$this->result[$this->token]["os"];
        }
    }
    /**
     * returns isiOs param
     *
     * @return mixed
     */
    public function isiOs($token=null)
    {
        if($token){
            return $this->result[$token]?$this->result[$token]?$this->result[$token]["isiOs"]:false:false;
        }else{
            return $this->isArray?$this->result[key($this->result)]["isiOs"]:$this->result[$this->token]["isiOs"];
        }
    }

    /**
     * returns isAndroid param
     *
     * @return mixed
     */
    public function isAndroid($token=null)
    {
        if($token){
            return $this->result[$token]?$this->result[$token]?$this->result[$token]["isAndroid"]:false:false;
        }else{
            return $this->isArray?$this->result[key($this->result)]["isAndroid"]:$this->result[$this->token]["isAndroid"];
        }
    }

    /**
     * executes command
     *
     * @return null
     */
    private function getOs()
    {
        if (preg_match('/[_\-]/', $this->token))
        {
            $this->result[$this->token]=array("isiOs"=>false,"isAndroid"=>true,"os"=>"android");
        }
        else {
            $this->result[$this->token]=array("isiOs"=>true,"isAndroid"=>false,"os"=>"ios");

        }
    }
}