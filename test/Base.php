<?php declare(strict_types=1);

namespace EmailonApi\Test;

use EmailonApi\Config;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Class Base
 */
class Base extends TestCase
{
    /**
     * @return void
     */
    public function setUp(): void
    {
        // configuration object
        try {
            \EmailonApi\Base::setConfig(new Config([
                'apiUrl' => getenv('EMAILON_API_URL') ?: 'https://example.com/api',
                'apiKey' => getenv('EMAILON_API_KEY') ?: 'test-api-key',
            ]));
        } catch (ReflectionException) {
        }
        
        // start UTC
        date_default_timezone_set('UTC');

        parent::setUp();
    }
}
