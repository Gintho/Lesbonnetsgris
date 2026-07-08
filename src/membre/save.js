import { useBlockProps, RichText } from '@wordpress/block-editor';

import { getInitials } from './utils';

export default function save( { attributes } ) {
	const { name, role, tone, photoUrl, eyebrow, bio, quote } = attributes;
	const isRich = Boolean( bio || quote );
	const initials = getInitials( name );

	if ( isRich ) {
		const blockProps = useBlockProps.save( {
			className: 'ds-founder-carousel__item',
			'data-carousel-item': '',
		} );

		return (
			<div { ...blockProps }>
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
						<RichText.Content
							tagName="h2"
							className="ds-h1"
							value={ name }
						/>
						{ role && (
							<RichText.Content
								tagName="p"
								className="ds-founder-spotlight__role"
								value={ role }
							/>
						) }
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

	const blockProps = useBlockProps.save( { className: 'ds-team-card' } );

	return (
		<div { ...blockProps }>
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
			<RichText.Content
				tagName="div"
				className="ds-team-card__name"
				value={ name }
			/>
			{ role && (
				<RichText.Content
					tagName="div"
					className="ds-team-card__role"
					value={ role }
				/>
			) }
		</div>
	);
}
