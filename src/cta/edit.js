import {
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
	useBlockProps,
} from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	ToggleControl,
	TextControl,
	TextareaControl,
	Button,
} from '@wordpress/components';
import ServerSideRender from '@wordpress/server-side-render';
import { __ } from '@wordpress/i18n';

const LAYOUTS = [
	{
		label: __( 'Horizontal (visuel à côté du texte)', 'bonnets-gris' ),
		value: 'horizontal',
	},
	{
		label: __(
			'Bande photo (visuel en bandeau, carte de texte)',
			'bonnets-gris'
		),
		value: 'bande-photo',
	},
	{
		label: __( 'Centré (pleine largeur, logo)', 'bonnets-gris' ),
		value: 'centre',
	},
];

const FLAT_TONES = [
	{ label: __( 'Nude', 'bonnets-gris' ), value: 'nude' },
	{ label: __( 'Ciel', 'bonnets-gris' ), value: 'sky' },
	{ label: __( 'Orange', 'bonnets-gris' ), value: 'orange' },
	{ label: __( 'Terracotta', 'bonnets-gris' ), value: 'terracotta' },
];

const SECTION_TONES = [
	{ label: __( 'Blanc', 'bonnets-gris' ), value: 'white' },
	{ label: __( 'Crème', 'bonnets-gris' ), value: 'cream' },
	{ label: __( 'Ciel', 'bonnets-gris' ), value: 'sky' },
	{ label: __( 'Orange', 'bonnets-gris' ), value: 'orange' },
	{ label: __( 'Primaire', 'bonnets-gris' ), value: 'primary' },
	{ label: __( 'Pop', 'bonnets-gris' ), value: 'pop' },
];

export default function Edit( { attributes, setAttributes } ) {
	const {
		layout,
		reverse,
		backgroundType,
		tone,
		mediaId,
		mediaUrl,
		eyebrow,
		title,
		description,
		ctaLabel,
		ctaUrl,
		ctaTarget,
	} = attributes;

	const blockProps = useBlockProps();
	const isCentre = layout === 'centre';

	const onSelectMedia = ( media ) => {
		setAttributes( { mediaId: media.id, mediaUrl: media.url } );
	};

	const onRemoveMedia = () => {
		setAttributes( { mediaId: 0, mediaUrl: '' } );
	};

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Disposition', 'bonnets-gris' ) }>
					<SelectControl
						label={ __( 'Mise en page', 'bonnets-gris' ) }
						value={ layout }
						options={ LAYOUTS }
						onChange={ ( value ) =>
							setAttributes( { layout: value } )
						}
					/>
					{ layout === 'horizontal' && (
						<ToggleControl
							label={ __(
								'Inverser (visuel à droite)',
								'bonnets-gris'
							) }
							checked={ reverse }
							onChange={ ( value ) =>
								setAttributes( { reverse: value } )
							}
						/>
					) }
				</PanelBody>
				<PanelBody title={ __( 'Fond', 'bonnets-gris' ) }>
					{ ! isCentre && (
						<SelectControl
							label={ __( 'Type de fond', 'bonnets-gris' ) }
							value={ backgroundType }
							options={ [
								{
									label: __( 'Couleur', 'bonnets-gris' ),
									value: 'couleur',
								},
								{
									label: __(
										'Média (image)',
										'bonnets-gris'
									),
									value: 'media',
								},
							] }
							onChange={ ( value ) =>
								setAttributes( { backgroundType: value } )
							}
						/>
					) }
					{ ( isCentre || backgroundType === 'couleur' ) && (
						<SelectControl
							label={ __( 'Teinte', 'bonnets-gris' ) }
							value={ tone }
							options={ isCentre ? SECTION_TONES : FLAT_TONES }
							onChange={ ( value ) =>
								setAttributes( { tone: value } )
							}
						/>
					) }
					{ ! isCentre && backgroundType === 'media' && (
						<>
							<MediaUploadCheck>
								<MediaUpload
									onSelect={ onSelectMedia }
									allowedTypes={ [ 'image' ] }
									value={ mediaId }
									render={ ( { open } ) => (
										<Button
											variant="secondary"
											onClick={ open }
										>
											{ mediaUrl
												? __(
														'Changer le média',
														'bonnets-gris'
												  )
												: __(
														'Choisir un média',
														'bonnets-gris'
												  ) }
										</Button>
									) }
								/>
							</MediaUploadCheck>
							{ mediaUrl && (
								<Button
									variant="link"
									isDestructive
									onClick={ onRemoveMedia }
								>
									{ __( 'Retirer le média', 'bonnets-gris' ) }
								</Button>
							) }
						</>
					) }
				</PanelBody>
				<PanelBody title={ __( 'Contenu', 'bonnets-gris' ) }>
					<TextControl
						label={ __( 'Étiquette', 'bonnets-gris' ) }
						value={ eyebrow }
						onChange={ ( value ) =>
							setAttributes( { eyebrow: value } )
						}
					/>
					<TextControl
						label={ __( 'Titre', 'bonnets-gris' ) }
						value={ title }
						onChange={ ( value ) =>
							setAttributes( { title: value } )
						}
					/>
					<TextareaControl
						label={ __( 'Description', 'bonnets-gris' ) }
						value={ description }
						onChange={ ( value ) =>
							setAttributes( { description: value } )
						}
					/>
					<TextControl
						label={ __( 'Libellé du bouton', 'bonnets-gris' ) }
						value={ ctaLabel }
						onChange={ ( value ) =>
							setAttributes( { ctaLabel: value } )
						}
					/>
					<TextControl
						label={ __( 'Lien du bouton', 'bonnets-gris' ) }
						value={ ctaUrl }
						onChange={ ( value ) =>
							setAttributes( { ctaUrl: value } )
						}
					/>
					{ layout === 'bande-photo' && (
						<ToggleControl
							label={ __(
								'Ouvrir le lien dans un nouvel onglet',
								'bonnets-gris'
							) }
							checked={ ctaTarget === '_blank' }
							onChange={ ( value ) =>
								setAttributes( {
									ctaTarget: value ? '_blank' : '',
								} )
							}
						/>
					) }
				</PanelBody>
			</InspectorControls>
			<ServerSideRender
				block="bonnets-gris/cta"
				attributes={ attributes }
			/>
		</div>
	);
}
