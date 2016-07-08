<?php
declare(strict_types = 1);

namespace SilexFriends\Vimeo;

/**
 * Vimeo Service Interface
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
interface VimeoInterface
{
    /**
     * @const string
     */
    const NAME  = 'vimeo';

    /**
     * Create an Vimeo media
     *
     * @param string $url
     * @return array
     */
    public function create(string $url): array;
}
