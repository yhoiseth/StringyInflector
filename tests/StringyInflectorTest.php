<?php

require_once __DIR__ . "/../vendor/autoload.php";
require __DIR__ . '/../src/StringyInflector.php';

use StringyInflector\StringyInflector as S;

class StringyInflectorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider capitalizePersonalNameProvider()
     */
    public function testCapitalizePersonalName($expected, $str, $encoding = null)
    {
        /** @var S $stringy */
        $stringy = S::create($str, $encoding);
        $result = $stringy->capitalizePersonalName();
        $this->assertEquals($expected, $result);
        $this->assertEquals($str, $stringy);
    }

    public function capitalizePersonalNameProvider()
    {
        return array(
            array('Marcus Aurelius', 'marcus aurelius'),
            array('Torbjørn Færøvik', 'torbjørn færøvik'),
            array('Jaap de Hoop Scheffer', 'jaap de hoop scheffer'),
            array('K. Anders Ericsson', 'k. anders ericsson'),
            array('Per-Einar', 'per-einar'),
            array('Line Break', 'line
             break'),
            array('ab', 'ab'),
            array('af', 'af'),
            array('al', 'al'),
            array('and', 'and'),
            array('ap', 'ap'),
            array('bint', 'bint'),
            array('binte', 'binte'),
            array('da', 'da'),
            array('de', 'de'),
            array('del', 'del'),
            array('den', 'den'),
            array('der', 'der'),
            array('di', 'di'),
            array('dit', 'dit'),
            array('ibn', 'ibn'),
            array('la', 'la'),
            array('mac', 'mac'),
            array('nic', 'nic'),
            array('of', 'of'),
            array('ter', 'ter'),
            array('the', 'the'),
            array('und', 'und'),
            array('van', 'van'),
            array('von', 'von'),
            array('y', 'y'),
            array('zu', 'zu'),
            array('Bashar al-Assad', 'bashar al-assad'),
            array("d'Name", "d'Name"),
            array('ffName', 'ffName'),
            array("l'Name", "l'Name"),
            array('macDuck', 'macDuck'),
            array('mcDuck', 'mcDuck'),
            array('nickMick', 'nickMick')
        );
    }
}
