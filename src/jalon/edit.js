import { useBlockProps, RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

export default function Edit( { attributes, setAttributes } ) {
	const { year, title, description } = attributes;
	const blockProps = useBlockProps( { className: 'ds-timeline__item' } );

	return (
		<li { ...blockProps }>
			<div className="ds-timeline__marker" aria-hidden="true"></div>
			<div className="ds-timeline__content">
				<RichText
					tagName="div"
					className="ds-timeline__year"
					placeholder={ __( 'Année', 'bonnets-gris' ) }
					value={ year }
					onChange={ ( value ) => setAttributes( { year: value } ) }
					allowedFormats={ [] }
				/>
				<RichText
					tagName="h3"
					className="ds-h3 ds-timeline__title"
					placeholder={ __( 'Titre du jalon', 'bonnets-gris' ) }
					value={ title }
					onChange={ ( value ) => setAttributes( { title: value } ) }
					allowedFormats={ [] }
				/>
				<RichText
					tagName="p"
					className="ds-timeline__description"
					placeholder={ __(
						'Description (optionnelle)',
						'bonnets-gris'
					) }
					value={ description }
					onChange={ ( value ) =>
						setAttributes( { description: value } )
					}
					allowedFormats={ [] }
				/>
			</div>
		</li>
	);
}
