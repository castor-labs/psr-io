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
 * Class StreamWriter adapts a Psr StreamInterface to a Castor\Io\Writer.
 */
final class StreamWriter implements Writer
{
    private StreamInterface $stream;

    /**
     * StreamWriter constructor.
     */
    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    /**
     * {@inheritDoc}
     */
    public function write(string $bytes): int
    {
        if (!$this->stream->isWritable()) {
            throw new Error('The underlying stream is not writable');
        }

        try {
            return $this->stream->write($bytes);
        } catch (RuntimeException $e) {
            throw new Error('Error while writing on the underlying stream', 0, $e);
        }
    }
}
