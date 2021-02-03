<?php

/**
 * Class SecretSanta
 */
class SecretSanta
{
    /**
     * The siblings to match among.
     *
     * @var array
     */
    protected $siblings = [];


    /**
     * SecretSanta constructor.
     *
     * @param array $siblings
     */
    public function __construct($siblings = [])
    {
        $this->setSiblings($siblings);
    }


    /**
     * Used to configure siblings.
     *
     * @param array $siblings
     * @return $this
     */
    public function setSiblings($siblings = [])
    {
        $this->siblings = $siblings;

        return $this;
    }


    /**
     * Returns the assigned siblings.
     *
     * @return array
     */
    public function getSiblings()
    {
        return $this->siblings;
    }


    /**
     * Indicates whether or not a sibling is configured.
     *
     * @param $sibling
     * @return bool
     */
    public function hasSibling($sibling)
    {
        return isset($this->getSiblings()[$sibling]);
    }


    /**
     * Returns the phone number for a particular sibling.
     *
     * @param $sibling
     * @return mixed|string
     */
    public function getPhoneNumber($sibling)
    {
        return $this->hasSibling($sibling) ?
            $this->getSiblings()[$sibling] : '';
    }


    /**
     * The main matching procedure.
     */
    public function intrude()
    {
        $siblings = array_keys($this->getSiblings());
        $matches = [];

        // Match each sibling with another unique match.
        foreach ($this->getSiblings() as $name => $phone) {
            $i = array_search($name, $siblings);

            // Ensure that a unique match is selected.
            while ($name == $siblings[$i]) {
                $i = array_rand($siblings);
            }

            $matches[$name] = $siblings[$i];

            // Remove the match and create new keys from the remaining siblings.
            unset($siblings[$i]);
            $siblings = array_values($siblings);
        }

        // Send off each message.
        foreach ($matches as $person => $recipient) {
            $this->notify(
                $this->getPhoneNumber($person), "$person: You are $recipient's secret santa."
            );
        }

        // Display a success message.
        echo "Merry Christmas!";
    }


    /**
     * Used to deliver a text message.
     *
     * @param $number
     * @param $text
     */
    public function notify($number, $text)
    {
        echo "$text <br/>";
    }
}