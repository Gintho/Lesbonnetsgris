import {
	useBlockProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

const TONES = [
	{ label: __( 'Nude', 'bonnets-gris' ), value: 'nude' },
	{ label: __( 'Ciel', 'bonnets-gris' ), value: 'sky' },
	{ label: __( 'Orange', 'bonnets-gris' ), value: 'orange' },
	{ label: __( 'Terracotta', 'bonnets-gris' ), value: 'terracotta' },
];

export default function Edit( { attributes, setAttributes } ) {
	const { tone, title, subtitle, description, ctaLabel, ctaUrl } = attributes;
	const blockProps = useBlockProps( {
		className: `ds-support-card ds-support-card--${ tone }`,
	} );

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Apparence', 'bonnets-gris' ) }>
					<SelectControl
						label={ __( 'Teinte', 'bonnets-gris' ) }
						value={ tone }
						options={ TONES }
						onChange={ ( value ) =>
							setAttributes( { tone: value } )
						}
					/>
				</PanelBody>
				<PanelBody title={ __( 'Bouton', 'bonnets-gris' ) }>
					<TextControl
						label={ __( 'Lien du bouton', 'bonnets-gris' ) }
						value={ ctaUrl }
						onChange={ ( value ) =>
							setAttributes( { ctaUrl: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<div className="ds-support-card__color" aria-hidden="true"></div>
			<div className="ds-support-card__panel">
				<RichText
					tagName="h3"
					className="ds-support-card__title"
					placeholder={ __( 'Titre', 'bonnets-gris' ) }
					value={ title }
					onChange={ ( value ) => setAttributes( { title: value } ) }
					allowedFormats={ [] }
				/>
				<RichText
					tagName="span"
					className="ds-support-card__subtitle"
					placeholder={ __( 'Sous-titre', 'bonnets-gris' ) }
					value={ subtitle }
					onChange={ ( value ) =>
						setAttributes( { subtitle: value } )
					}
					allowedFormats={ [] }
				/>
				<RichText
					tagName="p"
					className="ds-support-card__description"
					placeholder={ __( 'Description', 'bonnets-gris' ) }
					value={ description }
					onChange={ ( value ) =>
						setAttributes( { description: value } )
					}
					allowedFormats={ [] }
				/>
				<RichText
					tagName="span"
					className="ds-button ds-button--pop-orange ds-support-card__cta"
					placeholder={ __( 'Libellé du bouton', 'bonnets-gris' ) }
					value={ ctaLabel }
					onChange={ ( value ) =>
						setAttributes( { ctaLabel: value } )
					}
					allowedFormats={ [] }
				/>
			</div>
		</div>
	);
}
