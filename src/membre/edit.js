import {
	useBlockProps,
	RichText,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	TextControl,
	TextareaControl,
	Button,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import { getInitials } from './utils';

const TONES = [
	{ label: __( 'Nude', 'bonnets-gris' ), value: 'nude' },
	{ label: __( 'Ciel', 'bonnets-gris' ), value: 'sky' },
	{ label: __( 'Orange', 'bonnets-gris' ), value: 'orange' },
	{ label: __( 'Terracotta', 'bonnets-gris' ), value: 'terracotta' },
];

export default function Edit( { attributes, setAttributes } ) {
	const { name, role, tone, photoId, photoUrl, eyebrow, bio, quote } =
		attributes;
	const isRich = Boolean( bio || quote );
	const initials = getInitials( name );
	const blockProps = useBlockProps( {
		className: isRich ? 'ds-founder-carousel__item' : 'ds-team-card',
		'data-carousel-item': isRich ? '' : undefined,
	} );

	const onSelectPhoto = ( media ) => {
		setAttributes( { photoId: media.id, photoUrl: media.url } );
	};

	const onRemovePhoto = () => {
		setAttributes( { photoId: 0, photoUrl: '' } );
	};

	const inspectorControls = (
		<InspectorControls>
			<PanelBody title={ __( 'Apparence', 'bonnets-gris' ) }>
				<SelectControl
					label={ __( 'Teinte', 'bonnets-gris' ) }
					value={ tone }
					options={ TONES }
					onChange={ ( value ) => setAttributes( { tone: value } ) }
				/>
			</PanelBody>
			<PanelBody title={ __( 'Photo', 'bonnets-gris' ) }>
				<MediaUploadCheck>
					<MediaUpload
						onSelect={ onSelectPhoto }
						allowedTypes={ [ 'image' ] }
						value={ photoId }
						render={ ( { open } ) => (
							<Button variant="secondary" onClick={ open }>
								{ photoUrl
									? __( 'Changer la photo', 'bonnets-gris' )
									: __(
											'Choisir une photo',
											'bonnets-gris'
									  ) }
							</Button>
						) }
					/>
				</MediaUploadCheck>
				{ photoUrl && (
					<Button
						variant="link"
						isDestructive
						onClick={ onRemovePhoto }
					>
						{ __( 'Retirer la photo', 'bonnets-gris' ) }
					</Button>
				) }
			</PanelBody>
			<PanelBody
				title={ __( 'Portrait détaillé', 'bonnets-gris' ) }
				initialOpen={ isRich }
			>
				<p className="description">
					{ __(
						"Renseigner une biographie et/ou une citation transforme cette carte en portrait détaillé (utilisé pour le carrousel des fondatrices). Laisser les deux vides garde une carte simple (utilisée pour le conseil et l'équipe).",
						'bonnets-gris'
					) }
				</p>
				<TextControl
					label={ __( 'Étiquette (ex. Portrait)', 'bonnets-gris' ) }
					value={ eyebrow }
					onChange={ ( value ) =>
						setAttributes( { eyebrow: value } )
					}
				/>
				<TextareaControl
					label={ __( 'Biographie', 'bonnets-gris' ) }
					value={ bio }
					onChange={ ( value ) => setAttributes( { bio: value } ) }
				/>
				<TextareaControl
					label={ __( 'Citation', 'bonnets-gris' ) }
					value={ quote }
					onChange={ ( value ) => setAttributes( { quote: value } ) }
				/>
			</PanelBody>
		</InspectorControls>
	);

	if ( isRich ) {
		return (
			<div { ...blockProps }>
				{ inspectorControls }
				<div className="ds-founder-spotlight">
					<div
						className={ `ds-founder-spotlight__visual ds-founder-spotlight__visual--${ tone }${
							photoUrl ? '' : ' is-placeholder'
						}` }
					>
						{ photoUrl ? (
							<img src={ photoUrl } alt="" />
						) : (
							<span className="ds-founder-spotlight__initials">
								{ initials }
							</span>
						) }
					</div>
					<div className="ds-founder-spotlight__content">
						{ eyebrow && (
							<span className="ds-badge ds-badge--neutral">
								{ eyebrow }
							</span>
						) }
						<RichText
							tagName="h2"
							className="ds-h1"
							placeholder={ __( 'Nom', 'bonnets-gris' ) }
							value={ name }
							onChange={ ( value ) =>
								setAttributes( { name: value } )
							}
							allowedFormats={ [] }
						/>
						<RichText
							tagName="p"
							className="ds-founder-spotlight__role"
							placeholder={ __( 'Rôle', 'bonnets-gris' ) }
							value={ role }
							onChange={ ( value ) =>
								setAttributes( { role: value } )
							}
							allowedFormats={ [] }
						/>
						{ bio && (
							<p className="ds-founder-spotlight__bio">{ bio }</p>
						) }
						{ quote && (
							<blockquote className="ds-founder-spotlight__quote">
								<p>{ `« ${ quote } »` }</p>
							</blockquote>
						) }
					</div>
				</div>
			</div>
		);
	}

	return (
		<div { ...blockProps }>
			{ inspectorControls }
			<div
				className={ `ds-team-card__photo ds-team-card__photo--${ tone }${
					photoUrl ? '' : ' is-placeholder'
				}` }
			>
				{ photoUrl ? (
					<img src={ photoUrl } alt="" />
				) : (
					<span className="ds-team-card__initials">{ initials }</span>
				) }
			</div>
			<RichText
				tagName="div"
				className="ds-team-card__name"
				placeholder={ __( 'Nom', 'bonnets-gris' ) }
				value={ name }
				onChange={ ( value ) => setAttributes( { name: value } ) }
				allowedFormats={ [] }
			/>
			<RichText
				tagName="div"
				className="ds-team-card__role"
				placeholder={ __( 'Rôle', 'bonnets-gris' ) }
				value={ role }
				onChange={ ( value ) => setAttributes( { role: value } ) }
				allowedFormats={ [] }
			/>
		</div>
	);
}
