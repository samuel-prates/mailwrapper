<?php

namespace ByJG\Mail;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-08-04 at 10:43:46.
 */
class MailConnectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * @covers ByJG\Mail\MailConnection::getProtocol
     * @covers ByJG\Mail\MailConnection::getUsername
     * @covers ByJG\Mail\MailConnection::getPassword
     * @covers ByJG\Mail\MailConnection::getServer
     * @covers ByJG\Mail\MailConnection::getPort
     */
    public function testGetFull()
    {
        $object = new MailConnection("smtp://user:pass@server:1234");
        $this->assertEquals('smtp', $object->getProtocol());
        $this->assertEquals('user', $object->getUsername());
        $this->assertEquals('pass', $object->getPassword());
        $this->assertEquals('server', $object->getServer());
        $this->assertEquals('1234', $object->getPort());

        $object2 = new MailConnection("smtp://us876sdj!@#8er:jayyts!@#445@server:1234");
        $this->assertEquals('smtp', $object2->getProtocol());
        $this->assertEquals('us876sdj!@#8er', $object2->getUsername());
        $this->assertEquals('jayyts!@#445', $object2->getPassword());
        $this->assertEquals('server', $object2->getServer());
        $this->assertEquals('1234', $object2->getPort());

        $object3 = new MailConnection("ses://user:pass@us-east-1");
        $this->assertEquals('ses', $object3->getProtocol());
        $this->assertEquals('user', $object3->getUsername());
        $this->assertEquals('pass', $object3->getPassword());
        $this->assertEquals('us-east-1', $object3->getServer());
        $this->assertEquals('25', $object3->getPort());

        $object4 = new MailConnection("mandrill://u181298wiuqsd9sakuj1239821qsd");
        $this->assertEquals('mandrill', $object4->getProtocol());
        $this->assertEquals(null, $object4->getUsername());
        $this->assertEquals(null, $object4->getPassword());
        $this->assertEquals('u181298wiuqsd9sakuj1239821qsd', $object4->getServer());
        $this->assertEquals('25', $object4->getPort());

        $object5 = new MailConnection(null);
        $this->assertEquals('smtp', $object5->getProtocol());
        $this->assertEquals(null, $object5->getUsername());
        $this->assertEquals(null, $object5->getPassword());
        $this->assertEquals('localhost', $object5->getServer());
        $this->assertEquals('25', $object5->getPort());

        $object6 = new MailConnection('localhost');
        $this->assertEquals('smtp', $object6->getProtocol());
        $this->assertEquals(null, $object6->getUsername());
        $this->assertEquals(null, $object6->getPassword());
        $this->assertEquals('localhost', $object6->getServer());
        $this->assertEquals('25', $object6->getPort());

        $object7 = new MailConnection('mandrill://_akaka_S3ksksksg3ew');
        $this->assertEquals('mandrill', $object7->getProtocol());
        $this->assertEquals(null, $object7->getUsername());
        $this->assertEquals(null, $object7->getPassword());
        $this->assertEquals('_akaka_S3ksksksg3ew', $object7->getServer());
        $this->assertEquals('25', $object7->getPort());

        $object8 = new MailConnection('smtp://us#$%er:pa!*&$ss@host.com.br:45');
        $this->assertEquals('smtp', $object8->getProtocol());
        $this->assertEquals('us#$%er', $object8->getUsername());
        $this->assertEquals('pa!*&$ss', $object8->getPassword());
        $this->assertEquals('host.com.br', $object8->getServer());
        $this->assertEquals('45', $object8->getPort());

        $object9 = new MailConnection("smtp://us:er:pass@host.com.br:45");
        $this->assertEquals('smtp', $object9->getProtocol());
        $this->assertEquals('us:er', $object9->getUsername());
        $this->assertEquals('pass', $object9->getPassword());
        $this->assertEquals('host.com.br', $object9->getServer());
        $this->assertEquals('45', $object9->getPort());
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalid()
    {
        new MailConnection("smtp://user@host.com.br:45");
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalid2()
    {
        new MailConnection("invalid://user:pass@host.com.br:45");
    }

}