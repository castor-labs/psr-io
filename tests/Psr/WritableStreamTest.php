<?php

declare(strict_types=1);

/**
 * @project Castor Psr Io
 * @link https://github.com/castor-labs/psr-io
 * @package castor/psr-io
 * @author Matias Navarro-Carter mnavarrocarter@gmail.com
 * @license MIT
 * @copyright 2021 CastorLabs Ltd
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Castor\Psr;

use Castor\Io\Buffer;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class WritableStreamTest extends TestCase
{
    public function testItOperatesWithBuffer(): void
    {
        $stream = new WritableStream(Buffer::from('Hello World!'));
        self::assertTrue($stream->isWritable());
        self::assertTrue($stream->isSeekable());
        self::assertTrue($stream->isReadable());
    }
}
