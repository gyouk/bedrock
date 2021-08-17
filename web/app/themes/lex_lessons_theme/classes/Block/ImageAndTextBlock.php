<?php

namespace Will\WordPress\Theme\LexLessonsTheme\Block;

use Geniem\ACF\Block;
use Geniem\ACF\Field\Text;

/**
 * Class ImageAndTextBlock
 * @package Will\WordPress\Theme\LexLessonsTheme\Block
 */
class ImageAndTextBlock extends Block
{
	/**
	 * ImageAndTextBlock constructor.
	 * @throws \Geniem\ACF\Exception
	 */
	public function __construct( string $title = 'text and image', string $name = 'text-and-image' )
	{

		parent::__construct($title, $name);

		$title = new Text('Title', 'title', 'title');

		$this->add_fields(
			array(
				$title
			)
		);
	}
}