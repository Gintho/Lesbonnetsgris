import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

export default function save() {
	const blockProps = useBlockProps.save( { className: 'ds-timeline' } );
	const innerBlocksProps = useInnerBlocksProps.save( blockProps );

	return <ol { ...innerBlocksProps } />;
}
