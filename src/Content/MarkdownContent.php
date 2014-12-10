<?php namespace Cartalyst\Interpret\Content;
/**
 * Part of the Interpret package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under BSD-3-Clause.
 *
 * This source file is subject to the BSD-3-Clause License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Interpret
 * @version    1.1.1
 * @author     Cartalyst LLC
 * @license    BSD-3-Clause
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Michelf\Markdown;

class MarkdownContent extends Content implements ContentInterface {

	/**
	 * Markdown parser instance.
	 *
	 * @var \Michelf\Markdown
	 */
	protected $parser;

	/**
	 * {@inheritDoc}
	 */
	public function toHtml()
	{
		return $this->getParser()->defaultTransform($this->getValue());
	}

	/**
	 * Returns the markdown parser instance.
	 *
	 * @return \Michelf\Markdown
	 */
	protected function getParser()
	{
		return $this->parser ?: $this->parser = new Markdown();
	}

}
