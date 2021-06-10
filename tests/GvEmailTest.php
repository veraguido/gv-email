<?php

namespace Tests;

use Gvera\Helpers\config\Config;
use Gvera\Helpers\email\GvEmail;
use PHPMailer\PHPMailer\Exception;
use PHPUnit\Framework\TestCase;

class GvEmailTest extends TestCase
{
    /**
     * @test
     */
    public function testGvEmailInvalid()
    {
        $config = new Config();
        $email = new GvEmail();
        $email->config = $config;
        $this->expectException(\Exception::class);
        $email->send();
    }

    /**
     * @test
     * @throws Exception
     */
    public function testGvException()
    {
        $config = new Config();
        $email = new GvEmail();
        $email->config = $config;
        $email->setIsHtml(false);
        $email->addAttachment('/asd/asd/asd', 'asd');
        $email->addCC('asd@Asd.com');
        $email->addBcc('asda');
        $email->setBody('asd');
        $email->setSubject('asd');
        $email->setAlternativeBody('asd');
        $email->addAddress('asd@asd.com');
        $this->expectException(\Exception::class);
        $email->send();
    }
}
