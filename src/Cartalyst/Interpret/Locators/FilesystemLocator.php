<?php namespace Cartalyst\Interpret\Locators;
/**
 * Part of the Interpret package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Interpret
 * @version    1.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Kurenai\DocumentParser;
use Symfony\Component\Finder\Finder;

class FilesystemLocator implements LocatorInterface {

	/**
	 * The path in which we look for files.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * The document parser which we use to extract
	 * information from the file.
	 *
	 * @var Kurenai\DocumentParser
	 */
	protected $parser;

	/**
	 * Create a new Filesystem Locator instance.
	 *
	 * @param  string  $path
	 * @param  Kurenai\DocumentParser  $parser
	 * @return void
	 */
	public function __construct($path, DocumentParser $parser = null)
	{
		$this->path   = $path;
		$this->parser = $parser ?: new DocumentParser;
	}

	/**
	 * Locates content with the given slug. If content
	 * is found, an array with three values should be
	 * returned.
	 *
	 * The first value is a string with the content
	 * type, e.g. "markdown", "html".
	 *
	 * The second value is a string with the content's
	 * value, e.g. "Why'd the chicken cross the road?"
	 *
	 * The third value is an (optional) key / value
	 * array of additional attributes for the content.
	 *
	 * If no content can be found, "null" is returned.
	 *
	 * @param  string  $slug
	 * @return array|null
	 */
	public function locate($slug)
	{
		$file = $this->queryFilesystem($slug);

		if ($file == null) return;

		return array(
			$file->getExtension(),
			$this->extractContent($file),
			$this->extractAttributes($file)
		);
	}

	/**
	 * Locates all content, returning an array of
	 * arrays in the same format as locate().
	 *
	 * @return array
	 */
	public function locateAll()
	{
		$all = array();

		foreach ($this->queryFilesystem() as $file)
		{
			$all[] = array(
				$file->getExtension(),
				$this->extractContent($file),
				$this->extractAttributes($file)
			);
		}

		return $all;
	}

	/**
	 * Get the location.
	 *
	 * @return string
	 */
	public function getLocation()
	{
		return 'filesystem';
	}

	/**
	 * Queries the filesystem using the Symfony Finder
	 * to find one or more files with an optional slug.
	 *
	 * If no slug is provided, all files will be found,
	 * if a slug is provided, an file instance is
	 * returned.
	 */
	public function queryFilesystem($slug = null)
	{
		$finder = $this
			->createFinder()
			->files()
			->in($this->path);

		if ($slug)
		{
			// Match files which have the slug, followed by a
			// period and a file extension.
			$finder->name(sprintf('/^%s\.\w+/', preg_quote($slug, '/')));

			$iterator = $finder->getIterator();

			if (count($iterator) > 1)
			{
				throw new \RuntimeException("Found more than one file to match slug [$slug] in path [{$this->path}].");
			}

			// There must be a better way around this
			foreach ($iterator as $file) return $file;

			return;
		}

		return $finder;
	}

	public function extractContent($file)
	{
		return $this->parser->parseContent($file->getContents());
	}

	public function extractAttributes($file)
	{
		$attributes = array(
			'created_at' => new \DateTime('@'.$file->getCTime()),
			'updated_at' => new \DateTime('@'.$file->getMTime()),
		);

		return array_merge($attributes, $this->parser->parseMetaData($file->getcontents()));
	}

	/**
	 * Creates a new Symfony File finder.
	 *
	 * @return Symfony\Component\Finder\Finder
	 */
	public function createFinder()
	{
		return new Finder;
	}

}
