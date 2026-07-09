import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

const ALLOWED_BLOCKS = [ 'bonnets-gris/jalon' ];
const TEMPLATE = [
	[ 'bonnets-gris/jalon', {} ],
	[ 'bonnets-gris/jalon', {} ],
];

export default function Edit() {
	const blockProps = useBlockProps( { className: 'ds-timeline' } );
	const innerBlocksProps = useInnerBlocksProps( blockProps, {
		allowedBlocks: ALLOWED_BLOCKS,
		template: TEMPLATE,
		templateInsertUpdatesSelection: false,
	} );

	return <ol { ...innerBlocksProps } />;
}
