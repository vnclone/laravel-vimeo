<?php

/*
 * This file is part of Laravel Vimeo.
 *
 * (c) Vincent Klaiber <hello@vnclone.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace vnclone\Vimeo;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use Vimeo\Vimeo;

/**
 * This is the Vimeo manager class.
 *
 * @author Vincent Klaiber <hello@vnclone.com>
 */
class VimeoManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \vnclone\Vimeo\VimeoFactory
     */
    private $factory;

    /**
     * Create a new Vimeo manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \vnclone\Vimeo\VimeoFactory $factory
     *
     * @return void
     */
    public function __construct(Repository $config, VimeoFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return \Vimeo\Vimeo
     */
    protected function createConnection(array $config): Vimeo
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName(): string
    {
        return 'vimeo';
    }

    /**
     * Get the factory instance.
     *
     * @return \vnclone\Vimeo\VimeoFactory
     */
    public function getFactory(): VimeoFactory
    {
        return $this->factory;
    }
}
