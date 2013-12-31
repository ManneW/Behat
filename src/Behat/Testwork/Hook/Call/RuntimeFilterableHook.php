<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Hook\Call;

use Behat\Testwork\Hook\FilterableHook;

/**
 * Testwork runtime filterable hook class.
 *
 * Runtime hook, filterable by filter string.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
abstract class RuntimeFilterableHook extends RuntimeHook implements FilterableHook
{
    /**
     * @var null|string
     */
    private $filterString;

    /**
     * Initializes hook.
     *
     * @param string      $eventName
     * @param null|string $filterString
     * @param Callable    $callback
     * @param null|string $description
     */
    public function __construct($eventName, $filterString, $callback, $description = null)
    {
        $this->filterString = $filterString;

        parent::__construct($eventName, $callback, $description);
    }

    /**
     * Returns hook filter string (if has one).
     *
     * @return null|string
     */
    public function getFilterString()
    {
        return $this->filterString;
    }

    /**
     * Represents hook as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return trim($this->getName() . ' ' . $this->getFilterString());
    }
}