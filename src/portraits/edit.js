import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

const ALLOWED_BLOCKS = [ 'bonnets-gris/membre' ];
const TEMPLATE = [ [ 'bonnets-gris/membre', {} ] ];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'ds-founder-carousel ds-founder-carousel--editing',
	} );
	const innerBlocksProps = useInnerBlocksProps( blockProps, {
		allowedBlocks: ALLOWED_BLOCKS,
		template: TEMPLATE,
		orientation: 'horizontal',
	} );

	return <div { ...innerBlocksProps } />;
}
