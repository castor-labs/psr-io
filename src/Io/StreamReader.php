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

namespace Castor\Io;

use Psr\Http\Message\StreamInterface;
use RuntimeException;

/**
 * Class StreamReader adapts a Psr StreamInterface into a Castor\Io\Reader.
 */
final class StreamReader implements Reader
{
    private StreamInterface $stream;

    /**
     * StreamReader constructor.
     */
    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    /**
     * {@inheritDoc}
     */
    public function read(int $length): string
    {
        if ($this->stream->eof()) {
            throw new EndOfFile('End of file reached in the underlying stream');
        }
        if (!$this->stream->isReadable()) {
            throw new Error('The underlying stream is not readable');
        }

        try {
            return $this->stream->read($length);
        } catch (RuntimeException $e) {
            throw new Error('Error while reading on the underlying stream', 0, $e);
        }
    }
}
