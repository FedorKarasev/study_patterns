<?php

class Vk {

    public function __construct()
    {

    }

    public function sendVk($msg)
    {
        echo $msg . ' from VK<br>';
    }
}

class Twitter {
    public function __construct()
    {

    }

    public function sendTwitter($msg)
    {
        echo $msg . ' from Twitter<br>';
    }
}

interface SocialAdapter {
    public function send($msg);
}

class VkAdapter implements SocialAdapter {

    private $vk;

    public function __construct(Vk $vk)
    {
        $this->vk = $vk;
    }

    public function send($msg)
    {
        $this->vk->sendVk($msg);
    }
}

class TwitterAdapter implements SocialAdapter {

    private $twitter;

    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    public function send($msg)
    {
        $this->twitter->sendTwitter($msg);
    }
}

class Posting {
    public function __construct($socials = array())
    {
        foreach ($socials as $social) {
            $className = $social . 'Adapter';
            $socialName = ucfirst($social);
            $social = new $className(new $socialName);
            $social->send('blabla');
        }
    }
}

$posting = new Posting(['vk', 'twitter']);