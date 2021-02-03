<?php

use Twilio\Rest\Client;

/**
 * Class SecretTexter
 */
class SecretTexter extends SecretSanta
{
    /**
     * The Twilio API phone number.
     *
     * @var string
     */
    protected $twilio_phone = '';


    /**
     * The Twilio API SID.
     *
     * @var string
     */
    protected $twilio_sid = '';


    /**
     * The Twilio API token.
     *
     * @var string
     */
    protected $twilio_token = '';


    /**
     * Used to assign a Twilio API phone number for text messages.
     *
     * @param string $phone
     * @return $this
     */
    public function setTwilioPhone($phone = '')
    {
        $this->twilio_phone = $phone;

        return $this;
    }


    /**
     * Returns the configured Twilio phone number.
     *
     * @return string
     */
    public function getTwilioPhone()
    {
        return $this->twilio_phone;
    }


    /**
     * Used to assign a Twilio API SID.
     *
     * @param string $sid
     * @return $this
     */
    public function setTwilioSid($sid = '')
    {
        $this->twilio_sid = $sid;

        return $this;
    }


    /**
     * Returns the configured Twilio SID.
     *
     * @return string
     */
    public function getTwilioSid()
    {
        return $this->twilio_sid;
    }


    /**
     * Used to assign a Twilio API token.
     *
     * @param string $token
     * @return $this
     */
    public function setTwilioToken($token = '')
    {
        $this->twilio_token = $token;

        return $this;
    }


    /**
     * Returns the configured Twilio API token.
     *
     * @return string
     */
    public function getTwilioToken()
    {
        return $this->twilio_token;
    }


    /**
     * Returns a new Twilio API client instance.
     *
     * @return Client
     * @throws \Twilio\Exceptions\ConfigurationException
     */
    public function getTwilioClient()
    {
        return new Client($this->getTwilioSid(), $this->getTwilioToken());
    }


    /**
     * Used to deliver a text message.
     *
     * @param $number
     * @param $text
     * @throws \Twilio\Exceptions\ConfigurationException
     * @throws \Twilio\Exceptions\TwilioException
     */
    public function notify($number, $text)
    {
        $this->getTwilioClient()->messages->create(
            "+1$number",
            [
                'from' => "+1{$this->getTwilioPhone()}",
                'body' => $text
            ]
        );
    }
}