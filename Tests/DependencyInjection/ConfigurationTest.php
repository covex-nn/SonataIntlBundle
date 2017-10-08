<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\IntlBundle\Tests\DependencyInjection;

use Sonata\IntlBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testOptions()
    {
        $processor = new Processor();

        $config = $processor->processConfiguration(new Configuration(), [
            [
                'timezone' => [
                    'default' => 'Europe/Paris',
                ],
            ],
        ]);

        $expected = [
            'locale' => false,
            'timezone' => [
                'detectors' => [],
                'default' => 'Europe/Paris',
                'locales' => [],
            ],
        ];

        $this->assertEquals($expected, $config);
    }
}
