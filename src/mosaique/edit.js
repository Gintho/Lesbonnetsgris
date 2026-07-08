import {
	useBlockProps,
	useInnerBlocksProps,
	RichText,
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

const ALLOWED_BLOCKS = [ 'bonnets-gris/membre' ];
const TEMPLATE = Array.from( { length: 6 }, () => [
	'bonnets-gris/membre',
	{},
] );

export default function Edit( { attributes, setAttributes } ) {
	const { eyebrow, title } = attributes;
	const blockProps = useBlockProps( { className: 'ds-photo-mosaic' } );
	const innerBlocksProps = useInnerBlocksProps( blockProps, {
		allowedBlocks: ALLOWED_BLOCKS,
		template: TEMPLATE,
		orientation: 'horizontal',
	} );

	return (
		<div>
			<div className="ds-section__header ds-photo-mosaic__header">
				<div>
					<RichText
						tagName="span"
						className="ds-badge ds-badge--neutral"
						placeholder={ __( 'Étiquette', 'bonnets-gris' ) }
						value={ eyebrow }
						onChange={ ( value ) =>
							setAttributes( { eyebrow: value } )
						}
						allowedFormats={ [] }
					/>
					<RichText
						tagName="h2"
						className="ds-h1 ds-mission__title"
						placeholder={ __( 'Titre', 'bonnets-gris' ) }
						value={ title }
						onChange={ ( value ) =>
							setAttributes( { title: value } )
						}
						allowedFormats={ [] }
					/>
				</div>
			</div>
			<div { ...innerBlocksProps } />
		</div>
	);
}
